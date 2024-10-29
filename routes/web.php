<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\UserPofileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/**Admin  */
Route::group(['middleware' => 'guest'], function() {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('login');
});



/*user Dashboard*/
Route::group(['middleware'=> 'auth'], function() {
    Route::get('dashboard',[DashboardController::class ,'index'])->name('dashboard');
    Route::get('profile',[UserPofileController::class,'index'])->name('profile');//user.profile
    Route::put('profile',[UserPofileController::class,'updateProfile'])->name('profile.update'); //user.profile.update
    Route::post('profile',[UserPofileController::class,'updatePassword'])->name('profile.update.password'); //user.profile.update
    Route::Post('profile/image',[UserPofileController::class,'updateImage'])->name('profile.image.update'); //user.profile.update
});

Route::get('/',[ FrontendController::class,'index'])->name('home');

require __DIR__.'/auth.php';

