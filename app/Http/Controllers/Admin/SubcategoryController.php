<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\StoreRequest;
use App\Http\Requests\Admin\Subcategory\UpdateRequest;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Subcategory::create($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, Subcategory $subcategory): RedirectResponse
    {
        $validated = $request->validated();

        $subcategory->update($validated);

        return redirect()->back();
    }

    public function destroy(Subcategory $subcategory): RedirectResponse
    {
        $subcategory->delete();

        return redirect()->back();
    }
}
