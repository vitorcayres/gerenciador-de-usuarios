<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\Usergroup;

class UsergroupController extends AdminController
{
    public function __construct($container){
        $this->container = $container;
        $this->model = new Usergroup();

        $this->permission = [
            'name' => [
                'rules' => Validation::notBlank(),
                'message' => 'Este campo é obrigatório!'
            ],
            'description' => [
                'rules' => Validation::notBlank(),
                'message' => 'Este campo é obrigatório!'
            ]                                                                                         
        ];
    }    

    public function execute(Request $request, Response $response, $args){

        $rows = AdminController::execute($request, $response, $args);

        switch ($rows->status) {
            case 'success':
                return $response->withJson($rows, 200)
                ->withHeader('Content-type', 'application/json');
            break;

            default:
                return $response->withJson($rows, 404)
                ->withHeader('Content-type', 'application/json');  
            break;
        }
    }
}