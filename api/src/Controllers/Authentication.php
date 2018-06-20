<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;
use App\Models\Auth;

class Authentication
{
    public function __construct($container){
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response){

        $params = $request->getParams();

        if(!empty($params)) {
            
            $error = [];
            foreach ($params as $k => $v) {
                if($v == ''){
                    $error[] = ['status' => 'error', 'message' => 'O parâmetro '. $k .' é obrigatório'];
                }
            }

            if(count($error) > 0 ){
                return $response->withJson($error, 401)
                ->withHeader('Content-type', 'application/json');                      
            } 

            $res = Auth::getUserByName($params);

            if(!empty($res)){
 
                $key    = $this->container->get("secretkey");
                $token  = JWT::encode($res, $key);

                return $response->withJson(['status' => 'success', 'token' => $token], 200)
                ->withHeader('Content-type', 'application/json');   
 
            }else{
                return $response->withJson(['status' => 'error', 'message' => 'Usuário não encontrado!'], 400)
                ->withHeader('Content-type', 'application/json');                
            }

        }else{
            return $response->withJson(['status' => 'error', 'message' => 'Os parâmetros username e password são obrigatórios!'], 401)
                ->withHeader('Content-type', 'application/json');
        }
    }
}