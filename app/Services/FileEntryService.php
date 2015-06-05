<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:20
 */

namespace App\Services;

use App\Models\Fileentry;

class FileEntryService extends Service {

    var $with_array = [];

    public function all(){
        return Fileentry::all();
    }

    public function get($id){
        return Fileentry::find($id);
    }

    public function create(){
        return new Fileentry();
    }

    public function store(array $input){

        $file = Request::file('filefield');
        return $file;
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;

        $entry->save();

        return redirect('fileentry');
    }

    public function save(array $input){
        /* @var $fileentry Fileentry */
        $fileentry = Fileentry::find($input['id']);
        $fileentry->fill($input);
        $fileentry->save();
        return $fileentry;
    }

    public function delete($id){
        /* @var $fileentry Fileentry */
        $fileentry = Fileentry::find($id);
        $fileentry->delete();
        return $fileentry;
    }

}