<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/limitblogs', [BlogController::class, 'limitblogs']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'singleblog']);
Route::get('/related-blogs/{slug}', [BlogController::class, 'relatedBlogs']);

Route::get('/banner', [BannerController::class, 'banner']);
Route::get('/herosection', [HomeController::class, 'herosection']);
Route::get('/advertisingformats', [HomeController::class, 'advertisingformats']);
Route::get('/advertisingformats/{slug}', [HomeController::class, 'singleformats']);

Route::get('/setting', [HomeController::class, 'setting']);
Route::get('/termsandcondition', [HomeController::class, 'termsandcondition']);
Route::get('/privacypolicy', [HomeController::class, 'privacypolicy']);



