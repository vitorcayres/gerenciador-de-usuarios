<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;

class AdminController
{
    public function __construct($container, $model, $permission){
        $this->container = $container;
        $this->model     = $model;
        $this->permission = $permission;
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

                    $rows = (object) $this->validate($request, $this->permission);

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

                    $rows = (object) $this->validate($request, $this->permission);

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
    private function validate($request, $permission){

        $validator =  $this->container->validator->validate($request, $permission);

        if ($validator->isValid()){  
            return ['status' => 'success'];
        }else{
            return $validator->getErrors();
        }
    }
}