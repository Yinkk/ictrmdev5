<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Budget;

class BudgetService extends Service {

    var $with_array = [];

    public function all(){
        return Budget::all();
    }

    public function get($id){
        return Budget::find($id);
    }

    public function create(){
        return new Budget();
    }

    public function store(array $input){
        $budget = new Budget();
        $budget->fill($input);
        $budget->save();
        return $budget;
    }

    public function save(array $input){
        /* @var $budget Budget */
        $budget = Budget::find($input['id']);
        $budget->fill($input);
        $budget->save();
        return $budget;
    }

    public function delete($id){
        /* @var $budget Budget */
        $budget = Budget::find($id);
        $budget->delete();
        return $budget;
    }

}