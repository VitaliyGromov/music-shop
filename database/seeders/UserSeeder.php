<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            DB::transaction(function () {
                $user = User::withoutEvents(fn () => User::factory()->create());

                $role = Role::all()->random();

                $user->assignRole($role);
            });
        }
    }
}
