<?php

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


// Manager
Route::get('/home', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.home');
Route::get('/crawling', [App\Http\Controllers\ManagerController::class, 'tocrawling'])->name('manager.crawl');
Route::get('/analysis', [App\Http\Controllers\ManagerController::class, 'toanalysis'])->name('manager.analysis');
Route::get('/analysis-vtubers', [App\Http\Controllers\ManagerController::class, 'analysisvtuber'])->name('manager.analysis.vtuber');
Route::get('/analysis-management', [App\Http\Controllers\ManagerController::class, 'analysismanagement'])->name('manager.analysis.management');
Route::get('/history', [App\Http\Controllers\ManagerController::class, 'tohistory'])->name('manager.history');

// VTuber
Route::get('/home-vtuber', [App\Http\Controllers\VtuberController::class, 'index'])->name('vtuber.home');
Route::get('/crawling-vtuber', [App\Http\Controllers\VtuberController::class, 'tocrawling'])->name('vtuber.crawl');
Route::get('/history-vtuber', [App\Http\Controllers\VtuberController::class, 'tohistory'])->name('vtuber.history');
Route::get('/analysis-vtuber', [App\Http\Controllers\VtuberController::class, 'toanalysis'])->name('vtuber.analysis');

// Common
Route::get('/detail-content/{id}/{sourcesId}', [App\Http\Controllers\ContentController::class, 'detailcontent'])->name('detail.content');
Route::post('/update-content', [App\Http\Controllers\ContentController::class, 'update'])->name('update.content');
Route::post('/delete-content', [App\Http\Controllers\ContentController::class, 'delete'])->name('delete.content');

Route::get('/detail-comment', [App\Http\Controllers\CommentController::class, 'show'])->name('detail.comment');
Route::post('/update-comment', [App\Http\Controllers\CommentController::class, 'update'])->name('update.comment');
Route::post('/delete-comment', [App\Http\Controllers\CommentController::class, 'delete'])->name('delete.comment');


// Authenthication
Route::get('/', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('loginPage');
Route::post('/loginAkun', [App\Http\Controllers\AuthController::class, 'login'])->name('masuk');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('registerPage');
Route::post('/registerAkun', [App\Http\Controllers\AuthController::class, 'register'])->name('daftar');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');