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

Route::get('/comment','PagesController@comment')->name('comment');

Route::get('/help','PagesController@help')->name('help');

Route::get('/admin','PagesController@admin')->name('admin');

Route::get('/dispatch','PagesController@dispatchs')->name('dispatchs');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/