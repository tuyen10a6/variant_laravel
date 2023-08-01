<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\attribute\AttributeController;
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

        Route::get('', [ProductController::class, 'index'])->name('admin.product.index');

        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');

        Route::get('{id}', [ProductController::class, 'show'])->name('admin.product.show');

        Route::get('update/{id}', [ProductController::class, 'show_update'])->name('admin.product.update');

        Route::delete('delete/{id}', [ProductController::class, 'remove'])->name('admin.product.delete');

        Route::put('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');

        Route::post('add', [ProductController::class, 'store'])->name('admin.product.store');


    });

    Route::prefix('attribute')->group(function ()
    {
        Route::get('', [AttributeController::class, 'index'])->name('admin.attribute.index');

        Route::get('create', [AttributeController::class, 'create'])->name('admin.attribute.create');

        Route::post('create', [AttributeController::class, 'store'])->name('admin.attribute.store');

        Route::get('update/{id}', [AttributeController::class, 'show'])->name('admin.attribute.show');

        Route::put('update/{id}', [AttributeController::class, 'update'])->name('admin.attribute.update');

        Route::delete('delete/{id}', [AttributeController::class, 'remove'])->name('admin.attribute.delete');
    });
});
