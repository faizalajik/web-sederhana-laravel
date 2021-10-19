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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mahasiswa/show', 'MahasiswaController@index');

Route::get('/mahasiswa/delete/{id}', 'MahasiswaController@delete');
Route::post('/mahasiswa/input', 'MahasiswaController@input');
Route::post('/mahasiswa/edit', 'MahasiswaController@edit');



