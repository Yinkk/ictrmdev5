<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 8:13
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model{

    protected $table = 'project';

    protected $fillable = ['name_th','name_en','contract', 'period','projbudget','problem','purpose','methodology','plan','publish','coresearcher'];

    public function budget(){
        return $this->belongsTo("App\Models\Budget");
    }

    public function faculty(){
        return $this->belongsTo("App\Models\Faculty");
    }

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function files(){
        return $this->hasMany("App\Models\File");
    }


}