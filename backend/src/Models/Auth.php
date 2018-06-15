<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Auth extends Model{

   protected $table = 'user';

   public function getUserByName(array $params)
   {
        $username = $params['username'];
        $password = md5($params['password']);

        $queryDB = Auth::where([
            ['username', $username],
            ['password', $password],
        ])->first(); 

        return $queryDB;
    }

}

?>