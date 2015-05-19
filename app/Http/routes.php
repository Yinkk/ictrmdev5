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
});

Route::get('/admin/home', 'Admin\AdminController@index');
Route::get('/admin/user', 'Admin\AdminController@user');
Route::get('/admin/role', 'Admin\AdminController@role');
Route::get('/admin/news', 'Admin\AdminController@news');
Route::get('/admin/major', 'Admin\AdminController@major');
Route::get('/admin/budget', 'Admin\AdminController@budget');
Route::get('/admin/faculty', 'Admin\AdminController@faculty');

