<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Faculty;

class FacultyService extends Service {

    var $with_array = [];

    public function all(){
        return Faculty::all();
    }

    public function get($id){
        return Faculty::find($id);
    }

    public function create(){
        return new Faculty();
    }

    public function store(array $input){
        $faculty = new Faculty();
        $faculty->fill($input);
        $faculty->save();
        return $faculty;
    }

    public function save(array $input){
        /* @var $faculty Faculty */
        $faculty = Faculty::find($input['id']);
        $faculty->fill($input);
        $faculty->save();
        return $faculty;
    }

    public function delete($id){
        /* @var $faculty Faculty */
        $faculty = Faculty::find($id);
        $faculty->delete();
        return $faculty;
    }

}