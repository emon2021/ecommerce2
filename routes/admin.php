<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


//__admin.home.login____//
Route::get('/admin', [AdminController::class, 'loginView'])
    ->name('admin.loginView');

Route::post('/admin/login', [LoginController::class, 'login'])
    ->name('admin.login');


//__admin.dashboard.route___/
Route::middleware(['auth', 'is_admin'])->prefix('/admin/dashboard')->group(function () {
    //___if auth and is_admin is right then enter___/
    Route::get('/admin/home', [AdminController::class, 'index'])
        ->name('admin.home')
        ->middleware(['auth', 'is_admin']);
    Route::get('/admin/logout', [AdminController::class, 'logout'])
        ->name('admin.logout')
        ->middleware(['auth', 'is_admin']);
});
//___category route___/
Route::middleware(['auth', 'is_admin'])->prefix('/dashboard/categories')->group(function () {
    //___category index route___/
    Route::get('/view/category', [CategoryController::class, 'index'])->name('category.index');
});
