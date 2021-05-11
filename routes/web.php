<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\CloudPaymentsSubscription;

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

Route::post('/', 'App\Http\Controllers\CloudPaymentsController@cloudCurl');

Route::get('/', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/', [RegisteredUserController::class, 'store']);

// CLOUD PAYMENT CALLBACKS
Route::group(['prefix' => 'callback'], function(){
    // Route::get('test-payment', 'App\Http\Controllers\CloudPaymentsController@test');
    Route::post('payed', 'App\Http\Controllers\CloudPaymentsController@payed');
    Route::post('fail', 'App\Http\Controllers\CloudPaymentsController@fail');
    // Route::post('recurrent', 'App\Http\Controllers\CloudPaymentsController@recurrent');
});


Route::get('test33', function () {
    $payment = CloudPaymentsSubscription::where('cloudpayments_id','699324037')->first();
    dd($payment);
});

// Route::get('/test22', 'App\Http\Controllers\CloudPaymentsController@chargeToken');

