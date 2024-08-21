<?php

use App\Livewire\Admin\Roles\CreateRole;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('the livewire form can be viewed', function () {
    $this->actingAs($this->user);

    $this->get(route('admin.roles'))
        ->assertStatus(200)
        ->assertSee('Create Role');

    // assert livewire component is rendered
    Livewire::test('admin.roles.create-role')
        ->assertSee('Create Role');
});

test('a new role can be created', function () {
    // assert role does not exist
    assertDatabaseMissing('roles', [
        'name' => 'test role',
    ]);

    // create role
    $user = User::factory()->create();
    $user->givePermissionTo('create roles');

    Livewire::actingAs($user)
        ->test('admin.roles.create-role')
        ->set('name', 'test role')
        ->call('create');

    // assert role exists
    assertDatabaseHas('roles', [
        'name' => 'test role',
    ]);
});

test('a role can have multiple permissions attached', function () {
    // assert role does not exist
    assertDatabaseMissing('roles', [
        'name' => 'test role',
    ]);

    // create role
    $user = User::factory()->create();
    $user->givePermissionTo('create roles');

    $permissions = [
        Permission::query()->where('name', '=', 'view users')->first()->id,
        Permission::query()->where('name', '=', 'edit users')->first()->id,
        Permission::query()->where('name', '=', 'delete users')->first()->id,
        Permission::query()->where('name', '=', 'create users')->first()->id,
    ];

    Livewire::actingAs($user)
        ->test('admin.roles.create-role')
        ->set('name', 'test role')
        ->set('rolePermissions', $permissions)
        ->call('create')
        ->assertHasNoErrors();

    // assert role exists
    assertDatabaseHas('roles', [
        'name' => 'test role',
    ]);

    // assert role has permissions
    $role = Role::findByName('test role');
    $this->assertTrue($role->hasPermissionTo('view users'));
    $this->assertTrue($role->hasPermissionTo('edit users'));
    $this->assertTrue($role->hasPermissionTo('delete users'));
    $this->assertTrue($role->hasPermissionTo('create users'));
});

it('is required to have the right permissions to create a role', function () {
    Livewire::test(CreateRole::class)
        ->assertForbidden();

    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(CreateRole::class)
        ->assertForbidden();

    $user->givePermissionTo('create roles');

    Livewire::actingAs($user)
        ->test(CreateRole::class)
        ->assertOk()
        ->assertSee('Create Role');
});
