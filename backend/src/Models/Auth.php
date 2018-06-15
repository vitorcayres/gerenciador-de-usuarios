<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Auth extends Model{

   protected $table = 'user';

   public function getUserByName($params)
   {
        return Auth::where([
            ['username', '=', $params['username']],
            ['password', '=', $params['password']],
        ])->get();
   }

}

?>