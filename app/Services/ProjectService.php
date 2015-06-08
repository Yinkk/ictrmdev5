<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Budget;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Project;

class ProjectService extends Service {

    var $with_array = ['budget','user','faculty'];

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
        return Project::with($this->with_array)->get();
    }

    public function get($id){
        return Project::with($this->with_array)->find($id);
    }

    public function create(){
        return new Project();
    }

    public function store(array $input){
        $project = new Project();
        $project->fill($input);
        $project->save();
        $this->linkToBudget($project,$input);
        $this->linkToUser($project,$input);
        $this->linkToFaculty($project,$input);
        return $project;
    }

    public function save(array $input){
        /* @var $project project */
        $project = Project::find($input['id']);
        $project->fill($input);
        $project->save();
        $this->linkToBudget($project,$input);
        $this->linkToUser($project,$input);
        $this->linkToFaculty($project,$input);
        return $project;
    }

    public function delete($id){
        /* @var $project project */
        $project = Project::find($id);
        $project->delete();
        return $project;
    }

    private function linkToBudget(Project $project, array $input){
        if (isset($input['budget'])){
            $budget_id = $input['budget']['id'];
            $budget = Budget::find($budget_id);
            $project->budget()->associate($budget);
            $project->save();
        }else {

        }
        return $project;
    }

    private function linkToUser(Project $project, array $input){
        if (isset($input['user'])){
            $user_id = $input['user']['id'];
            $user = User::find($user_id);
            $project->user()->associate($user);
            $project->save();
        }else {

        }
        return $project;
    }

    private function linkToFaculty(Project $project, array $input){
        if (isset($input['faculty'])){
            $faculty_id = $input['faculty']['id'];
            $faculty = Faculty::find($faculty_id);
            $project->faculty()->associate($faculty);
            $project->save();
        }else {

        }
        return $project;
    }

    public function saveFlieProject($projectId,Request $input){
        /* @var Faculty $faculty */
        $project = $this->get($projectId);

//        $uuid = Uuid::uuid4(); // ชื่อไฟล์
//        $storage_path= "app/faculties/$facultyId/logo/"; // พาธ
//
//        $destination_path = storage_path($storage_path); // เอาไว้ใน storage ถ้าเอาไว้ public ใช้ public_path($path)
//
//        $input->file('file')->move($destination_path,$uuid); // save ไฟล์
//
//        $logo = $this->getLogoFromModel($faculty);
//
//        $logo->url = "/img/faculties/$facultyId/logo/$uuid";
//        $faculty->logo()->save($logo);
//        return $logo;
    }

}