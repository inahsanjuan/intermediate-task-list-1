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

Route::get('/home', 'HomeController@index');

Route::get('/view', 'TaskController@view');

Route::get('/index', 'TaskController@create');

Route::post('/task', 'TaskController@store');

Route::delete('/view/{task}', 'TaskController@destroy');

Route::put('/view/{task}', 'TaskController@upstatus');

Route::get('/edit/{task}', 'TaskController@editPage');

Route::patch('/view/{task}', 'TaskController@updateTask');

//Route::get('/view', 'TaskController@index2  ');
