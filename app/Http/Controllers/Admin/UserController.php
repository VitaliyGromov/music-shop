<?php

namespace App\Http\Controllers\Admin;

use App\Actions\User\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(20);

        $roles = Role::where('name', '!=', 'User')->get();

        return view('pages.admin.users.index', compact(['users', 'roles']));
    }

    public function store(StoreRequest $request, StoreAction $action): RedirectResponse
    {
        $validated = $request->validated();

        $action->handle($validated);

        return redirect()->back();
    }
}
