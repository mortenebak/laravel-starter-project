<?php

use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

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

test('the livewire form can be viewed', function () {

    $this->actingAs($this->user);

    $this->get(route('admin.roles'))
        ->assertStatus(200)
        ->assertSee('Add new role');

    // assert livewire component is rendered
    Livewire::test('admin.roles.create-role')
        ->assertSee('Create Role');
});

test('a new role can be created', function () {

    // assert role does not exist
    assertDatabaseMissing('roles', [
        'name' => 'test role'
    ]);

    // create role
    Livewire::test('admin.roles.create-role')
        ->set('name', 'test role')
        ->call('create');

    // assert role exists
    assertDatabaseHas('roles', [
        'name' => 'test role'
    ]);
});
