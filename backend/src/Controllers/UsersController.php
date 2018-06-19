<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\Users;

class UsersController
{
    public function __construct($container){
        $this->container = $container;
    }    

    public function list(Request $request, Response $response){

        if ($request->isGet()) {

        $res = json_decode(Users::listing());

            switch ($res->status) {
                case 'success':
                    return $response->withJson($res, 200)
                    ->withHeader('Content-type', 'application/json');
                break;

                default:
                    return $response->withJson($res, 404)
                    ->withHeader('Content-type', 'application/json');  
                break;
            }
        }
    }

    public function listById(Request $request, Response $response, $args){
       
        if ($request->isGet()) {

            if(!empty($args['id'])){

                $res = json_decode(Users::listById($args['id']));

                switch ($res->status) {
                    case 'success':
                        return $response->withJson($res, 200)
                        ->withHeader('Content-type', 'application/json');
                    break;

                    default:
                        return $response->withJson($res, 404)
                        ->withHeader('Content-type', 'application/json');  
                    break;
                }
            }
        }
    }
    
    public function add(Request $request, Response $response){

        $params = $request->getParams();

        if ($request->isPost()) {

            if(!empty($params)){

                $validator =  $this->container->validator->validate($request, [
                    'username' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'password' => [
                        'rules' => Validation::length(8),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'name' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'usergroup_id' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'superuser' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'workplace_id' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],
                    'enabled' => [
                        'rules' => Validation::notBlank(),
                        'message' => 'Este campo é obrigatório!'
                    ],                                                                             
                ]);

                if ($validator->isValid()) {  
                    $res = json_decode(Users::add($params));    

                    switch ($res->status) {
                        case 'success':
                            return $response->withJson($res, 200)
                            ->withHeader('Content-type', 'application/json');
                        break;

                        default:
                            return $response->withJson($res, 404)
                            ->withHeader('Content-type', 'application/json');  
                        break;
                    }
                } else {
                    $errors = $validator->getErrors();

                    return $response->withJson($errors, 400)
                             ->withHeader('Content-type', 'application/json');  
                }

            }else{
                return $response->withJson(['status' => 'error', 'message' => 'Requisição invalida!'], 400)
                ->withHeader('Content-type', 'application/json');                  
            }
        }
    }
    
    public function edit(Request $request, Response $response, $args){

        if ($request->isPut()) {

            $params = $request->getParams();
            $id = $args['id'];

            $validator =  $this->container->validator->validate($request, [
                'username' => [
                    'rules' => Validation::notBlank(),
                    'message' => 'Este campo é obrigatório!'
                ],
                'password' => [
                    'rules' => Validation::length(8),
                    'message' => 'Este campo é obrigatório!'
                ],
                'name' => [
                    'rules' => Validation::notBlank(),
                    'message' => 'Este campo é obrigatório!'
                ],
                'usergroup_id' => [
                    'rules' => Validation::notBlank(),
                    'message' => 'Este campo é obrigatório!'
                ],
                'superuser' => [
                    'rules' => Validation::notBlank(),
                    'message' => 'Este campo é obrigatório!'
                ],
                'workplace_id' => [
                    'rules' => Validation::notBlank(),
                    'message' => 'Este campo é obrigatório!'
                ],                                                            
            ]);   

            if ($validator->isValid()) {  
                $res = json_decode(Users::edit($id, $params));    

                switch ($res->status) {
                    case 'success':
                        return $response->withJson($res, 200)
                        ->withHeader('Content-type', 'application/json');
                    break;

                    default:
                        return $response->withJson($res, 404)
                        ->withHeader('Content-type', 'application/json');  
                    break;
                }

            } else {
                $errors = $validator->getErrors();
                return $response->withJson($errors, 404)
                         ->withHeader('Content-type', 'application/json');  
            }
        }
    }
    
    public function remove(Request $request, Response $response, $args){

        if ($request->isDelete()) {
            if(!empty($args['id'])){

                $res = json_decode(Users::remove($args['id']));    

                switch ($res->status) {
                    case 'success':
                        return $response->withJson($res, 200)
                        ->withHeader('Content-type', 'application/json');
                    break;

                    default:
                        return $response->withJson($res, 404)
                        ->withHeader('Content-type', 'application/json');  
                    break;
                }

            }
        }
    }
    
}