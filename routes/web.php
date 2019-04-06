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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contactus', [
    'uses' => 'ContactUSController@sendFeedback'
]);
Route::post('/contactus', [
    'uses' => 'ContactUSController@addNewFeedback',
    'as' => 'contactus.addNewFeedback'
]);

Route::get('/feedbacks', [
        'middleware' => 'auth', 
        'uses' => 'ContactUSController@allFeedback'
]);

Route::get('/weather', [
        'middleware' => 'auth', 
        'uses' => 'WeatherController@index'
]);
