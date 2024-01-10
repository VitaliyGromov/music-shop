<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate();

        return view('pages.admin.products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('pages.admin.products.show', compact('product'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $product = Product::create(Arr::except($validated, 'images'));

        foreach ($request->file('images') as $image){
            $product->addMedia($image)
                ->toMediaCollection('products');
        }

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
