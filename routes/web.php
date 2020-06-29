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
    return view('admin.layout.content');
});


Route::get('phongban','DanhmucController@getDanhSachPB');
Route::get('chucvu','DanhmucController@getDanhSachCV');
Route::get('nhanvien','DanhmucController@getDanhSachNV');


