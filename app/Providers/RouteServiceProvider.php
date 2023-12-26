<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['web', 'auth', 'active'])
                ->prefix('admin')
                ->group(function () {
                    require base_path('routes/admin/categories.php');
                    require base_path('routes/admin/products.php');
                    require base_path('routes/admin/brands.php');
                    require base_path('routes/admin/users.php');
                    require base_path('routes/admin/orders.php');
                    require base_path('routes/admin/subcategories.php');
                    require base_path('routes/admin/characteristics.php');
                });

            Route::middleware('web')
                ->group(function () {
                    require base_path('routes/web.php');
                });
        });
    }
}
