<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AddDefaultAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add default admin';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $role = Role::where('name', 'Admin')->first();

        DB::transaction(function () use ($role) {
            $admin = User::create([
                'email' => config('services.users.adminEmail'),
                'password' => config('services.users.adminPassword'),
                'name' => 'Admin',
                'lastname' => 'Иванов',
                'middlename' => 'Иванович',
                'active' => true
            ]);

            $admin->assignRole($role);
        });

        return 0;
    }
}
