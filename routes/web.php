<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();



//___________frontend.routes__________//


Route::group(['namespace'=> 'App\Http\Controllers\front'],function(){
    Route::get('/', 'FrontController@index')->name('home.page');
    Route::get('/single-product/{slug}', 'FrontController@singleProduct')->name('single.product');
});