<?php

use App\Http\Controllers\api\ProductController;
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
Route::middleware('auth:api')->group(function(){
    Route::get('products', [ProductController::class, 'getProducts']);
    Route::post('product/create', [ProductController::class, 'createNewProduct']);
    Route::put('product/update/{id}', [ProductController::class, 'updateProduct']);
    Route::put('product/delete/{id}', [ProductController::class, 'deleteProduct']);
});
