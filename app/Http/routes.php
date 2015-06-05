<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
\Blade::setContentTags('<%', '%>'); // for variables and all things Blade
\Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'api'], function () {
    // api/user/XXX
    Route::resource('user', 'Api\UserApiController');
    Route::resource('news', 'Api\NewsApiController');
    Route::resource('role', 'Api\RoleApiController');
    Route::resource('major', 'Api\MajorApiController');
    Route::resource('budget', 'Api\BudgetApiController');
    Route::resource('faculty', 'Api\FacultyApiController');
    Route::resource('type', 'Api\TypeApiController');
    Route::resource('position', 'Api\PositionApiController');
    Route::resource('degree', 'Api\DegreeApiController');
    Route::resource('project', 'Api\ProjectApiController');
    Route::resource('fileentry', 'Api\ProjectApiController');
});

Route::get('/admin/home', 'Admin\AdminController@index');
Route::get('/admin/user', 'Admin\AdminController@user');
Route::get('/admin/role', 'Admin\AdminController@role');
Route::get('/admin/news', 'Admin\AdminController@news');
Route::get('/admin/major', 'Admin\AdminController@major');
Route::get('/admin/budget', 'Admin\AdminController@budget');
Route::get('/admin/faculty', 'Admin\AdminController@faculty');
Route::get('/admin/type', 'Admin\AdminController@type');
Route::get('/admin/project', 'Admin\AdminController@project');
Route::get('/admin/fileentry', 'Admin\AdminController@fileentry');


//Route::get('fileentry', 'FileEntryController@index');
//Route::get('fileentry/get/{filename}', [
//    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
//Route::post('fileentry/add',[
//    'as' => 'addentry', 'uses' => 'FileEntryController@add']);


