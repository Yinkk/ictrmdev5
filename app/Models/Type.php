<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 8:13
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Type extends Model{

    protected $table = 'type';

    protected $fillable = ['name'];


//    public function UserPosition(){
//        return $this->hasMany("App\Models\UserPosition","usertype_id");
//    }
}