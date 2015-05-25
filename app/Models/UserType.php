<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 8:13
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model{

    protected $table = 'userType';

    protected $fillable = ['name'];


//    public function UserPosition(){
//        return $this->hasMany("App\Models\UserPosition","usertype_id");
//    }
}