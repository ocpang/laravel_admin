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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('basicAuth');
Route::get('logout', 'Auth\LoginController@logout');

/*
|--------------------------------------------------------------------------
| ADMINISTRATOR
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
    Route::get('/admin/my_profile', 'AdminController@my_profile')->name('admin.my_profile');
    Route::post('/admin/save_profile', 'AdminController@save_profile')->name('admin.save_profile');
    Route::get('/admin/users', 'AdminController@users')->name('admin.users');

    // MENUS
    Route::get('/admin/menus', 'admin\MenusController@index')->name('admin.menus');
    Route::post('/admin/menus/store', 'admin\MenusController@store')->name('admin.menus.store');
});