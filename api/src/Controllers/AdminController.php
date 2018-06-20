<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;

class AdminController
{
    public function __construct($container, $model){
        $this->container = $container;
        $this->model     = $model;
    }    

    public function execute(Request $request, Response $response, $args){

        switch ($request->getMethod()) {

            case 'GET':
                $id = (!empty($args['id']))? $args['id'] : '';
                $rows = json_decode($this->model::list($id));
                return $rows;
            break;

            case 'POST':
                $params = $request->getParams();

                if(!empty($request->getParams())){

                    $rows = (object) $this->validate($request);

                    switch ($rows->status) {
                        case 'success':
                            $rows = json_decode($this->model::add($params));    
                            return $rows;
                            break;
                        
                        default:
                            return $rows;
                            break;
                    }
                }else{
                    return ['status' => 'error', 'message' => 'Requisição invalida!'];                  
                }
            break;
            
            case 'PUT':
                if(!empty($request->getParams())){

                    $rows = (object) $this->validate($request);

                    switch ($rows->status) {
                        case 'success':
                            $rows = json_decode($this->model::edit($args['id'], $request->getParams()));    
                            return $rows;
                            break;
                        
                        default:
                            return $rows;
                            break;
                    }
                }else{
                    return ['status' => 'error', 'message' => 'Requisição invalida!'];                  
                }
            break;

            case 'DELETE':
                $id = (!empty($args['id']))? $args['id'] : '';
                $rows = json_decode($this->model::remove($id));
                return $rows;        
            break;

        }
    }

    /**
    * Função de validação do body na requesição
    */
    private function validate($request){

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

        if ($validator->isValid()){  
            return ['status' => 'success'];
        }else{
            return $validator->getErrors();
        }
    }
}