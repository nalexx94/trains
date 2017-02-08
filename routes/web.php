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

Route::get('/',['as' => 'home','uses'=>'ScheduleController@index'] );

Route::get('/add',['as' => 'add-schedule','uses'=>'ScheduleController@getAdd'] );
Route::post('/add',['as' => 'add-schedule','uses'=>'ScheduleController@postAdd'] );

Route::get('/edit/{id}',['as' => 'edit-schedule','uses'=>'ScheduleController@getEdit'] );
Route::post('/edit/{id}',['as' => 'edit-schedule','uses'=>'ScheduleController@postEdit'] );

Route::get('/delete/{id}',['as' => 'delete-schedule','uses'=>'ScheduleController@getDelete'] );
