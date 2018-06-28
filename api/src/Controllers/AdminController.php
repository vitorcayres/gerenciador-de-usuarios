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

    public function GET(Request $request, Response $response, $args){

        # Parametro de busca por ID
        $id = (!empty($args['id']))? $args['id'] : '';

        # Parametros de paginação
        $parameters = (!empty($request->getParams()))? (object) $request->getParams() : '';
        $page = (!empty($parameters->page))? $parameters->page : '';
        $limit = (!empty($parameters->limit))? $parameters->limit : '';
        $sort = (!empty($parameters->sort))? $parameters->sort : '';

        $rows = json_decode($this->model::list($id, $page, $limit, $sort));
        return $rows;
    }

    public function POST(Request $request, Response $response, $args){
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
    }

    public function PUT(Request $request, Response $response, $args){
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
    }

    public function DELETE(Request $request, Response $response, $args){
        $id = (!empty($args['id']))? $args['id'] : '';
        $rows = json_decode($this->model::remove($id));
        return $rows;
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