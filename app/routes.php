<?php

/*
|
|   Home Routes
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('show', ['as' => 'show', 'uses' => 'HomeController@show']);

/*
|
|   Admin Routes
|*/

Route::get('login', ['as' => 'login', 'uses' => 'UserController@login_form']);
Route::post('admin/login/process', ['as' => 'login.process', 'uses' => 'UserController@login_process']);

Route::group(['before' => 'auth'], function(){
    Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
    Route::resource('admin/user', 'UserController');
    Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
    Route::get('admin/{user}/delete', ['as' => 'user.delete', 'uses' => 'UserController@destroy']);
    Route::resource('post', 'PostController');
    Route::get('post/{id}/delete', ['as' => 'post.delete', 'uses' => 'PostController@destroy']);
    Route::get('post/{id}/approve', ['as' => 'post.approve', 'uses' => 'PostController@approve']);
});