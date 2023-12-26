<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('subcategories')->group(function () {
    Route::post('/', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('/{category}/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories.index');
    Route::delete('/{subcategory}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    Route::put('/{subcategory}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
});
