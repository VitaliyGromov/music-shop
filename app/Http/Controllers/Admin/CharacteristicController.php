<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Characteristic\StoreRequest;
use App\Http\Requests\Admin\Characteristic\UpdateRequest;
use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacteristicController extends Controller
{
    public function index(Category $category): View
    {
        $characteristics = $category->characteristics()->paginate(15);

        return view('pages.admin.characteristics.index', compact(['category', 'characteristics']));
    }

    public function show(Characteristic $characteristic): View
    {
        return view('pages.admin.characteristics.show', compact('characteristic'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Characteristic::create($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, Characteristic $characteristic): RedirectResponse
    {
        $validated = $request->validated();

        $characteristic->update($validated);

        return redirect()->back();
    }

    public function destroy(Characteristic $characteristic): RedirectResponse
    {
        $characteristic->delete();

        return redirect()->back();
    }
}
