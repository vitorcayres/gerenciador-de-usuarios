<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class UsergroupHasPermission extends Model{

   protected $table = 'usergroup_has_permission';

    /**
     * Listagem dos grupo de permissão de usuários 
     */
    public function list($id, $page, $limit, $sort){

        $numrows = count(UsergroupHasPermission::get());
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

        $usergroup_has_permission = (object) UsergroupHasPermission::orderBy('usergroup_id', $sort)
                ->offset($offset)
                ->limit($rowsperpage)
                ->get();

        $usergroup_has_permissionId = (object) UsergroupHasPermission::select('id', 'name')
                                                    ->join('permission', 'usergroup_has_permission.permission_id', '=', 'permission.id')
                                                    ->where('usergroup_has_permission.usergroup_id', '=', $id)
                                                    ->orderBy('id', $sort)
                                                    ->get();

        $list = (!empty($id))? $usergroup_has_permissionId : $usergroup_has_permission;

        if(!empty($list)){
            return json_encode(['status' => 'success', 'page' => $currentpage, 'totalPages' => $totalpages, 'total' => $numrows, 'data' => $list]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Listagem não encontrada!']);
        }
    }     

}
?>