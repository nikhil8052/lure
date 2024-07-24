<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Front\FrontController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

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
    Route::post('/admin-dashboard/setting/update',[SettingsController::class,'UpdateSetting'])->name('update.setting');

    Route::get('/admin-dashboard/faqs',[FaqsController::class,'index'])->name('website.Faqs');
    Route::post('/admin-dashboard/faqs/add',[FaqsController::class,'saveFaq'])->name('Faq.add');
    Route::get('admin-dashboard/faq-record/{id}',[FaqsController::class,'getRecord'])->name('get.faq');
    Route::get('admin-dashboard/faq-record-remove/{id}',[FaqsController::class,'removeFaq'])->name('remove.faq');
    Route::post('/update-faq-order',[FaqsController::class,'updateOrder']);
    Route::get('/change-faq-status/{id}',[FaqsController::class,'changeStatus']);

    Route::get('admin-dashboard/testimonials',[TestimonialsController::class,'index'])->name('website.testimonials');
    Route::post('/admin-dashboard/testimonials/add',[TestimonialsController::class,'saveTestimonial'])->name('testimonials.add');
    Route::get('admin-dashboard/testimonials-record/{id}',[TestimonialsController::class,'getRecord'])->name('get.testimonials');
    Route::get('admin-dashboard/testimonials-record-remove/{id}',[TestimonialsController::class,'removeTestimonial'])->name('remove.testimonials');
    Route::post('/update-testimonial-order',[TestimonialsController::class,'updateOrder']);
    Route::get('/change-testimonial-status/{id}',[TestimonialsController::class,'changeStatus']);

    Route::get('admin-dashboard/home-content',[SiteContentController::class,'homePage'])->name('web.home.page');
    Route::post('admin-dashboard/home-content/update',[SiteContentController::class,'homeContentUpdate'])->name('home.content.update');
    Route::get('admin-dashboard/influence-content',[SiteContentController::class,'InfluenceContent'])->name('influence.content');
    Route::post('admin-dashboard/influence-content/update',[SiteContentController::class,'InfluenceContentUpdate'])->name('influence.content.update');
    Route::post('admin-dashboard/remove-logo',[SiteContentController::class,'removelogo'])->name('remove.logo');
    Route::get('admin-dashboard/about-content',[SiteContentController::class,'aboutPage'])->name('web.about.page');

    Route::get('admin-dashboard/applynow-content',[SiteContentController::class,'ApplyNowPage'])->name('web.applyNow.page');
    Route::post('admin-dashboard/applynow-content-update',[SiteContentController::class,'ApplyNowPageUpdate'])->name('web.applyNow.page.update');

    Route::get('admin-dashboard/services',[SiteContentController::class,'services'])->name('web.services');
    Route::post('admin-dashboard/services/add',[SiteContentController::class,'addServices'])->name('add.services');

    Route::get('admin-dashboard/results',[SiteContentController::class,'results'])->name('web.results');
    Route::post('admin-dashboard/result/add',[SiteContentController::class,'addresults'])->name('add.results');

    Route::get('admin-dashboard/our-work',[SiteContentController::class,'works'])->name('web.work');
    Route::post('admin-dashboard/works/add',[SiteContentController::class,'addworks'])->name('add.works');

    Route::get('admin-dashboard/social-platforms',[SiteContentController::class,'Platforms'])->name('web.social.platforms');
    Route::post('admin-dashboard/social-platforms/add',[SiteContentController::class,'addPlatforms'])->name('add.social.platforms');

    Route::get('admin-dashboard/models',[SiteContentController::class,'models'])->name('web.models');
    Route::post('admin-dashboard/model/add',[SiteContentController::class,'AddModels'])->name('add.models');
    Route::get('admin-dashboard/model-image-remove/{id}',[SiteContentController::class,'ModelRemove']);
    Route::get('/change-model-status/{id}',[SiteContentController::class,'changeModelStatus']);

    Route::get('/admin-dashboard/all-Clients',[AdminDashController::class,'AllApplication'])->name('admin.dashboard.clients');
    Route::get('/admin-dashboard/remove-Client/{id}',[AdminDashController::class,'removeClient'])->name('remove.client');

    Route::get('/admin-dashboard/email-updates',[AdminDashController::class,'EmailUpdated'])->name('admin.dashboard.emails');
    Route::get('/admin-dashboard/remove-email/{id}',[AdminDashController::class,'removeEmail'])->name('remove.email');

});

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/apply-now',[FrontController::class,'applyNow'])->name('apply.now');
Route::post('/send-mail',[FrontController::class,'Sendmail'])->name('send.mail');
Route::post('/check-mail',[FrontController::class,'Checkmail'])->name('check.mail');
Route::post('/subscribe',[FrontController::class,'subscribe'])->name('subscribe');