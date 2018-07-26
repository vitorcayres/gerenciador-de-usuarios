<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as Validation;
use App\Models\Users;

class UsersController extends AdminController
{
    public function __construct($container){
        
        $this->container = $container;
        $this->model = new Users();
        $this->permission = [
            'username' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo usuário é obrigatório!'
            ],
            'password' => [
                'rules' => Validation::length(8),
                'message' => 'A senha deve conter no mínimo 8 caracteres!'
            ],
            'name' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo nome é obrigatório!'
            ],
            'usergroup_id' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo grupo de usuários é obrigatório!'
            ],
            'workplace_id' => [
                'rules' => Validation::notBlank(),
                'message' => 'O campo empresa é obrigatório!'
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

    public function change_password(Request $request, Response $response, $args){

        $params = $request->getParams();
        $id     = $args['id'];

        if($request->isPut()){

            $status = false;
            $update = Users::find($id);

            if (!empty($update)) {
                try{
                    $update = Users::find($id);
                    $update->password       = md5($params['password']);                                      
                    $update->save();
                    $status = true;
                }
                catch(\Exception $e){
                    return $response->withJson(['status' => 'error', 'message' => $e->getMessage()], 400)->withHeader('Content-type', 'application/json');
                } 

                if($status){
                    return $response->withJson(['status' => 'success', 'message' => 'Senha alterada com sucesso!'], 200)->withHeader('Content-type', 'application/json');
                }
            }else{
                return $response->withJson(['status' => 'error', 'message' => 'Usuário não encontrado!'], 400)->withHeader('Content-type', 'application/json');
            }
        }
    }

}