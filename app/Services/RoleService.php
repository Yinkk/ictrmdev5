<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Role;

class RoleService extends Service {

    var $with_array = [];

    public function all(){
        return Role::all();
    }

    public function get($id){
        return Role::find($id);
    }

    public function create(){
        return new Role();
    }

    public function store(array $input){
        $role = new Role();
        $role->fill($input);
        $role->save();
        return $role;
    }

    public function save(array $input){
        /* @var $role Role */
        $role = Role::find($input['id']);
        $role->fill($input);
        $role->save();
        return $role;
    }

    public function delete($id){
        /* @var $role Role */
        $role = Role::find($id);
        $role->delete();
        return $role;
    }

}