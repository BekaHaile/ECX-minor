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
//specialty
Route::get('/specialty','CoffeesController@viewSpecialty')->name('specialty');
Route::get('/coffees/{coffee}/createSpecialty','CoffeesController@createSpecialty')->name('coffees.createSpecialty');
Route::post('/coffees/{coffee}/storeSpecialty','CoffeesController@storeSpecialty')->name('coffees.storeSpecialty');
Route::get('/coffees/{coffee}/editSpecialty','CoffeesController@editSpecialty')->name('coffees.editSpecialty');
Route::post('/coffees/{coffee}/updateSpecialty','CoffeesController@updateSpecialty')->name('coffees.updateSpecialty');
Route::get('/viewSpecialtyFilled','CoffeesController@viewSpecialtyFilled')->name('coffees.viewSpecialtyFilled');
//grade
Route::get('/grade','CoffeesController@viewGrade')->name('grade');
Route::get('/coffees/{coffee}/createGrade','CoffeesController@createGrade')->name('coffees.createGrade');
Route::post('/coffees/{coffee}/storeGrade','CoffeesController@storeGrade')->name('coffees.storeGrade');
Route::get('/coffees/{coffee}/editGrade','CoffeesController@editGrade')->name('coffees.editGrade');
Route::post('/coffees/{coffee}/updateGrade','CoffeesController@updateGrade')->name('coffees.updateGrade');
Route::get('/viewGradeFilled','CoffeesController@viewGradeFilled')->name('coffees.viewGradeFilled');



Route::resource('users','UsersController');
Route::post('/user','UsersController@store');

Route::resource('comments','CommentsController');
Route::post('/comment','CommentsController@store');
Route::get('/comment','CommentsController@create')->name('comment');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
