<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\StoreRequest;
use App\Http\Requests\Admin\Subcategory\UpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubcategoryController extends Controller
{
    public function index(Category $category): View
    {
        $subcategories = $category->subcategories()->paginate(15);

        return view('pages.admin.categories.subcategories', compact(['category', 'subcategories']));
    }

    public function show(Subcategory $subcategory): View
    {
        return view('pages.admin.subcategories.show', compact('subcategory'));
    }

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
