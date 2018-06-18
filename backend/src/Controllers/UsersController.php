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
        $body = Users::listing();

        if (!empty($body)) {
            return $response->withJson(['status' => 'success', 'data' => $body], 200)
            ->withHeader('Content-type', 'application/json'); 
        }else{
            return $response->withJson(['status' => 'error', 'message' => 'Listagem não encontrada!'], 400)
            ->withHeader('Content-type', 'application/json');
        }
    }

    public function listById(Request $request, Response $response, $args){
       
        if (!empty($args)) {

            $id = $args['id'];
            $body = Users::listingById($id);

            if (!empty($body)) {
                return $response->withJson(['status' => 'success', 'data' => $body], 200)
                ->withHeader('Content-type', 'application/json');   
            }else{
                return $response->withJson(['status' => 'error', 'message' => 'Usuário não encontrado!'], 400)
                ->withHeader('Content-type', 'application/json');                
            }
        }
    }
    
    public function add(Request $request, Response $response){
        
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

            $res = Users::add($params);

            if(!empty($res)){
 
                return $response->withJson(['status' => 'success', 'message' => 'Usuário inserido com sucesso!'], 200)
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
    
    public function edit(Request $request, Response $response, $args){

        if ($request->isPut()) {

            $params = $request->getParams();
            $id = $args['id'];
            $paramsDB = [];

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
                
                $paramsDB['username'] = $params['username'];
                $paramsDB['password'] = $params['password'];
                $paramsDB['name'] = $params['name'];
                $paramsDB['usergroup_id'] = $params['usergroup_id'];                               
                $paramsDB['superuser'] = $params['superuser'];
                $paramsDB['workplace_id'] = $params['workplace_id'];                

                //$res = Users::edit($id, $paramsDB);

            } else {
                $errors = $validator->getErrors();

                return $response->withJson($errors, 404)
                         ->withHeader('Content-type', 'application/json');  
            }
        }
        


        // if (!empty($args)) {

        //     if(!empty($request->getParams())){
    
        //         $res = Users::edit($args['id'], $request->getParams());
                

        //     }else{
        //         return $response->withJson(['status' => 'error', 'message' => 'Corpo da requisição invalido!'], 400)
        //         ->withHeader('Content-type', 'application/json');                
        //     }
        // }
    }
    
    public function remove(){
        
    }
    
}