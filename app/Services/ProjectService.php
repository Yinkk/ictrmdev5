<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Project;

class ProjectService extends Service {

    var $with_array = [
        //    'userPosition'
    ];

    public function all(){
        return Project::with($this->with_array)->get();
    }

    public function get($id){
        return Project::find($id);
    }

    public function create(){
        return new Project();
    }

    public function store(array $input){
        $project = new Project();
        $project->fill($input);
        $project->save();
        return $project;
    }

    public function save(array $input){
        /* @var $project project */
        $project = Project::find($input['id']);
        $project->fill($input);
        $project->save();
        return $project;
    }

    public function delete($id){
        /* @var $project project */
        $project = Project::find($id);
        $project->delete();
        return $project;
    }

}