<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\CharacteristicController;
use Illuminate\Support\Facades\Route;

Route::prefix('characteristics')->group(function () {
    Route::get('/{category}/characteristics', [CharacteristicController::class, 'index'])->name('admin.characteristics.index');
    Route::post('/', [CharacteristicController::class, 'store'])->name('admin.characteristics.store');
    Route::put('/{category}', [CharacteristicController::class, 'update'])->name('admin.characteristics.update');
    Route::delete('/{category}', [CharacteristicController::class, 'destroy'])->name('admin.characteristics.destroy');
});
