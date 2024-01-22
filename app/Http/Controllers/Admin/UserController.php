<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\User\StoreAction;
use App\Actions\User\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate();

        return view('pages.admin.users.index', compact('users'));
    }

    public function store(StoreRequest $request, StoreAction $action): RedirectResponse
    {
        $validated = $request->validated();

        $action->handle($validated);

        return redirect()->back();
    }

    public function update(UpdateRequest $request, User $user, UpdateAction $action): RedirectResponse
    {
        $validated = $request->validated();

        $action->handle($validated, $user);

        return redirect()->back();
    }

    public function destroy(User $user): RedirectResponse
    {
        if (Auth::id() === $user->id) {
            return redirect()->back()->withErrors(['msg' => 'You can not delete yourself']);
        }

        $user->delete();

        return redirect()->back();
    }
}
