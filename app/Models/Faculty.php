<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 8:13
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model{
    protected $table = 'faculty';

    protected $fillable = ['name_th','name_en'];
}

