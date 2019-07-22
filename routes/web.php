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

Route::post('/backup', 'BackupController@backup');

Route::get('/todo', function () {
    return view('tasks');
});

Route::get('all_tasks', 'TaskController@index');
Route::post('create_task', 'TaskController@store');
Route::post('edit_task', 'TaskController@edit');