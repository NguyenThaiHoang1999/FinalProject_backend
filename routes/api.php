<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('', 'api\ProductController@index')->name('index'); //Danh sách;
Route::post('', 'api\ProductController@store')->name('store'); //Lưu;
Route::put('update/{id}', 'api\ProductController@update')->name('update'); //Cập nhập;
Route::delete('delete/{id}', 'api\ProductController@delete')->name('delete'); //Xóa;

