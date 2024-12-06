<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AptechController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\CategoryController;

Route::get('/login', [LoginController::class, 'showFormLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::middleware(CheckLogin::class)->group(function() {

    Route::get('/trang-chu', [HomeController::class, 'home'])->name('home');

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/hoc-laravel', [AptechController::class, 'hello']);
    Route::get('/hoc-reactjs', [AptechController::class, 'reactjs']);
    
    
    Route::get('/them-san-pham', [ProductController::class, 'themsanpham']);
    Route::post('/them-san-pham', [ProductController::class, 'themdulieusanpham'])->name('them');
    
    
    // Route::prefix('admin')->name('admin.')->group( function(){
    //     Route::prefix('category')->name('category.')->group(function (){
    //         Route::get('index',[CategoryController::class, 'index'])->name('index');
    //         Route::get('create',[CategoryController::class, 'create'])->name('create');
    //         Route::post('store',[CategoryController::class, 'store'])->name('store');
    //         Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('edit');
    //         Route::post('update/{id}',[CategoryController::class, 'update'])->name('update');
    //         Route::get('destroy/{id}',[CategoryController::class, 'destroy'])->name('destroy');
    
    //     });
    // });
    
    
    
    Route::prefix('admin')->name('admin.')->group( function(){
        Route::prefix('news')->name('news.')->group(function(){
            Route::get('index',[NewsController::class, 'index'])->name('index');
            Route::get('create',[NewsController::class, 'create'])->name('create');
            Route::post('store',[NewsController::class, 'store'])->name('store');
            Route::get('edit/{id}',[NewsController::class, 'edit'])->name('edit');
            Route::post('update/{id}',[NewsController::class, 'update'])->name('update');
            Route::get('destroy/{id}',[NewsController::class, 'destroy'])->name('destroy');
        });
    });

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');

});