<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blog.home');
});
Route::group(['prefix'=>'admin', 'middleware'=>['auth'], 'namespace' => 'Admin'],function (){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category','CategoryController', ['as' => 'admin']);
  Route::resource('/article','ArticleController', ['as' => 'admin']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
