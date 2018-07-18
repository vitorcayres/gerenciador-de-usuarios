<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model{

    protected $table = 'usergroup';

    /**
     * Listagem dos usuarios
     */
    public function list($id, $page, $limit, $sort){

        $numrows = count(Usergroup::get());
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

        $users = (object) Usergroup::orderBy('id', $sort)
                ->offset($offset)
                ->limit($rowsperpage)
                ->get();

        $list = (!empty($id))? Usergroup::where('id', $id)->first() : $users;

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

        $usergroupData['name'] = $data['name'];
        $usergroupData['description'] = $data['description'];        

        try{
            $id = Usergroup::insertGetId($usergroupData);

            foreach($data['permissions'] as $item){
                UsergroupHasPermission::insert([
                    'usergroup_id' => $id,
                    'permission_id' => $item]);
            }

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

        try{
            $update                 = Usergroup::find($id);
            $update->name           = $data['name'];
            $update->description    = $data['description'];                
            $update->save();

            $remove = UsergroupHasPermission::where('usergroup_id', $id);
            $remove->delete();            

            foreach($data['permissions'] as $item){
                UsergroupHasPermission::insert([
                    'usergroup_id' => $id,
                    'permission_id' => $item]);
            }

            $status = true;
        }
        catch(\Exception $e){
            return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 

        if($status){
            return json_encode(['status' => 'success', 'message' => 'Perfil alterado com sucesso!']);
        }
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){

        $buscaCliente = Users::where('usergroup_id', $id)->exists();

        if($buscaCliente){
            return json_encode(
                    ['status' => 'error',
                     'message' => 'Há usuários atrelados a este perfil, é necessário a exclusão do usuário antes de executar esta ação!']
            );
        }

        $remove = Usergroup::find($id);

        if(!empty($remove)){
            $status = false;
            try {
                
                # Remove o grupo de usuarios especifico pelo id
                $removeUsergroupHasPermission = UsergroupHasPermission::where('usergroup_id', $id);
                $removeUsergroupHasPermission->delete();

                # Remove o perfil pelo id
                $removeUsergroup = Usergroup::find($id);
                $removeUsergroup->delete();

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