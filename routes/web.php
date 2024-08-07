<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
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



// Auth::routes();

//__________customer.login.registration_________
Route::middleware(['not_guest'])->group(function(){
    Route::get('/logn-show-form', [HomeController::class, 'showForm'])->name('login.showForm');  // show login form when user
    Route::get('/register-show-form', [HomeController::class, 'showRegister'])->name('register.showForm');  // show register form when user
    Route::post('/user/register',[HomeController::class, 'register'])->name('user.register');  //for registration
    Route::post('/user/login',[HomeController::class, 'login'])->name('user.login');  //for registration
    //______ SOCIAL.LOGIN.REGISTER.______ 
    Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
    Route::get('/auth/facebook', [SocialAuthController::class, 'redirectTofacebook'])->name('auth.facebook');
    Route::get('/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback'])->name('auth.facebook.callback');
    
});
Route::get('/user/logout',[HomeController::class, 'logout'])->name('user.logout');  //for registration
//______customer.login.registration.end__________


//___________frontend.routes__________//
Route::group(['namespace'=> 'App\Http\Controllers\front'],function(){
    //________homepage.view.route__________
    Route::get('/', 'FrontController@index')->name('home.page');
    //________single.product.details.route__________
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
    //__________category.product.view.route______________
    Route::get('/category/product/{id}','FrontController@category_product')->name( 'category.product' );
    //________add.to.cart.from.quick.view______________
    Route::post('/product/addToCart','CartController@addToCart')->name('add.to.cart.quickview')->middleware(['auth']);  
    //________shopping.cart.view______________
    Route::get('/shopping-cart/views','CartController@cartView')->name('shopping.cart.view')->middleware(['auth_check']);  
    //________cart.product.remove______________
    Route::get('/shopping-cart/product/remove/{id}','CartController@remove')->name('cart.product.remove')->middleware(['auth_check']); 

    
    
    //________checkout.shopping.cart__________
    Route::get('/checkout/shopping-cart','CheckoutController@create')->name('checkout.shopping.cart')->middleware(['auth_check']);
    //________ order.route __________
    
});

Route::controller(\App\Http\Controllers\OrderController::class)->middleware(['auth_check'])->group(function(){
    Route::post('/order/store','store')->name('order.store');
});

    Route::get('/stripe',[StripeController::class, 'stripe'])->name('payment.stripe');
    Route::get('/payment/success',[StripeController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel',[StripeController::class, 'cancel'])->name('payment.cancel');
