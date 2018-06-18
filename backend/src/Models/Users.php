<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{

    protected $table = 'user';

    /**
     * Listagem dos usuarios
     */
    public function listing(){
        return Users::get();
    }

    /**
     * Inserção dos usuarios
     */
    public function add(array $body){
        return Users::insertGetId($body);
    }
    
    /**
     * Listagem dos usuarios por ID
     */
    public function listingById($id){
       return Users::where('id', $id)
       ->first();
    }

    /**
     * Editar usuarios por ID
     */
    public function edit($id, $paramsDB){

        $returnDB = Users::find($id);
        $returnDB['name'] = 'Chora';
        $returnDB->save();


        // return Users::where('id', $id)
        // ->update($body);
        #UPDATE `user` SET `name` = 'Vitor dos Santos Cayres' WHERE `user`.`id` = 168;
    }
    
    /**
     * Excluir usuarios por ID
     */
    public function remove($id){
        return Users::where('id', $id)
        ->delete();
    }

}
?>