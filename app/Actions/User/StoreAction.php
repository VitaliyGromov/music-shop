<?php

    namespace App\Actions\User;

    use App\Mail\Admin\UserCreatedMail;
    use App\Models\User;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use Spatie\Permission\Models\Role;

    class StoreAction
    {
        public function handle(array $validated): void
        {
            $role = Role::find($validated['role_id']);

            $password = Str::random(8);

            DB::transaction(function () use ($role, $validated, $password) {
                $user = User::create([...Arr::except($validated, 'role_id'),
                    'active' => true,
                    'password' => Hash::make($password),
                ]);

                $user->assignRole($role);

                Mail::to($user)->send(new UserCreatedMail($user, $password));
            });

        }
    }
