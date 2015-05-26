<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Type;

class TypeService extends Service {

    var $with_array = [
    //    'userPosition'
    ];

    public function all(){
        return Type::with($this->with_array)->get();
    }

    public function get($id){
        return Type::find($id);
    }

    public function create(){
        return new Type();
    }

    public function store(array $input){
        $type = new Type();
        $type->fill($input);
        $type->save();
        return $type;
    }

    public function save(array $input){
        /* @var $type type */
        $type = Type::find($input['id']);
        $type->fill($input);
        $type->save();
        return $type;
    }

    public function delete($id){
        /* @var $type type */
        $type = Type::find($id);
        $type->delete();
        return $type;
    }

}