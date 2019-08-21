<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes(['verify' => true]);

// Route::group(['middleware' => 'auth'], function(){    
    // MENU
    Route::get('/admin/menus/data', 'admin\MenusController@list')->name('api.admin.menus.list');
    Route::get('/admin/menus/selectbyid', 'admin\MenusController@show')->name('api.admin.menus.selectbyid');
    Route::get('/admin/menus/delete', 'admin\MenusController@destroy')->name('api.admin.menus.delete');
// });