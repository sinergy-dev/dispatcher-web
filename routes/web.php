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

Route::get('/welcome', function () {
    return view('welcome_engineer');
})->name('welcome_engineer');

Route::get('guestState','GuestController@guestState');


// Route::get('/partner/{id}', function(){
// 	return view('auth.requirement_join');
// })->name('partner_advanced');

Route::get('testExcelRead','GuestController@testExcelRead');
Route::get('testFirebase','GuestController@testFirebase');
Route::get('testChatModerator','GuestController@testChatModerator');
Route::get('testCalendar','GuestController@testCalendar');

Route::get('/job/detail/createLetterAndQR', 'JobController@createLetterAndQR')->name('job.createLetterAndQR');
Route::get('testPDF', 'JobController@createLetterAndQR')->name('testPDF');
Route::get('testQR', 'JobController@testQR')->name('testQR');
Route::get('testLiveNotification', 'JobController@testLiveNotification')->name('testLiveNotification');
Route::get('testLiveNotificationView', 'JobController@testLiveNotificationView')->name('testLiveNotification2');
Route::get('testLatterAssignment', function(){
	return view('pdf.letter_of_assignment');
})->name('testLatterAssignment');

Route::get('loa/{parameter}','GuestController@showLeaterOfAssignment')->name('loa.show');

Route::get('/partner', function(){
	return view('auth.requirement_join');
});

Route::get('/partner/{id}', function(){
	return view('auth.requirement_join');
});

Auth::routes();
Route::group(['middleware' => ['auth','role']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	Route::get('/job/index', 'JobController@index')->name('job.index');
	Route::get('/job/detail/{id}', 'JobController@detail')->name('job.detail');
	Route::get('job/notification_all','JobController@notification_all')->name('job_notification_all');

	Route::get('/engineer/index','EngineerController@index')->name('engineer.index');

	Route::get('/client/index','ClientController@index')->name('client.index');
	Route::get('/setting/category/index','CategoryController@index')->name('category.index');
	Route::get('/region/index','RegionController@index')->name('region.index');
	Route::get('/candidate/index','PartnerController@index')->name('partner.index');
	Route::get('/candidate/detail/{id}','PartnerController@detail')->name('partner.detail');

	Route::get('/testLoa','JobController@createLetterAndQRTesting');
});
