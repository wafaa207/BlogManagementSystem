<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomePageController;
use App\Http\Controllers\web\PostsController;
use App\Http\Controllers\web\ContactUsController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\AuthorsController;
use App\Http\Controllers\web\CommentsController;
use App\Http\Controllers\web\SubscribeController;

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

Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('filament.admin.auth.show.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('filament.admin.auth.perform.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('filament.admin.auth.logout');


// For Website URLs

Route::resource('/', HomePageController::class);
Route::resource('/contact_us', ContactUsController::class);
Route::resource('/Posts', controller: PostsController::class);
Route::resource('posts.comments', CommentsController::class);
Route::post('posts/{post}/comments/{comment}/report', [CommentsController::class, 'report'])->name('posts.comments.report');
Route::get('/about-us',[ AboutController::class, 'about_us'])->name('about-us');
