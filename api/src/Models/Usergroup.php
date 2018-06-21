<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model{

    protected $table = 'usergroup';

    /**
     * Listagem dos usuarios
     */
    public function list($id){

        $list = (!empty($id))? Usergroup::where('id', $id)->first() : Usergroup::get();

        if(!empty($list)){
            return json_encode(['status' => 'success', 'data' => $list]);
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
            $add = Usergroup::insertGetId($data);
            $status = true;
        }
        catch(\Exception $e){
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 

        if($status){
            return json_encode(['status' => 'success', 'message' => 'Perfil criado com sucesso!']);
        }
    }
    
    /**
     * Editar usuarios por ID
     */
    public function edit($id, array $data){

        $status = false;

        $update = Usergroup::find($id);

        if (!empty($update)) {
            try{
                $update         = Usergroup::find($id);
                $update->name   = $data['name'];
                $update->save();
                $status = true;
            }
            catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Perfil alterado com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Perfil não encontrado!']);
        }
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){

        $remove = Usergroup::find($id);

        if(!empty($remove)){

            $status = false;

            try {
                $remove = Usergroup::find($id);
                $remove->delete();
                $status = true;
            } catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Perfil removido com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Perfil não encontrado!']);
        }
    }
}
?>