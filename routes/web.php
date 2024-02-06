<?php

use App\Http\Controllers\BigDataController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\SquareController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], 'captcha-basic', [CaptchaController::class, 'captchaBasic'])->name('captcha_basic');
Route::match(['get', 'post'], 'google-captcha', [CaptchaController::class, 'googleCaptcha'])->name('google_captcha');

Route::prefix('big-data')->name('big_data.')->group(function () {
    Route::match(['get', 'post'], '/', [BigDataController::class, 'index'])->name('index');
});

Route::get('get-payment', [SquareController::class, 'getPayment'])->name('get_payment');
Route::post('post-payment', [SquareController::class, 'postPayment'])->name('post_payment');
