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

Route::get('/', 'PagesController@home')->name('home');

Route::get('/login','PagesController@login')->name('login');

Route::get('/about','PagesController@about')->name('about');

Route::get('/report','PagesController@report')->name('report');

Route::get('/help','PagesController@help')->name('help');

Route::get('/admin','UsersController@index')->name('admin');

Route::get('/dispatch','CoffeesController@create')->name('dispatch');

Route::resource('coffees','CoffeesController');
Route::post('/coffee','CoffeesController@storeDispatch');

Route::resource('users','UsersController');
Route::post('/user','UsersController@store');

Route::resource('comments','CommentsController');
Route::post('/comment','CommentsController@store');
Route::get('/comment','CommentsController@create')->name('comment');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/