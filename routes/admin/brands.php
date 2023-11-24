<?php
    use Illuminate\Support\Facades\Route;
    use \App\Http\Controllers\Admin\BrandController;

    Route::prefix('brands')->group(function (){
        Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
        Route::get('/{brand}', [BrandController::class, 'show'])->name('admin.brands.show');
        Route::post('/', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
    });
