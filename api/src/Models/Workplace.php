<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model{

    protected $table = 'workplace';

    /**
     * Listagem dos usuarios
     */
    public function list($id, $page, $limit, $sort){

        $numrows = count(Workplace::get());
        $rowsperpage = (!empty($limit))? $limit : 10;
        $sort = (!empty($sort))? $sort : 'ASC'; 
        $totalpages = ceil($numrows / $rowsperpage);
        $currentpage = (isset($page) && is_numeric($page))? (int) $page : 1;

        if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
        }

        if ($currentpage < 1) {
            $currentpage = 1;
        }
         
        $offset = ($currentpage - 1) * $rowsperpage;

        $users = (object) Workplace::orderBy('id', $sort)
                ->offset($offset)
                ->limit($rowsperpage)
                ->get();

        $list = (!empty($id))? Workplace::where('id', $id)->first() : $users;

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
            $add = Workplace::insertGetId($data);
            $status = true;
        }
        catch(\Exception $e){
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 

        if($status){
            return json_encode(['status' => 'success', 'message' => 'Empresa criada com sucesso!']);
        }
    }
    
    /**
     * Editar usuarios por ID
     */
    public function edit($id, array $data){

        $status = false;

        $update = Workplace::find($id);

        if (!empty($update)) {
            try{
                $update         = Workplace::find($id);
                $update->name   = $data['name'];
                $update->save();
                $status = true;
            }
            catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Empresa alterada com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Empresa não encontrada!']);
        }
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){

        $remove = Workplace::find($id);

        if(!empty($remove)){

            $status = false;

            try {
                $remove = Workplace::find($id);
                $remove->delete();
                $status = true;
            } catch(\Exception $e){
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            } 

            if($status){
                return json_encode(['status' => 'success', 'message' => 'Empresa removida com sucesso!']);
            }
        }else{
            return json_encode(['status' => 'error', 'message' => 'Empresa não encontrada!']);
        }
    }
}
?>