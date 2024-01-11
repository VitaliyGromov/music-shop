<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\CharacteristicController;
use Illuminate\Support\Facades\Route;

Route::prefix('characteristics')->group(function () {
    Route::post('/', [CharacteristicController::class, 'store'])->name('admin.characteristics.store');
    Route::get('/{characteristic}', [CharacteristicController::class, 'show'])->name('admin.characteristics.show');
    Route::put('/{characteristic}', [CharacteristicController::class, 'update'])->name('admin.characteristics.update');
    Route::delete('/{characteristic}', [CharacteristicController::class, 'destroy'])->name('admin.characteristics.destroy');
});

Route::get('categories/{category}/characteristics', [CharacteristicController::class, 'index'])->name('admin.characteristics.index');
