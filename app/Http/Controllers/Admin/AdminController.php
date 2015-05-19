<?php
/**
 * Created by PhpStorm.
 * User: yeunyong.ka
 * Date: 18/5/2558
 * Time: 15:01
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends  Controller {

    public function index(){
        return view("admin.home");
    }

    public function user(){
        return view("admin.user");
    }

    public function role(){
        return view("admin.role");
    }

    public function news(){
        return view("admin.news");
    }
}