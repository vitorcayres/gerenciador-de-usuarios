<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model{

    protected $table = 'permission';

    /**
     * Listagem dos usuarios
     */
    public function list($id, $page, $limit, $sort){

        $numrows = count(Permissions::get());
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

        $users = (object) Permissions::orderBy('id', $sort)
                ->offset($offset)
                ->limit($rowsperpage)
                ->get();

        $list = (!empty($id))? Permissions::where('id', $id)->first() : $users;

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

            $buscaPermissao = Permissions::where('name', $data['name'])->first();

            if($buscaPermissao){       
                return json_encode(['status' => 'error', 'message' => 'Permissão já existente!']);
            }

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
                $update->description   = $data['description'];                
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