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
    return view('welcome');
});

Route::get('testPDF', 'JobController@createLetterAndQR')->name('testPDF');
Route::get('testQR', 'JobController@testQR')->name('testQR');
Route::get('testLiveNotification', 'JobController@testLiveNotification')->name('testLiveNotification');
Route::get('testLiveNotificationView', 'JobController@testLiveNotificationView')->name('testLiveNotification2');
Route::get('testLatterAssignment', function(){
	return view('pdf.letter_of_assignment');
})->name('testLatterAssignment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/job/index', 'JobController@index')->name('job.index');
Route::get('/job/detail/{id}', 'JobController@detail')->name('job.detail');
Route::get('/job/detail/createLetterAndQR', 'JobController@createLetterAndQR')->name('job.createLetterAndQR');

Route::get('/engineer/index','EngineerController@index')->name('engineer.index');

Route::get('/client/index','ClientController@index')->name('client.index');

Route::get('/region/index','RegionController@index')->name('region.index');
