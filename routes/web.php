<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product\ProductController;
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

Route::prefix('admin')->group(function()
{
    Route::prefix('product')->group(function() {

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');

        Route::get('/{id}', [ProductController::class, 'show'])->name('admin.product.show');

    });
});
