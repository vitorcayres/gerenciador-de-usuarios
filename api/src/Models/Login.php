<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Login extends Model{

   protected $table = 'user';

   public function add(array $params)
   {
        $rows = Login::where([
            ['username', $params['username']],
            ['password', md5($params['password'])],
        ])->first(); 

        $permissions = UsergroupHasPermission::select('name', 'description')
                                                    ->join('permission', 'usergroup_has_permission.permission_id', '=', 'permission.id')
                                                    ->where('usergroup_has_permission.usergroup_id', '=', $rows['usergroup_id'])
                                                    ->orderBy('description')
                                                    ->get();
        $rows['permissions'] = $permissions;

        if(!empty($rows)){
            return json_encode(['status' => 'success', 'data' => $rows]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Usuário ou senha incorretos!']);
        }
    }
}
?>