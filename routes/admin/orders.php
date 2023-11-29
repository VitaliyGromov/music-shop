<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\OrderController;

    Route::prefix('orders')->group(function (){
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
    });
