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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('template1.about');
});
Route::get('/contacts', function () {
    return view('template1.contacts');
});
Route::get('/quote', function () {
    return view('template1.get-a-quote');
});
Route::get('/index', function () {
    return view('template1.index');
});
Route::get('/pricing', function () {
    return view('template1.pricing');
});
Route::get('/innerpage', function () {
    return view('template1.sample-inner-page');
});
Route::get('/service', function () {
    return view('template1.service-details');
});
Route::get('/servicedetail', function () {
    return view('template1.services');
});

Route::get('/home', function () {
    return view('manager.index');
});

Route::get('/home2', function () {
    return view('vtuber.index');
});
Route::get('/home3', function () {
    return view('vtuber.coba');
});

Route::get('/home', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.home');
Route::get('/crawling', [App\Http\Controllers\ManagerController::class, 'tocrawling'])->name('manager.crawl');
Route::get('/analysis', [App\Http\Controllers\ManagerController::class, 'toanalysis'])->name('manager.analysis');
Route::get('/history', [App\Http\Controllers\ManagerController::class, 'tohistory'])->name('manager.history');

Route::get('/home2', [App\Http\Controllers\VtuberController::class, 'index'])->name('vtuber.home');
Route::get('/crawling2', [App\Http\Controllers\VtuberController::class, 'tocrawling'])->name('vtuber.crawl');
Route::get('/history2', [App\Http\Controllers\VtuberController::class, 'tohistory'])->name('vtuber.history');
Route::get('/analysis2', [App\Http\Controllers\VtuberController::class, 'toanalysis'])->name('vtuber.analysis');
