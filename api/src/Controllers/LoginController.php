<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;
use App\Models\Auth;

class LoginController
{
    public function __construct($container){
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response){

       $params = $request->getParams();

        if(!empty($params)){

            $error = [];
            foreach ($params as $k => $v) {
                if($v == ''){
                    $error[] = ['status' => 'error', 'message' => 'O parâmetro '. $k .' é obrigatório'];
                }
            }

            if(count($error) > 0 ){
                $this->container->logger->error(json_encode($error));
                return $response->withJson($error, 401)->withHeader('Content-type', 'application/json');                      
            }

            $rows = Auth::getUserByName($params);

            switch ($rows) {
                case $rows:

                    # Gerando token de autorização
                    $token   = JWT::encode($rows, $this->container->get("secretkey"));

                    # Logger
                    $this->container->logger->info(json_encode(['status' => 'success', 'username' => $rows->username, 'token' => $token]));

                    return $response->withJson(['status' => 'success', 'token' => $token], 200)->withHeader('Content-type', 'application/json');   
                break;

                default:
                    return $response->withJson(['status' => 'error', 'message' => 'Usuário não encontrado!'], 400)
                    ->withHeader('Content-type', 'application/json');  
                break;
            }

        }else{
            $message = ['status' => 'error', 'message' => 'Os parâmetros username e password são obrigatórios!'];
            $this->container->logger->error(json_encode($message));
            return $response->withJson($error, 401)->withHeader('Content-type', 'application/json');
        }
    }
}