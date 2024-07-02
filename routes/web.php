<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Front\FrontController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/login',[AdminDashController::class,'AdminLogin'])->name('admin.login');
Route::post('/login-process',[AdminDashController::class,'LoginProcc'])->name('login.process');
Route::get('/admin/logout',[AdminDashController::class,'AdminLogout'])->name('logout');

Route::group(['middleware' => ['is_admin']], function () { 
    Route::get('/admin-dashboard',[AdminDashController::class,'index'])->name('admin.dashboard');
});