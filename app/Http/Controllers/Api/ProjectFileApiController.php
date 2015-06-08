<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\File;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectFileApiController extends Controller {


    public function __construct(ProjectService $projectService){
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $facultyId
     * @return Response
     */
    public function index($projectId)
    {
        $filetypeid = 2;
        if(\Input::has('filetype_id')){
            $filetypeid = \Input::get('filetype_id');
        }
        /* @var Project $project */
        $project = $this->projectService->get($projectId);
        $file = $project->files()->where('filetype_id','=',$filetypeid)->orderBy('created_at','desc')->get();

        return $file;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($projectId)
    {
        return $this->projectService->saveProjectFile($projectId, \Input::instance());
    }

    public function destroy($projectId,$fileid)
    {
        return $this->projectService->deleteProjectFile($projectId,$fileid);
    }

}
