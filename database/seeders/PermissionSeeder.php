<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'access dashboard']);

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'create users']);

        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'create roles']);

        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'create permissions']);


        $superAdmin = Role::findByName('Super Admin')->syncPermissions(Permission::all());
        $admin = Role::findByName('Admin')->syncPermissions([
            'access dashboard',
            'view users',
            'edit users',
            'create users',
        ]);

        $superAdminUser = User::query()->find(1)->assignRole('Super Admin');
        $superAdminUser = User::query()->find(1)->assignRole('Admin');
        $adminUser = User::query()->find(2)->assignRole('Admin');
    }
}
