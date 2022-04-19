<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super-Admin',
            'username' => 'Super-Admin',
            'email' => config('settings.admin-user.email'),
            'password' => bcrypt(config('settings.admin-user.password')),
            'email_verified_at' => now(),
        ]);

        $role = Role::create(['name' => config('settings.user_types.super-admin')]);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $user->assignRole([$role->id]);
    }
}
