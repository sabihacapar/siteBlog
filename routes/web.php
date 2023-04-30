<?php

use App\Http\Controllers\Back\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;

use App\Http\Controllers\Back\AuthController;

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

Route::get('/',  [Homepage::class,'index'])->name('homepage');

Route::get('/blog/{slug}',  [Homepage::class,'single'])->name('single');



Route::get('admin/panel',[Dashboard::class,'index'])->name('admin.dashboard');
Route::get('admin/login',[AuthController::class,'login'])->name('admin.login');
Route::post('admin/login',[AuthController::class,'loginPost'])->name('admin.login.post');
Route::get('admin/logout',[AuthController::class,'logout'])->name('admin.logout');
Route::post('admin/logout',[AuthController::class,'logout'])->name('admin.logout');

Route::resource('admin/makaleler',ArticleController::class);
Route::get('admin/delete/{id}',[ArticleController::class,'delete'])->name('delete.article');
