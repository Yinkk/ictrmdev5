<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\User;

class UserService extends Service {

    var $with_array = [];

    public function all(){
         return User::all();
    }

    public function get($id){
        return User::find($id);
    }

    public function create(){
        return new User();
    }

    public function store(array $input){
        $user = new User();
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function save(array $input){
        /* @var $user User */
        $user = User::find($input['id']);
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function delete($id){
        /* @var $user User */
        $user = User::find($id);
        $user->delete();
        return $user;
    }

}