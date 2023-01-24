<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\CustomAuth;
use Illuminate\Support\Facades\Route;

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



  
    Route::view('/user-login','auth.login')->name('user-login')->withoutMiddleware([CustomAuth::class]);
    ;
    Route::view('/user-register','auth.register')->withoutMiddleware([CustomAuth::class]);

    Route::match(['get', 'post'], '/login',[AuthController::class,'login'])->withoutMiddleware([CustomAuth::class]);
    Route::match(['get', 'post'], '/register',[AuthController::class,'register'])->withoutMiddleware([CustomAuth::class]);
    Route::match(['get', 'post'],'/signout', [AuthController::class, 'signOut'])->name('signout')->withoutMiddleware([CustomAuth::class]);

Route::group(['middleware'=>"web"],function(){

  
  
    // Route::get('/register', function () {
    //     return view('auth.register');
    // });
    
    // Route::get('/login', function () {
    //     return view('auth.login');
    // });
    //Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('/',[CategoryController::class,'index']);
    Route::get('/category-create',[CategoryController::class,'create']);
    Route::post('/category-store',[CategoryController::class,'store']);
    Route::get('/category-edit/{id}',[CategoryController::class,'edit']);
    Route::put('/category-update/{id}',[CategoryController::class,'update']);
    Route::get('/category-delete/{id}',[CategoryController::class,'delete']);
    Route::get('/category-view/{id}',[CategoryController::class,'view']);
   




 });



