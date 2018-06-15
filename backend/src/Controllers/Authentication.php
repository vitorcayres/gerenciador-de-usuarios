<?php

namespace App\Controllers;

use Slim\Exception\NotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Auth;

class Authentication
{

    public function __construct($container){
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response){

        $params = $request->getParams();

        if(!empty($params)) {
            
            foreach ($params as $k => $v) {
                if($v == ''){
                    return $response->withJson(['status' => 'error', 'message' => 'O parâmetro '. $k .' é obrigatório. '], 401)
                    ->withHeader('Content-type', 'application/json');
                }
            }

            $rows = Auth::getUserByName($params['username']);

            if(!empty($rows)){
                print_r($rows);
            }else{
                return $response->withJson(['status' => 'error', 'message' => 'Usuário não encontrado!'], 401)
                ->withHeader('Content-type', 'application/json');                
            }

        }else{
            return $response->withJson(['status' => 'error', 'message' => 'Os parâmetros username e password são obrigatórios!'], 401)
                ->withHeader('Content-type', 'application/json');
        }
    }
}