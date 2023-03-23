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

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/home', 'ClienteController@index')->name('home');
    
    Route::post('/cliente', 'ClienteController@store')->name('cliente.store');
    Route::patch('/cliente/{cliente}', 'ClienteController@update')->name('cliente.update');
    Route::delete('/cliente/{cliente}', 'ClienteController@destroy')->name('cliente.destroy');
});

