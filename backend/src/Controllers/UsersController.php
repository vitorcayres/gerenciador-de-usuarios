<?php

namespace App\Controllers;

use Slim\Exception\NotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Users;

class UsersController
{

    public function getUsers(Request $request, Response $response, $args)
    {
        
        $users = Users::all();
        $data = [];

        foreach ($users as $user) {

            $u = [];
            $u['id'] = $user->id;
            $u['name'] = $user->name;
            $data[] = $u;
        }  
        
        return $response->withJson(
            ["status" => "success",
            "code" => 200, 
            "data" => $data
        ], 200)->withHeader('Content-type', 'application/json'); 

    }
}