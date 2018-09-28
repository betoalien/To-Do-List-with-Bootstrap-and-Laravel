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

Route::get('/',[
    'uses'=>'famsaControlador@show',
    'as'=>'famsa.show'
]);

Route::post('/create',[
    'uses'=>'famsaControlador@create',
    'as'=>'famsa.create'
]);
Route::delete('tasks/{famsa}', 'famsaControlador@destroy');

Route::patch('tasks/{famsa}', 'famsaControlador@update');


