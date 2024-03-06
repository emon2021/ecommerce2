<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Models\SubCategory;
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
        ->name('admin.home');
    //  admin.logout
    Route::get('/admin/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
    //  admin.change.password.view
    Route::get('/password/change/index', [AdminController::class, 'changeView'])
        ->name('admin.changeView');
    //  admin.password.changed
    Route::post('/password/changed', [AdminController::class, 'change_pass'])
        ->name('admin.pass_changed');
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
    //___category.update.route___/
    Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
});
//___sub category route___/
Route::middleware(['auth', 'is_admin'])->prefix('/sub-category')->group(function () {
    //___sub category.index.route___/
    Route::get('/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
    //___sub category.store.route___/
    Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    //___sub category.destroy.route___/
    Route::get('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    //___sub category.edit.route___/
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit']);
    //___sub category.update.route___/
    Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
});
//___child category route___/
Route::middleware(['auth', 'is_admin'])->prefix('/child-category')->group(function () {
    //___sub category.index.route___/
    Route::get('/index', [ChildCategoryController::class, 'index'])->name('childcategory.index');
    //___sub category.store.route___/
    Route::post('/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');
    //___sub category.destroy.route___/
    Route::delete('/destroy/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.destroy');
    //___sub category.edit.route___/
    Route::get('/edit/{id}', [ChildCategoryController::class, 'edit']);
    //___sub category.update.route___/
    Route::post('/update', [ChildCategoryController::class, 'update'])->name('childcategory.update');
    // //   subcategory showing
    Route::get('/sub-show', [ChildCategoryController::class, 'fetch_sub'])->name('sub_show.child');
});
//___brands route___/
Route::middleware(['auth', 'is_admin'])->prefix('')->group(function () {
    //___brand.index.route___/
    Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
    //___brand.store.route___/
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    //___brand.destroy.route___/
    Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    //___brand.edit.route___/
    Route::get('/edit/{id}', [BrandController::class, 'edit']);
    //___brand.update.route___/
    Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
});

//___settings route___/
Route::middleware(['auth', 'is_admin'])->prefix('settings')->group(function () {
    //___seo route___/
    Route::prefix('seo')->group(function () {
        //___seo.index.route___/
        Route::get('/index', [SettingsController::class, 'seo'])->name('seo.index');
        //___seo.update.route___/
        Route::post('/update/{id}', [SettingsController::class, 'update'])->name('seo.update');
    });

    //___smtp route___/
    Route::prefix('smtp')->group(function () {
        //___smtp.index.route___/
        Route::get('/smtp', [SettingsController::class, 'smtp'])->name('smtp.index');
        //___smtp.update.route___/
        Route::post('/update/{id}', [SettingsController::class, 'smtp_update'])->name('smtp.update');
    });

    //___pages.index.route___/
    Route::prefix('pages')->group(function () {
        Route::get('/index', [PageController::class, 'index'])->name('pages.index');
        //___pages.store.route___/
        Route::get('/create', [PageController::class, 'create'])->name('pages.create');
        //___pages.store.route___/
        Route::post('/store', [PageController::class, 'store'])->name('pages.store');
        // //___pages.destroy.route___/
        // Route::delete('/destroy/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
        // //___pages.edit.route___/
        // Route::get('/edit/{id}', [PageController::class, 'edit']);
        // //___pages.update.route___/
        // Route::post('/update', [PageController::class, 'update'])->name('pages.update');
    });
});
