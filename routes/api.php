<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\ClipController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Support\Facades\Route;


Route::get('/titles', [ListController::class, 'title']);
Route::get('/socials', [ListController::class, 'socials']);
Route::post('/comments', [CommentController::class, 'storeComment']);
Route::get('/get-comments', [CommentController::class, 'getComments']);
Route::get('/categories', [CatalogController::class, 'categories']);
Route::get('/categories-detail/{id}', [CatalogController::class, 'categoriesDetail']);
Route::get('/catalogs/{catalog_id}/images', [ImageController::class, 'images']);
Route::get('/catalogs/{catalog_id}/videos', [VideoController::class, 'videos']);
Route::get('/clips/most-recent', [ClipController::class, 'getMostRecentClip']);
Route::post('/phones', [PhoneController::class, 'storePhone']);




