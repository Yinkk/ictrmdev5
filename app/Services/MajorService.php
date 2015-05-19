<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Major;

class MajorService extends Service {

    var $with_array = [];

    public function all(){
        return Major::all();
    }

    public function get($id){
        return Major::find($id);
    }

    public function create(){
        return new Major();
    }

    public function store(array $input){
        $major = new Major();
        $major->fill($input);
        $major->save();
        return $major;
    }

    public function save(array $input){
        /* @var $major Major */
        $major = Major::find($input['id']);
        $major->fill($input);
        $major->save();
        return $major;
    }

    public function delete($id){
        /* @var $major Major */
        $major = Major::find($id);
        $major->delete();
        return $major;
    }

}