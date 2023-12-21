<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});
