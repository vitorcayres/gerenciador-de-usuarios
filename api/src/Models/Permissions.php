<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model{

    protected $table = 'permission';

    /**
     * Listagem dos usuarios
     */
    public function list($id){

        $list = (!empty($id))? Permissions::where('id', $id)->first() : Permissions::get();

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
            $add = Permissions::insertGetId($data);
            $status = true;
        }
        catch(\Exception $e){
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 

        if($status){
            return json_encode(['status' => 'success', 'message' => 'Permissão criada com sucesso!']);
        }
    }
    
    /**
     * Editar usuarios por ID
     */
    public function edit($id, array $data){

        $status = false;

        $update = Permissions::find($id);

        if (!empty($update)) {
            try{
                $update         = Permissions::find($id);
                $update->name   = $data['name'];
                $update->save();
                $status = true;
            }
            catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Permissão alterada com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Permissão não encontrada!']);
        }
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){

        $remove = Permissions::find($id);

        if(!empty($remove)){

            $status = false;

            try {
                $remove = Permissions::find($id);
                $remove->delete();
                $status = true;
            } catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Permissão removida com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Permissão não encontrada!']);
        }
    }
}
?>