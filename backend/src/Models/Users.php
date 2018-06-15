<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Users extends Model{

   protected $table = 'user';

   public function getUsersAll()
   {
       return Users::all();
   }

   public function getUserById($id)
   {
       return Users::find($id);
   }

   public function getUserByName($username){
       return Users::where('username', $username)->first();
   }
}

?>