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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// home of current user
Route::get('/home', 'HomeController@index')->name('todo_list');

// angular TodoCtr template
Route::get('/todo/todoCtrl', 'HomeController@todoCtrl')->name('todo_ctrl');

// register new User
Route::post('register', 'Auth\RegisterController@register');
