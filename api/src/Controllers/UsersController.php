<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\Users;

class UsersController extends AdminController
{
    public function __construct($container){
        
        $this->container = $container;
        $this->model = new Users();
        $this->permission = [
            'username' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo usuário é obrigatório!'
            ],
            'password' => [
                'rules' => Validation::length(8),
                'message' => 'A senha deve conter no mínimo 8 caracteres!'
            ],
            'name' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo nome é obrigatório!'
            ],
            'usergroup_id' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo grupo de usuários é obrigatório!'
            ],
            'workplace_id' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo empresa é obrigatório!'
            ]                                                            
        ];
    }    

    public function execute(Request $request, Response $response, $args){

        $methodHttp = $request->getMethod();
        $rows = AdminController::$methodHttp($request, $response, $args);

        switch ($rows->status) {
            case 'success':
                $this->container->logger->info(json_encode($rows));
                return $response->withJson($rows, 200)
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