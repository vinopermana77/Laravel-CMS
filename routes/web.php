<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
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

// Blog
Route::get('/', [WebsiteController::class,'home'])->name('home');
Route::get('/post/{post}', [WebsiteController::class,'show'])->name('website.posts.show');
Route::get('/contact', [WebsiteController::class,'contact'])->name('website.posts.contact');

Auth::routes();

// Post
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('posts', PostController::class);
});
