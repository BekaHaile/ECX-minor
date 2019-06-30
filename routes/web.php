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

Route::get('/login2','PagesController@login')->name('login');

Route::get('/about','PagesController@about')->name('about');

//Report routes
Route::get('/guestReport','ReportController@guestReport')->name('guestReport');
Route::get('/priceReport','ReportController@priceReport')->name('priceReport')->middleware('auth');
Route::get('/coffeeReport','ReportController@coffeeReport')->name('coffeeReport')->middleware('auth');
//Route::get('/userReport','ReportController@userReport')->name('userReport')->middleware('auth');

Route::get('/help','PagesController@help')->name('help');

Route::get('/admin','UsersController@index')->name('admin')->middleware('auth');

Route::get('/manager','UsersController@manage')->name('manager')->middleware('auth');

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

//Jar approval
Route::get('/jar','CoffeesController@jar')->name('jar')->middleware('auth');
Route::get('/viewJarApproved','CoffeesController@viewJarApproved')->name('coffees.viewJarApproved')->middleware('auth');
Route::get('/coffees/{coffee}/approveJar','CoffeesController@approveJar')->name('coffees.approveJar')->middleware('auth');
Route::post('/coffees/{coffee}/storeJar','CoffeesController@storeJar')->name('coffees.storeJar')->middleware('auth');
Route::get('/viewCompletedJar','CoffeesController@viewCompletedJar')->name('coffees.viewCompletedJar')->middleware('auth');

//price info input by representative
Route::get('/rep','CoffeesController@rep')->name('rep')->middleware('auth');
Route::get('/priceDone','CoffeesController@priceDone')->name('priceDone')->middleware('auth');Route::get('/coffees/{coffee}/createGrade','CoffeesController@createGrade')->name('coffees.createGrade')->middleware('auth');
Route::get('/coffees/{coffee}/createPrice','CoffeesController@createPrice')->name('coffees.createPrice')->middleware('auth');
Route::post('/coffees/{coffee}/storePrice','CoffeesController@storePrice')->name('coffees.storePrice')->middleware('auth');
Route::get('/coffees/{coffee}/editPrice','CoffeesController@editPrice')->name('coffees.editPrice')->middleware('auth');
Route::post('/coffees/{coffee}/updatePrice','CoffeesController@updatePrice')->name('coffees.updatePrice')->middleware('auth');

Route::resource('users','UsersController')->middleware('auth');
Route::post('/user','UsersController@store')->middleware('auth');

Route::resource('comments','CommentsController');
Route::post('/comment','CommentsController@store');
Route::get('/comment','CommentsController@create')->name('comment');

/*Route::get('/users/{name}/{id}',function ($name, $id){
    return 'The user is '.$name.$id;
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('guest');

//Search routes
Route::get('/searchUser','SearchController@searchUser')->name('searchUser');
Route::get('/searchDispatch','SearchController@searchDispatch')->name('searchDispatch');
Route::get('/searchScale','SearchController@searchScale')->name('searchScale');
Route::get('/searchSample','SearchController@searchSample')->name('searchSample');
Route::get('/searchSpecialty','SearchController@searchSpecialty')->name('searchSpecialty');
Route::get('/searchGrade','SearchController@searchGrade')->name('searchGrade');
Route::get('/searchJar','SearchController@searchJar')->name('searchJar');
Route::get('/searchInputPrice','SearchController@searchInputPrice')->name('searchInputPrice');

//Search reports
//Search price report for guest users
Route::post('/searchGuestReport','SearchController@searchGuestReport')->name('searchGuestReport');

Route::post('/searchPriceReport','SearchController@searchPriceReport')->name('searchPriceReport');
Route::post('/searchCoffeeReport','SearchController@searchCoffeeReport')->name('searchCoffeeReport');
Route::get('/searchUserReport','SearchController@searchUserReport')->name('searchUserReport');
