<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


//__admin.home route__//
Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home')->middleware(['auth']);

//___category route___/
Route::middleware(['auth','is_admin'])->prefix('/dashboard/categories')->group(function(){
    //___category index route___/
    Route::get('/view/category',[CategoryController::class,'index'])->name('category.index');
});