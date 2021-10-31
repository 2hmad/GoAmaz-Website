<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialController;
use App\Models\ProductCounter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['middleware' => 'visitors', 'prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'check'])->name('login-account');
    Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
    Route::get('/callback/{service}', [SocialController::class, 'callback']);

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register-acc');

    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'updateInfo'])->name('update_info');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('update_password');

    Route::get('/product/{id}', [ProductController::class, 'index'])->middleware('productVisitor');
    Route::post('/product/{id}', [ProductController::class, 'addWatcher'])->name('addwatch');
    Route::post('/product/{id}/{email}', [ProductController::class, 'addFavorite'])->name('addfavorite');
    Route::delete('/product/{id}/{email}', [ProductController::class, 'deleteFavorite'])->name('destroy.favorite');
    Route::post('/rate', [ProductController::class, 'store_rate'])->name('addRate');

    Route::get('/favorite', [FavoriteController::class, 'index']);
    Route::get('/search', function () {
        return view('search');
    });
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLogin::class, 'index']);
    Route::post('/login', [AdminLogin::class, 'login'])->name('checkAdmin');
    Route::get('/logout', [AdminLogin::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/users', [AdminDashboard::class, 'users']);
    Route::get('/statistics', [AdminDashboard::class, 'statistics']);
    Route::get('/ads', [AdminDashboard::class, 'ads']);
    Route::post('/ads', [AdminDashboard::class, 'add_ad'])->name('add-ad');
    Route::post('/ads/{id}', [AdminDashboard::class, 'delete_ad'])->name('delete-ad');
});
