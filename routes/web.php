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

Route::get('/admin','UsersController@index')->name('admin')->middleware('auth');

Route::resource('coffees','CoffeesController')->middleware('auth');
//dispatch
Route::post('/coffee','CoffeesController@storeDispatch')->middleware('auth');
Route::get('/dispatch','CoffeesController@create')->name('dispatch')->middleware('auth');
//scale
Route::get('/scale','CoffeesController@viewScale')->name('scale')->middleware('auth');
Route::get('/coffees/{coffee}/createScale','CoffeesController@createScale')->name('coffees.createScale')->middleware('auth');
Route::post('/coffees/{coffee}/storeScale','CoffeesController@storeScale')->name('coffees.storeScale')->middleware('auth');
Route::get('/coffees/{coffee}/editScale','CoffeesController@editScale')->name('coffees.editScale')->middleware('auth');
Route::post('/coffees/{coffee}/updateScale','CoffeesController@updateScale')->name('coffees.updateScale')->middleware('auth');
Route::get('/viewScaleFilled','CoffeesController@viewScaleFilled')->name('coffees.viewScaleFilled')->middleware('auth');
//scale
Route::get('/sample','CoffeesController@viewSample')->name('sample')->middleware('auth');
Route::get('/coffees/{coffee}/createSample','CoffeesController@createSample')->name('coffees.createSample')->middleware('auth');
Route::post('/coffees/{coffee}/storeSample','CoffeesController@storeSample')->name('coffees.storeSample')->middleware('auth');
Route::get('/coffees/{coffee}/editSample','CoffeesController@editSample')->name('coffees.editSample')->middleware('auth');
Route::post('/coffees/{coffee}/updateSample','CoffeesController@updateSample')->name('coffees.updateSample')->middleware('auth');
Route::get('/viewSampleFilled','CoffeesController@viewSampleFilled')->name('coffees.viewSampleFilled')->middleware('auth');
//specialty
Route::get('/specialty','CoffeesController@viewSpecialty')->name('specialty')->middleware('auth');
Route::get('/coffees/{coffee}/createSpecialty','CoffeesController@createSpecialty')->name('coffees.createSpecialty')->middleware('auth');
Route::post('/coffees/{coffee}/storeSpecialty','CoffeesController@storeSpecialty')->name('coffees.storeSpecialty')->middleware('auth');
Route::get('/coffees/{coffee}/editSpecialty','CoffeesController@editSpecialty')->name('coffees.editSpecialty')->middleware('auth');
Route::post('/coffees/{coffee}/updateSpecialty','CoffeesController@updateSpecialty')->name('coffees.updateSpecialty')->middleware('auth');
Route::get('/viewSpecialtyFilled','CoffeesController@viewSpecialtyFilled')->name('coffees.viewSpecialtyFilled')->middleware('auth');
//grade
Route::get('/grade','CoffeesController@viewGrade')->name('grade')->middleware('auth');
Route::get('/coffees/{coffee}/createGrade','CoffeesController@createGrade')->name('coffees.createGrade')->middleware('auth');
Route::post('/coffees/{coffee}/storeGrade','CoffeesController@storeGrade')->name('coffees.storeGrade')->middleware('auth');
Route::get('/coffees/{coffee}/editGrade','CoffeesController@editGrade')->name('coffees.editGrade')->middleware('auth');
Route::post('/coffees/{coffee}/updateGrade','CoffeesController@updateGrade')->name('coffees.updateGrade')->middleware('auth');
Route::get('/viewGradeFilled','CoffeesController@viewGradeFilled')->name('coffees.viewGradeFilled')->middleware('auth');



Route::resource('users','UsersController')->middleware('auth');
Route::post('/user','UsersController@store')->middleware('auth');

Route::resource('comments','CommentsController');
Route::post('/comment','CommentsController@store');
Route::get('/comment','CommentsController@create')->name('comment');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
