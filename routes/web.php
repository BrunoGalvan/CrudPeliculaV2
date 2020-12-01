<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/','App\Http\Controllers\PeliculaController@index')->name('inicio');
Route::post('/agregar','App\Http\Controllers\PeliculaController@store')->name('store');
Route::get('/editar/{id}' ,'App\Http\Controllers\PeliculaController@edit')->name('editar');
Route::put('/update/{id}' ,'App\Http\Controllers\PeliculaController@update')->name('update');
Route::delete('/eliminar/{id}' ,'App\Http\Controllers\PeliculaController@destroy')->name('eliminar');
Route::get('/registrar','App\Http\Controllers\PeliculaController@create')->name('agregar');
Route::get('/estadoon/{id}','App\Http\Controllers\PeliculaController@stateon')->name('estadoon');
Route::get('/estadooff/{id}','App\Http\Controllers\PeliculaController@stateoff')->name('estadooff');
Route::put('/asignarturno/{id}','App\Http\Controllers\PeliculaController@turn')->name('asignarturno');



Route::get('/turno','App\Http\Controllers\TurnoController@index')->name('turno');
Route::post('/agregart','App\Http\Controllers\TurnoController@store')->name('storet');
Route::get('/editart/{id}' ,'App\Http\Controllers\TurnoController@edit')->name('editart');
Route::put('/updatet/{id}' ,'App\Http\Controllers\TurnoController@update')->name('updatet');
Route::delete('/eliminart/{id}' ,'App\Http\Controllers\TurnoController@destroy')->name('eliminart');
Route::get('/registrart','App\Http\Controllers\TurnoController@create')->name('registrart');
Route::get('/estadoont/{id}','App\Http\Controllers\TurnoController@stateon')->name('estadoont');
Route::get('/estadoofft/{id}','App\Http\Controllers\TurnoController@stateoff')->name('estadoofft');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
