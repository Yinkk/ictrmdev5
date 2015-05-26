<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Degree;
use App\Models\Position;
use App\Models\Type;
use App\Models\Major;
use App\Models\Faculty;
use App\Models\User;

class UserService extends Service {

    var $with_array = ['roles','faculty','major','type','position','degree'];

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
        $this->linkToFaculty($user,$input);
        $this->linkToMajor($user,$input);
        $this->linkToType($user,$input);
        $this->linkToPosition($user,$input);
        $this->linkToDegree($user,$input);
        return $user;
    }

    public function save(array $input){
        /* @var $user User */
        $user = User::find($input['id']);
        $user->fill($input);
        $user->save();
        $this->linkToRole($user,$input);
        $this->linkToFaculty($user,$input);
        $this->linkToMajor($user,$input);
        $this->linkToType($user,$input);
        $this->linkToPosition($user,$input);
        $this->linkToDegree($user,$input);
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

    private function linkToFaculty(User $user, array $input){
        if (isset($input['faculty'])){
            $faculty_id = $input['faculty']['id'];
            $faculty = Faculty::find($faculty_id);
            $user->faculty()->associate($faculty);
            $user->save();
        }else {

        }
        return $user;
    }
    private function linkToMajor(User $user, array $input){
        if (isset($input['major'])){
            $major_id = $input['major']['id'];
            $major = Major::find($major_id);
            $user->major()->associate($major);
            $user->save();
        }else {

        }
        return $user;
    }

    private function linkToType(User $user, array $input){

        if (isset($input['type'])){
            $type_id = $input['type']['id'];
            $type = Type::find($type_id);
            $user->type()->associate($type);
            $user->save();
        }
        return $user;
    }

    private function linkToPosition(User $user, array $input){
        if(isset($input['position'])){
            $position_id = $input['position']['id'];
            $position = Position::find($position_id);
            $user->position()->associate($position);
            $user->save();
        }
    }

    private function linkToDegree(User $user, array $input){
        if(isset($input['degree'])){
            $degree_id = $input['degree']['id'];
            $degree = Degree::find($degree_id);
            $user->degree()->associate($degree);
            $user->save();
        }
    }
}