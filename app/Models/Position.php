<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 8:13
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Position extends Model{
    protected $table = 'position';

    protected $fillable = ['name'];

    public function type(){
        return $this->belongsTo("App\Models\Type");
    }
}