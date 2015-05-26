<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 7:58
 */
namespace App\Services;

use App\Models\Position;

class PositionService extends Service{
    var $with_array = [];

    public function all(){
        return Position::all();
    }

    public function get($id){
        return Position::find($id);
    }

    public function create(){
        return new Position();
    }

    public function store(array $input){
        $position = new Position();
        $position->fill($input);
        $position->save();
        return $news;
    }

    public function save(array $input){
        $position = Position::find($input['id']);
        $position->fill($input);
        $position->save();
        return $position;
    }

    public function delete($id){
        $position = Position::find($id);
        $position->delete();
        $position->save();
        return $position;
    }
}