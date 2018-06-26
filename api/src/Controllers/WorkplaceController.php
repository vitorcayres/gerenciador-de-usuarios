<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\Workplace;

class WorkplaceController extends AdminController
{
    public function __construct($container){
        $this->container = $container;
        $this->model = new Workplace();

        $this->permission = [
            'name' => [
                'rules' => Validation::notBlank(),
                'message' => 'Este campo é obrigatório!'
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