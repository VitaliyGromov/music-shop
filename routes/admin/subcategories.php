<?php

declare(strict_types=1);
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('subcategories')->group(function () {
    Route::post('/', [SubcategoryController::class])->name('admin.subcategories.store');
});
