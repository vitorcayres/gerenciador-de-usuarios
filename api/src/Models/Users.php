<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{

    protected $table = 'user';

    /**
     * Listagem dos usuarios
     */
    public function list($id, $page, $limit, $sort){

        $numrows = count(Users::get());
        $rowsperpage = (!empty($limit))? $limit : 10;
        $sort = (!empty($sort))? $sort : 'DESC';         
        $totalpages = ceil($numrows / $rowsperpage);
        $currentpage = (isset($page) && is_numeric($page))? (int) $page : 1;

        if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
        }

        if ($currentpage < 1) {
            $currentpage = 1;
        }
         
        $offset = ($currentpage - 1) * $rowsperpage;

        $users = (object) Users::orderBy('id', $sort)
                ->offset($offset)
                ->limit($rowsperpage)
                ->get();

        $list = (!empty($id))? Users::where('id', $id)->first() : $users;

        if(!empty($list)){
            return json_encode(['status' => 'success', 'page' => $currentpage, 'totalPages' => $totalpages, 'total' => $numrows, 'data' => $list]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Listagem não encontrada!']);
        }
    }

    /**
     * Inserção dos usuarios
     */
    public function add(array $data){
        $status = false;

        try{

            $verificaUsuario = Users::where('username', $data['username'])->first();

            if($verificaUsuario){
                return json_encode(['status' => 'error', 'message' => ['error' => 'Usuário já existente!']]);
            }

            $body['name']           = $data['name'];
            $body['username']       = $data['username'];
            $body['password']       = md5($data['password']);
            $body['usergroup_id']   = $data['usergroup_id'];
            $body['workplace_id']   = $data['workplace_id'];

            $add = Users::insertGetId($body);
            $status = true;
        }
        catch(\Exception $e){
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 

        if($status){
            return json_encode(['status' => 'success', 'message' => 'Usuário criado com sucesso!']);
        }
    }
    
    /**
     * Editar usuarios por ID
     */
    public function edit($id, array $data){

        $status = false;

        $update = Users::find($id);

        if (!empty($update)) {
            try{
                $update = Users::find($id);                       
                $update->username       = $data['username'];
                $update->password       = md5($data['password']);
                $update->name           = $data['name'];
                $update->usergroup_id   = $data['usergroup_id'];                               
                $update->superuser      = $data['superuser'];
                $update->workplace_id   = $data['workplace_id'];
                $update->enabled        = $data['enabled'];
                $update->force_pass_change= $data['force_pass_change'];                                         
                $update->save();
                $status = true;
            }
            catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Usuário alterado com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Usuário não encontrado!']);
        }
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){

        $remove = Users::find($id);

        if(!empty($remove)){

            $status = false;

            try {
                $remove = Users::find($id);
                $remove->delete();
                $status = true;
            } catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Usuário removido com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Usuário não encontrado!']);
        }
    }
}
?>