<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});
