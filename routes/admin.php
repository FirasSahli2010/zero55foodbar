<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin', 'as' => 'admin.'], function(){

/***Profile Routes**** */
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateprofile'])->name('profile.update');
/***Profile update password**** */
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');
 Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
/**Slider-Home-page */
Route::resource('sliderHomePage', SliderController::class);


