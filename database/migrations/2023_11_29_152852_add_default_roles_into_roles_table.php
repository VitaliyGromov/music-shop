<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Spatie\Permission\Models\Role;

return new class extends Migration
{
    private array $roles = ['Admin', 'Courier', 'User'];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->roles as $role) {
            $role = Role::where('name', $role)->get();

            $role->delete();
        }
    }
};
