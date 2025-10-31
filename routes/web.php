<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\EnquireController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/portfolio', [IndexController::class, 'portfolio'])->name('portfolio');
Route::get('/termsandcondition', [IndexController::class, 'termsandcondition'])->name('termsandcondition');
Route::get('/privacypolicy', [IndexController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/aboutus', [IndexController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/teams', [IndexController::class, 'team'])->name('teams');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/store', [IndexController::class, 'store'])->name('store');
Route::get('/store/{slug}', [IndexController::class, 'storesingle'])->name('storesingle');
Route::post('/storeproduct', [IndexController::class, 'storeproduct'])->name('storeproduct');
Route::get('/blog/{blog:slug}', [IndexController::class, 'single'])->name('single');
Route::get('/blogs', [IndexController::class, 'getblog'])->name('blog');
Route::get('/service/{service:slug}', [IndexController::class, 'servicesingle'])->name('servicesingle');

Route::get('/enquire', [EnquireController::class, 'enquire'])->name('enquire');
Route::post('/enquire', [EnquireController::class, 'enquirestore'])->name('enquire.store');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'Migration has been successfully';
});
Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return 'Application all kind of cache has been cleared';
});
