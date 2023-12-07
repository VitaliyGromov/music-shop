<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(15);

        return view('pages.admin.categories.index', compact('categories'));
    }

    public function store(StoreRequest $request)
    {

    }

    public function update(UpdateRequest $request, Category $category)
    {

    }

    public function destroy(Category $category)
    {

    }
}
