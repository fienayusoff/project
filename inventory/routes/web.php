<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//function  text untuk sembunyi kan nama file ori test
Route::get('/text', function () {
    return \File::get(public_path() . '\test.txt');
});
//contacts tu nama yg akan dipapar diurl
// Route::resource('contacts', 'ContactController');

// Route::resource('states', 'StateController');

// Route::resource('comments', 'CommentController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/text', function () {
    return \File::get( public_path() .'\test.txt');
});

//Route::resource('contacts','ContactController'); //Laravel 7
//Route::resource('contacts', ContactController::class); //Laravel 8

//Route::resource('states','StateController'); //Laravel 7
//Route::resource('comments','CommentController'); //Laravel 7




Route::post('contact','ContactController@store');
Route::get('contact/{contact}','ContactController@show');
Route::get('contact/{contact}/comments','ContactController@show_comments');
Route::get('contact/{contact}/best-comment','ContactControllerr@show_best_comment');
Route::get('contacts','ContactController@index');
Route::delete('contact/{contact}','ContactController@destroy');

Route::post('contact/{contact}/comment','CommentController@store');
Route::post('comment/{comment}/best-comment','CommentController@best_comment');
Route::get('comments','CommentController@index');
Route::get('comment/{comment}', 'CommentController@show');
Route::delete('comment/{comment}','CommentController@destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

