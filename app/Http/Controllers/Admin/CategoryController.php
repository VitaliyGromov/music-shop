<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(15);

        return view('pages.admin.categories.index', compact('categories'));
    }

    public function show(Category $category): View
    {
        $subcategories = $category->subcategories()->paginate(15);

        return view('pages.admin.categories.show', compact(['category', 'subcategories']));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();

        $category->update($validated);

        return redirect()->back();
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->back();
    }
}
