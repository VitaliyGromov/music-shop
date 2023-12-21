<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UpdateAction
{
    public function handle(array $validated, User $user): void
    {
        $role = Role::find($validated['role_id']);

        DB::transaction(function () use ($role, $validated, $user) {

            $user->update(Arr::except($validated, 'role_id'));

            $user->syncRoles($role);
        });
    }
}
