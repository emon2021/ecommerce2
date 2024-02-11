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
Route::middleware(['auth', 'is_admin'])->prefix('/category')->group(function () {
    //___category.index.route___/
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    //___category.store.route___/
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    //___category.destroy.route___/
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    //___category.edit.route___/
    Route::get('/edit/{id}', [CategoryController::class, 'edit']);
});
