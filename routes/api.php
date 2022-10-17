<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeFieldController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\PrivacyPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPictureController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TermsPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/home-fields', [HomeFieldController::class, 'index']);
Route::get('/home-fields/{home_field}', [HomeFieldController::class, 'show']);
Route::post('/home-fields', [HomeFieldController::class, 'store']);
Route::put('/home-fields/{home_field}', [HomeFieldController::class, 'update']);
Route::delete('/home-fields/{home_field}', [HomeFieldController::class, 'destroy']);

Route::get('/home-sections', [HomeSectionController::class, 'index']);
Route::get('/home-sections/{home_section}', [HomeSectionController::class, 'show']);
Route::post('/home-sections', [HomeSectionController::class, 'store']);
Route::put('/home-sections/{home_section}', [HomeSectionController::class, 'update']);
Route::delete('/home-sections/{home_section}', [HomeSectionController::class, 'destroy']);

Route::get('/home-sliders', [HomeSliderController::class, 'index']);
Route::get('/home-sliders/{home_slider}', [HomeSliderController::class, 'show']);
Route::post('/home-sliders', [HomeSliderController::class, 'store']);
Route::put('/home-sliders/{home_slider}', [HomeSliderController::class, 'update']);
Route::delete('/home-sliders/{home_slider}', [HomeSliderController::class, 'destroy']);

Route::get('/socials', [SocialController::class, 'index']);
Route::get('/socials/{social}', [SocialController::class, 'show']);
Route::post('/socials', [SocialController::class, 'store']);
Route::put('/socials/{social}', [SocialController::class, 'update']);
Route::delete('/socials/{social}', [SocialController::class, 'destroy']);

Route::get('/privacy-pages', [PrivacyPageController::class, 'index']);
Route::get('/privacy-pages/{privacy_page}', [PrivacyPageController::class, 'show']);
Route::post('/privacy-pages', [PrivacyPageController::class, 'store']);
Route::put('/privacy-pages/{privacy_page}', [PrivacyPageController::class, 'update']);
Route::delete('/privacy-pages/{privacy_page}', [PrivacyPageController::class, 'destroy']);

Route::get('/terms-pages', [TermsPageController::class, 'index']);
Route::get('/terms-pages/{terms_page}', [TermsPageController::class, 'show']);
Route::post('/terms-pages', [TermsPageController::class, 'store']);
Route::put('/terms-pages/{terms_page}', [TermsPageController::class, 'update']);
Route::delete('/terms-pages/{terms_page}', [TermsPageController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::post('/products/pictures', [ProductPictureController::class, 'store']);
Route::put('/products/pictures/{product_picture}', [ProductPictureController::class, 'update']);
Route::delete('/products/pictures/{product_picture}', [ProductPictureController::class, 'destroy']);

Route::post('/products/tags', [ProductTagController::class, 'store']);
Route::put('/products/tags/{product_tag}', [ProductTagController::class, 'update']);
Route::delete('/products/tags/{product_tag}', [ProductTagController::class, 'destroy']);

Route::get('files', [FileController::class, 'index'])->name('files');
Route::post('files', [FileController::class, 'upload'])->name('files');
