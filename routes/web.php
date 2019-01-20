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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/pages/{id}','PagesController@show');
Route::post('/pages/{id}','CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('ticket','TicketsController');

/*
Route::get('/admin/login','AdminsController@login');
Route::post('/admin','AdminsController@store');
Route::get('/admin/dashboard','AdminsController@dashboard');
*/