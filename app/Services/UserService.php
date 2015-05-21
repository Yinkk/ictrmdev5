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

    var $with_array = ['roles'];

    /**
     * @return array
     */
    public function getWithArray()
    {
        return $this->with_array;
    }

    /**
     * @param array $with_array
     */
    public function setWithArray($with_array)
    {
        $this->with_array = $with_array;
    }
    
    public function all(){
        return User::with($this->with_array)->get();
    }

    public function get($id){
        return User::with($this->with_array)->find($id);
    }

    public function create(){
        return new User();
    }

    public function store(array $input){
        $user = new User();
        $user->fill($input);
        $user->save();
        $this->linkToRole($user,$input);
        return $user;
    }

    public function save(array $input){
        /* @var $user User */
        $user = User::find($input['id']);
        $user->fill($input);
        $user->save();
        $this->linkToRole($user,$input);
        return $user;
    }

    public function delete($id){
        /* @var $user User */
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    private function linkToRole(User $user, array $input){

        if (isset($input['roles'])){
            $roles = $input['roles'];
            $user->syncRoles($roles);
        }else {
            $user->syncRoles([]);
        }

        return $user;
    }

}