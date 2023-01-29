<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

test('super admin can access dashboard', function () {

    $this->actingAs($this->user)
        ->get(route('admin.dashboard'))
        ->assertOk();

});

test('a user with a role that only has access dashboard can access the admin dashboard', function () {

    $user = User::factory()->create();
    $role = Role::create(['name' => 'test role']);
    $user->assignRole($role);
    $role->givePermissionTo('access dashboard');
    $role->givePermissionTo('view users');
    $role->givePermissionTo('view roles');
    $role->givePermissionTo('view permissions');

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertOk()
    ->assertSee('Users')
    ->assertSee('Permissions')
    ->assertSee('Roles');

});

test('a user without a role that has access dashboard cannot access the dashboard', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertForbidden();

});

