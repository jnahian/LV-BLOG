<?php

/*
|
|   Home Routes
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('show', ['as' => 'show', 'uses' => 'HomeController@show']);
Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
