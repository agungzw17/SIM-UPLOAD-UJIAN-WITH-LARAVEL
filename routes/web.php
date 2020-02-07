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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
})->name('loginhome');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



    Route::resource('users', 'AdminUsersController', [

        'names' => [
            'index' => 'user.index',
            'create' => 'user.create',
            'edit' => 'user.edit',
            'store' => 'user.store'
            // etc...
        ]

    ]);
Route::middleware('auth')->group(function (){
    Route::resource('/dosen', 'DosenController', [

        'names' => [
            'index' => 'dosen.index',
            'create' => 'dosen.create',
            'edit' => 'dosen.edit',
            'store' => 'dosen.store'
            // etc...
        ]

    ]);
    Route::get('/berhasil', 'DosenController@berhasil')->name('berhasil');
});

Route::get('/download', 'FileSoalController@download');
Route::get('/file/{id}', 'DosenController@show')->name('downloadfile');

