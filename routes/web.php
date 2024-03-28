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



// Auth::routes();

//__________customer.login.registration_________
Route::middleware(['not_guest'])->group(function(){
    Route::get('/logn-show-form', [HomeController::class, 'showForm'])->name('login.showForm');  // show login form when user
    Route::get('/register-show-form', [HomeController::class, 'showRegister'])->name('register.showForm');  // show register form when user
    Route::post('/user/register',[HomeController::class, 'register'])->name('user.register');  //for registration
    Route::post('/user/login',[HomeController::class, 'login'])->name('user.login');  //for registration
    
});
Route::get('/user/logout',[HomeController::class, 'logout'])->name('user.logout');  //for registration
//______customer.login.registration.end__________


//___________frontend.routes__________//
Route::group(['namespace'=> 'App\Http\Controllers\front'],function(){
    Route::get('/', 'FrontController@index')->name('home.page');
    Route::get('/single-product/{slug}', 'FrontController@singleProduct')->name('single.product');

    //________product.review.route__________
    Route::post('/review/{product_id}','ReviewController@addReview')->name( 'product.review' )->middleware(['auth_check']);
    //________product.wishlist.route_________
    Route::get('/wishlist/{id}','ReviewController@wishlist')->name('product.wishlist'); //  add wishlist
    Route::get('/view/wishlist','ReviewController@index')->name('wishlist.view');      // view wishlist page
    //  delete wishlist from wishlist page
    Route::delete('/delete/wishlist/{id}','ReviewController@wishlist_destroy')->name('wishlist.destroy');
    
    //__________quick.view.route______________
    Route::get('/quick/view/{id}','FrontController@quick_view')->name( 'quick.view' );  
});