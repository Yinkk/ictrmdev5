<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\UserType;

class UserTypeService extends Service {

    var $with_array = [
    //    'userPosition'
    ];

    public function all(){
        return UserType::with($this->with_array)->get();
    }

    public function get($id){
        return UserType::find($id);
    }

    public function create(){
        return new UserType();
    }

    public function store(array $input){
        $userType = new UserType();
        $userType->fill($input);
        $userType->save();
        return $userType;
    }

    public function save(array $input){
        /* @var $userType userType */
        $userType = UserType::find($input['id']);
        $userType->fill($input);
        $userType->save();
        return $userType;
    }

    public function delete($id){
        /* @var $userType UserType */
        $userType = UserType::find($id);
        $userType->delete();
        return $userType;
    }

}