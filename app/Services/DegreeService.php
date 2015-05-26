<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 7:58
 */
namespace App\Services;

use App\Models\Degree;

class DegreeService extends Service{
    var $with_array = [];

    public function all(){
        return Degree::all();
    }

    public function get($id){
        return Degree::find($id);
    }

    public function create(){
        return new Degree();
    }

    public function store(array $input){
        $degree = new Degree();
        $degree->fill($input);
        $degree->save();
        return $degree;
    }

    public function save(array $input){
        $degree = Degree::find($input['id']);
        $degree->fill($input);
        $degree->save();
        return $degree;
    }

    public function delete($id){
        $degree = Degree::find($id);
        $degree->delete();
        $degree->save();
        return $degree;
    }
}