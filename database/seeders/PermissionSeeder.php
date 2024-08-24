<?php

namespace Database\Seeders;

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

        Permission::create(['name' => 'view plans']);
        Permission::create(['name' => 'edit plans']);
        Permission::create(['name' => 'delete plans']);
        Permission::create(['name' => 'create plans']);

        Permission::create(['name' => 'impersonate users']);

        $superAdmin = Role::findByName('Super Admin')->syncPermissions(Permission::all());
    }
}
