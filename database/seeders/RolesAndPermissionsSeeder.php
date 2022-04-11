<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            //roles
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //posts
            'create-posts',
            'view-posts',
            'edit-posts',
            'delete-posts',
            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role1 = Role::create(['name' => config('settings.user_types.admin')]);
        $role1->syncPermissions($permissions);

        $role2 = Role::create(['name' => config('settings.user_types.user')]);
        $role2->givePermissionTo('create-posts');
        $role2->givePermissionTo('view-posts');
    }
}
