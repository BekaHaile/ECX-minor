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

Route::resource('coffees','CoffeesController');
//dispatch
Route::post('/coffee','CoffeesController@storeDispatch');
Route::get('/dispatch','CoffeesController@create')->name('dispatch');
//scale
Route::get('/scale','CoffeesController@viewScale')->name('scale');
Route::get('/coffees/{coffee}/createScale','CoffeesController@createScale')->name('coffees.createScale');
Route::post('/coffees/{coffee}/storeScale','CoffeesController@storeScale')->name('coffees.storeScale');
Route::get('/coffees/{coffee}/editScale','CoffeesController@editScale')->name('coffees.editScale');
Route::post('/coffees/{coffee}/updateScale','CoffeesController@updateScale')->name('coffees.updateScale');
Route::get('/viewScaleFilled','CoffeesController@viewScaleFilled')->name('coffees.viewScaleFilled');
//scale
Route::get('/sample','CoffeesController@viewSample')->name('sample');
Route::get('/coffees/{coffee}/createSample','CoffeesController@createSample')->name('coffees.createSample');
Route::post('/coffees/{coffee}/storeSample','CoffeesController@storeSample')->name('coffees.storeSample');
Route::get('/coffees/{coffee}/editSample','CoffeesController@editSample')->name('coffees.editSample');
Route::post('/coffees/{coffee}/updateSample','CoffeesController@updateSample')->name('coffees.updateSample');
Route::get('/viewSampleFilled','CoffeesController@viewSampleFilled')->name('coffees.viewSampleFilled');

Route::resource('users','UsersController');
Route::post('/user','UsersController@store');

Route::resource('comments','CommentsController');
Route::post('/comment','CommentsController@store');
Route::get('/comment','CommentsController@create')->name('comment');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/