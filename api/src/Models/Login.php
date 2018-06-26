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

        if(!empty($rows)){
            return json_encode(['status' => 'success', 'data' => $rows]);
        }else{
            return json_encode(['status' => 'error', 'message' => 'Usuário não encontrado!']);
        }
    }
}
?>