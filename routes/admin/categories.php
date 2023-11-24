<?php

    use Illuminate\Support\Facades\Route;
    use \App\Http\Controllers\Admin\CategoryController;

    Route::prefix('categories')->group(function (){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
