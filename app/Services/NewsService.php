<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/5/2558
 * Time: 7:58
 */
namespace App\Services;

use App\Models\News;

class NewsService extends Service{
    var $with_array = [];

    public function all(){
        return News::all();
    }

    public function get($id){
        return News::find($id);
    }

    public function create(){
        return new News();
    }

    public function store(array $input){
        $news = new News();
        $news->fill($input);
        $news->save();
        return $news;
    }

    public function save(array $input){
        $news = News::find($input['id']);
        $news->fill($input);
        $news->save();
        return $news;
    }

    public function delete($id){
        $news = News::find($id);
        $news->delete();
        $news->save();
        return $news;
    }
}