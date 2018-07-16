<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\UsergroupHasPermission;

class UsergroupHasPermissionController extends AdminController
{
    public function __construct($container){
        $this->container = $container;
        $this->model = new UsergroupHasPermission();
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