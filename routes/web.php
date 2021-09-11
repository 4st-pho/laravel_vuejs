<?php

use App\Http\Controllers\Admin\ArticleManagerController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\UserManagerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\User\UserArticleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->get('/profile/get', [App\Http\Controllers\HomeController::class, 'getProfile'])->name('getProfile');
Route::middleware(['auth'])->get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/', [ManagerController::class, 'main']);
    Route::get('/user', [UserManagerController::class, 'userManager'])->name('userManager');
    Route::post('/user/blockManager/{user}', [UserManagerController::class, 'blockManager'])->name('blockManager');
    Route::get('/article', [ArticleManagerController::class, 'articleManager'])->name('articleManager');
    Route::post('/article/vipManager/{article}', [ArticleManagerController::class, 'vipManager'])->name('vipManager');
    Route::post('/article/displayManager/{article}', [ArticleManagerController::class, 'displayManager'])->name('displayManager');
});


Route::middleware(['auth', 'role:user'])->prefix('user')->group(function(){
    Route::get('/create', [UserArticleController::class, 'index']);
});

Route::resource('/categories', CategoryController::class);
Route::resource('/article', ArticleController::class);

Route::get('location/provinces', [LocationController::class, 'getProvinces'])->name('getProvinces');
Route::get('location/province/{province}/districts', [LocationController::class, 'getDistricts'])->name('getDistricts');
Route::get('location/province/district/{district}/wards', [LocationController::class, 'getWards'])->name('getWards');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('googleRedirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('googleCallback');
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebookRedirect');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('facebookCallback');