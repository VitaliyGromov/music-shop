<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.orders.index');
    }
}
