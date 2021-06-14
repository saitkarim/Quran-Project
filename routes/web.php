<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use App\Http\Controllers\RequestController;

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

Route::get('/home', [MainController::class, 'index' ])->name('home');

Route::get('/home/{lang}', function($lang){
    App::setlocale($lang);
    return view('home');
});

Route::get('request', 'App\Http\Controllers\EmailController@index')->name('request');

Route::post('request/send', 'App\Http\Controllers\EmailController@send')->name('request/send');

Route::get('/request/{lang}', function($lang){
    App::setlocale($lang);
    return view('request');
});

Route::get('/auth/login', 'App\Http\Controllers\MainController@login') -> name('auth.login');

Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');

Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');

Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');

Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::get('/auth/login/{lang}', function($lang){
    App::setlocale($lang);
    return view('auth/login');
});

Route::get('/auth/register/{lang}', function($lang){
    App::setlocale($lang);
    return view('auth/register');
});

Route::group(['middleware'=>['AuthCheck']], function(){

    Route::get('/admin/dashboard', [MainController::class, 'dashboard']);
    
    Route::get('/auth/login', 'App\Http\Controllers\MainController@login') -> name('auth.login');

    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');

});


