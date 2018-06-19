<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{

    protected $table = 'user';

    /**
     * Listagem dos usuarios
     */
    public function listing(){

        $list = Users::get();

        $list = [];

        if(!empty($list)){
            return json_encode(['status' => 'success', 'data' => $list]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Listagem não encontrada!']);
        }
    }

    /**
     * Listagem dos usuarios por ID
     */
    public function listById($id){

        $listById = Users::where('id', $id)->first();

        if(!empty($listById)){
            return json_encode(['status' => 'success', 'data' => $listById]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Usuário não encontrado!']);
        }
    }

    /**
     * Inserção dos usuarios
     */
    public function add(array $data){
        $status = false;

        try{
            $add = Users::insertGetId($data);
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