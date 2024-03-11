<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\WareHouseController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\ProductController;
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
//___subcategory route___/
Route::middleware(['auth', 'is_admin'])->prefix('/sub-category')->group(function () {
    //____subcategory.index.route___/
    Route::get('/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
    //____subcategory.store.route___/
    Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    //____subcategory.destroy.route___/
    Route::get('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    //____subcategory.edit.route___/
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit']);
    //____subcategory.update.route___/
    Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
});
//___child category route___/
Route::middleware(['auth', 'is_admin'])->prefix('/child-category')->group(function () {
    //____child.category.index.route___/
    Route::get('/index', [ChildCategoryController::class, 'index'])->name('childcategory.index');
    //____child.category.store.route___/
    Route::post('/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');
    //____child.category.destroy.route___/
    Route::delete('/destroy/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.destroy');
    //____child.category.edit.route___/
    Route::get('/edit/{id}', [ChildCategoryController::class, 'edit']);
    //____child.category.update.route___/
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
//___warehouse.route___/
Route::middleware(['auth', 'is_admin'])->prefix('/warehouse')->group(function () {
    //___warehouse.index.route___/
    Route::get('/index', [WareHouseController::class, 'index'])->name('warehouse.index');
    //___warehouse.store.route___/
    Route::post('/store', [WareHouseController::class, 'store'])->name('warehouse.store');
    //___warehouse.destroy.route___/
    Route::delete('/destroy/{id}', [WareHouseController::class, 'destroy'])->name('warehouse.destroy');
    //___warehouse.edit.route___/
    Route::get('/edit/{id}', [WareHouseController::class, 'edit']);
    //___warehouse.update.route___/
    Route::post('/update/{id}', [WareHouseController::class, 'update'])->name('warehouse.update');
});
//____pickup.point.route___/
Route::middleware(['auth', 'is_admin'])->prefix('/pickup-point')->group(function () {
    //____pickup.point.index.route___/
    Route::get('/index', [PickupPointController::class, 'index'])->name('pickup.point.index');
    //____pickup.point.store.route___/
    Route::post('/store', [PickupPointController::class, 'store'])->name('pickup.point.store');
    //____pickup.point.destroy.route___/
    Route::delete('/destroy/{id}', [PickupPointController::class, 'destroy'])->name('pickup.point.destroy');
    //____pickup.point.edit.route___/
    Route::get('/edit/{id}', [PickupPointController::class, 'edit']);
    //____pickup.point.update.route___/
    Route::post('/update/{id}', [PickupPointController::class, 'update'])->name('pickup.point.update');
});


//=======================================end of category li's route======================================================

//=======================================start of settings li's route====================================================


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

    //___website settings route___/
    Route::prefix('website/setting')->group(function () {
        //___website.settings.index.route___/
        Route::get('/website', [SettingsController::class, 'website_setting'])->name('website.index');
        //___website.settings.update.route___/
        Route::post('/update/{id}', [SettingsController::class, 'website_update'])->name('website.update');
    });

    //___pages.index.route___/
    Route::prefix('pages')->group(function () {
        //_____pages.index.route___/
        Route::get('/index', [PageController::class, 'index'])->name('pages.index');
        //___pages.store.route___/
        Route::get('/create', [PageController::class, 'create'])->name('pages.create');
        //___pages.store.route___/
        Route::post('/store', [PageController::class, 'store'])->name('pages.store');
        //___pages.destroy.route___/
        Route::delete('/destroy/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
        //___pages.edit.route___/
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
        //___pages.update.route___/
        Route::post('/update/{id}', [PageController::class, 'update'])->name('pages.update');
    });

});

//___offers.route___/
Route::middleware(['auth', 'is_admin'])->prefix('/offers')->group(function () {
    //___coupon.route___/
    Route::prefix('/coupon')->group(function () {
        //____coupon.index.route___/
        Route::get('/index', [CouponController::class, 'index'])->name('coupon.index');
        //____coupon.store.route___/
        Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
        //____coupon.destroy.route___/
        Route::delete('/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
        //____coupon.edit.route___/
        Route::get('/edit/{id}', [CouponController::class, 'edit']);
        //____coupon.update.route___/
        Route::post('/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
    });
});

//____products.route___/
Route::middleware(['auth', 'is_admin'])->prefix('/products')->group(function () {
    //____product.route___/
    Route::prefix('/show-products')->group(function () {
        //____product.create.route___/
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        //____product.index.route___/
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        //____product.store.route___/
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        //____product.destroy.route___/
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        //____product.edit.route___/
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        //____product.update.route___/
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        //____subcategory.fetch.route___/
        Route::get('/subcategory', [ProductController::class, 'subcategory'])->name('product.subcategory');
    });
});


