<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\UserController;

    Route::prefix('users')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
