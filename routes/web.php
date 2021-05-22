<?php

use Illuminate\Support\Facades\Route;
use App\Models\Traffic;

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

    if(\Auth::user())
        return redirect(url('/account'));

    return view('welcome');
});





Route::get('/cancelsubscription', function () {

    if(\Auth::user())
        return redirect(url('/account/subscription'));

    return redirect(url('/login'));
});


Route::get('/privacy', function () {
    return view('static/privacy');
});


Route::get('/terms', function () {
    return view('static/terms');
});

Route::get('/offer', function () {
    return view('static/offer');
});


Route::get('/help', function () {
    return view('static/help');
});




Route::post('/', 'App\Http\Controllers\CloudPaymentsController@cloudCurl');

Route::get('/courses/{theme?}', 'App\Http\Controllers\CourseController@index')->name('courses');
Route::get('/courses/{theme}/{slug}', 'App\Http\Controllers\CourseController@show')->middleware('course.check')->name('course');

Route::get('/draws/{slug}', 'App\Http\Controllers\DrawController@show')->middleware('draw.check')->name('draw');

Route::get('/land/{slug}', 'App\Http\Controllers\LandController@show')->middleware('land.check')->name('land');


Route::get('/account', 'App\Http\Controllers\AccountController@settings')->middleware('logged.check')->name('account');
Route::get('/account/subscription', 'App\Http\Controllers\AccountController@settingsSubscription')->name('account.settings.subscription');
Route::get('/account/course-list', 'App\Http\Controllers\AccountController@courseList')->middleware('logged.check')->name('account.course.list');
Route::get('/account/draw-list', 'App\Http\Controllers\AccountController@drawList')->middleware('logged.check')->name('account.draw.list');

Route::post('/account/update', 'App\Http\Controllers\AccountController@update')->middleware('logged.check')->name('account.update');
Route::post('/account/subscription', 'App\Http\Controllers\CloudPaymentsController@toggleSubscription')->middleware('logged.check')->name('account.subscription');


Route::get('/account/courses/{theme?}', 'App\Http\Controllers\AccountController@courseList')->middleware('logged.check')->name('account.course.list2');


Route::get('/payexpiredsubscription', 'App\Http\Controllers\CloudPaymentsController@payExpired')->name('payexpiredsubscription');
Route::get('/payexpiredsubscription2', 'App\Http\Controllers\CloudPaymentsController@payExpired2')->name('payexpiredsubscription2');


Route::post('/account/password-reset', 'App\Http\Controllers\AccountController@passwordReset');

Route::get('change-password', function() {
	\Auth::logout();

	return redirect(route('password.request'));
});

Route::get('/logout', function(){
	\Auth::logout();

	return redirect(url('/'));
});

Route::post('/feedback/send', 'App\Http\Controllers\Admin\FeedbackCrudController@create');

// AJAX ROUTES WITHOUT LOCATION SEGMENT
Route::group(['prefix' => 'ajax'], function ($router) {
	// CloudPayments
	Route::post('subscription/cancel', 'App\Http\Controllers\Ajax\CloudPaymentsController@cancel');
}); 

// CLOUD PAYMENT CALLBACKS
Route::group(['prefix' => 'callback'], function(){
    // Route::get('test-payment', 'App\Http\Controllers\CloudPaymentsController@test');
	Route::post('payed', 'App\Http\Controllers\CloudPaymentsController@payed');
	Route::post('fail', 'App\Http\Controllers\CloudPaymentsController@fail');
	// Route::post('recurrent', 'App\Http\Controllers\CloudPaymentsController@recurrent');
});


use App\Models\CloudPaymentsSubscription;
Route::get('test33', function () {
    $payment = CloudPaymentsSubscription::where('cloudpayments_id','699324037')->first();
    dd($payment);
});

// Route::get('/test22', 'App\Http\Controllers\CloudPaymentsController@chargeToken');

