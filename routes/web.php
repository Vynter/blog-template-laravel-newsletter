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

/*Route::get('/', function () {
    return view('default');
});*/
Route::get('/', 'PageController@index')->name('index'); // main page
Route::get('about', 'PageController@about')->name('about'); // about
Route::get('sample', 'PageController@sample')->name('sample'); // random
Route::get('contact', 'PageController@contact')->name('contact'); // contacte
//Route::get('article/{slug}', 'PageController@show')->name('pages.show');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout'); //overred du logout
//garder que deux route
Route::resource('articles', 'ArticleController');
Auth::routes(); // it came with auth

Route::get('/home', 'HomeController@index')->name('home');

//newsletter
Route::post('newsletter', 'NewsletterController@store')->name('newsletter.store');