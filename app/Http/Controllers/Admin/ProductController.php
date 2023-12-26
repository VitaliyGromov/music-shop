<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.products.index');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        $product->update($validated);

        return redirect()->back();
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->back();
    }
}
