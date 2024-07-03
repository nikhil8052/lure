<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Front\FrontController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/login',[AdminDashController::class,'AdminLogin'])->name('admin.login');
Route::post('/login-process',[AdminDashController::class,'LoginProcc'])->name('login.process');
Route::get('/admin/logout',[AdminDashController::class,'AdminLogout'])->name('logout');

Route::group(['middleware' => ['is_admin']], function () { 
    Route::get('/admin-dashboard',[AdminDashController::class,'index'])->name('admin.dashboard');

    Route::get('/admin-dashboard/profile',[ProfileController::class,'index'])->name('admin.profile');
    Route::post('/admin-dashboard/profile/update',[ProfileController::class,'ProfileUpdate'])->name('admin.profile.update');
    Route::post('/admin-dashboard/profile-image/update',[ProfileController::class,'ProfileImageUpdate'])->name('profile.image.update');
    Route::post('/admin-dashboard/password/update',[ProfileController::class,'PasswordUpdate'])->name('admin.password.update');
    
    Route::get('/admin-dashboard/settings',[SettingsController::class,'index'])->name('website.settings');

    Route::get('/admin-dashboard/faqs',[SettingsController::class,'faqs'])->name('website.Faqs');
});