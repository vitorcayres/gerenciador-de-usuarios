<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Auth extends Model{

   protected $table = 'user';

   public function getUserByName(array $params)
   {
        $queryDB = Auth::where([
            ['username', $params['username']],
            ['password', md5($params['password'])],
        ])->first(); 

        return $queryDB;
    }
}
?>