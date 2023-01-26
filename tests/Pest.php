<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Illuminate\Foundation\Testing\LazilyRefreshDatabase::class)->in('Feature');
uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
beforeEach(function () {
    $this->user = User::factory()->create();
    Role::create(['name' => 'Super Admin']);

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

    Role::findByName('Super Admin')->syncPermissions(Permission::all());
    $this->user->assignRole('Super Admin');
});
*/
