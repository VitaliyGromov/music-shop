<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::paginate();

        return view('pages.admin.brands.index', compact('brands'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Brand::create($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();

        $brand->update($validated);

        return redirect()->back();
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->back();
    }
}
