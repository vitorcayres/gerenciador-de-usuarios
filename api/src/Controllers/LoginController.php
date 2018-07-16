<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use Firebase\JWT\JWT;
use App\Models\Login;

class LoginController extends AdminController
{
    public function __construct($container){
        $this->container = $container;
        $this->model = new Login();
        $this->permission = [
            'username' => [
                'rules' => Validation::notBlank(),
                'message' => 'Este campo é obrigatório!'
            ],
            'password' => [
                'rules' => Validation::notBlank(),
                'message' => 'Este campo é obrigatório!'
            ]                                                                                        
        ];        
    }

    public function __invoke(Request $request, Response $response, $args=null){

        $methodHttp = $request->getMethod();
        $rows = AdminController::$methodHttp($request, $response, $args);

        switch ($rows->status) {
            case 'success':

                # Gerando data de expiração
                #$rows->data->expiration_at = date('Y-m-d H:i:s', strtotime('+60 minute', strtotime(date('Y-m-d H:i:s'))));
                $rows->data->expiration_at = date('Y-m-d H:i:s', strtotime('+6 day', strtotime(date('Y-m-d H:i:s'))));
                
                # Gerando token de autorização
                $token = JWT::encode($rows, $this->container->get("secretkey"));

                $this->container->logger->info(json_encode($rows));
                return $response->withJson(['status' => 'success', 'token' => $token], 200)
                ->withHeader('Content-type', 'application/json');
            break;

            default:
                $this->container->logger->error(json_encode($rows));
                return $response->withJson($rows, 404)
                ->withHeader('Content-type', 'application/json');  
            break;
        }
    }
}