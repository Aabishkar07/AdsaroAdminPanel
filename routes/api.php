<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/limitblogs', [BlogController::class, 'limitblogs']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'singleblog']);
Route::get('/related-blogs/{slug}', [BlogController::class, 'relatedBlogs']);

// Categories with subcategories
Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/blogs/category/{categoryId}', [CategoryApiController::class, 'blogsByCategory']);

Route::get('/banner', [BannerController::class, 'banner']);
Route::get('/herosection', [HomeController::class, 'herosection']);
Route::get('/advertisingformats', [HomeController::class, 'advertisingformats']);
Route::get('/advertisingformats/{slug}', [HomeController::class, 'singleformats']);
Route::get('/related-formats/{slug}', [HomeController::class, 'relatedformats']);

Route::get('/setting', [HomeController::class, 'setting']);
Route::get('/termsandcondition', [HomeController::class, 'termsandcondition']);
Route::get('/privacypolicy', [HomeController::class, 'privacypolicy']);
Route::get('/advertising', [HomeController::class, 'advertising']);
Route::get('/publisher', [HomeController::class, 'publisher']);
Route::get('/faq', [HomeController::class, 'faq']);

Route::post('/contact', [HomeController::class, 'contact']);



