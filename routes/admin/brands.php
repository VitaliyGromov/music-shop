<?php

declare(strict_types=1);
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/{brand}', [BrandController::class, 'show'])->name('admin.brands.show');
    Route::post('/', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::put('/{brand}', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
});
