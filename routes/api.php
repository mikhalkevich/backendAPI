<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
//auth routes
Route::middleware('auth:sanctum')->group(function () {
    //profile
    Route::post('logout', [Controllers\AuthController::class, 'logout']);
    Route::get('profile', [Controllers\AuthController::class, 'profile']);
    //product
    Route::resource('product', Controllers\ProductController::class)->except('edit', 'create');
    Route::post('product/{product}/add_picture', [Controllers\MediaController::class, 'addPictureToProduct']);
    Route::post('product/{product}/add_catalog/', [Controllers\ProductController::class, 'addCatalog']);
    Route::post('product/{product}/add_company/', [Controllers\ProductController::class, 'addCompany']);
    Route::delete('product/{product}/detach_picture', [Controllers\MediaController::class, 'detachPicture']);
    Route::delete('product/{product}/detach_catalog/', [Controllers\ProductController::class, 'detachCatalog']);
    Route::delete('product/{product}/detach_company/', [Controllers\ProductController::class, 'detachCompany']);
    //company
    Route::resource('company', Controllers\CompanyController::class)->except('edit', 'create');
    //catalog
    Route::resource('catalog', Controllers\CatalogController::class)->except('edit', 'create');
});
Route::post('register', [Controllers\AuthController::class, 'register']);
Route::post('login', [Controllers\AuthController::class, 'login']);
//public routes
Route::prefix('public')->group(function (){
    Route::get('products', [Controllers\ProductController::class, 'publicShow']);
});
