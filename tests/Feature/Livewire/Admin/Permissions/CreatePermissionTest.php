<?php

use App\Livewire\Admin\Permissions\CreatePermission;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('the livewire can be displayed', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('create permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.create-permission')
        ->assertSee('Create Permission');
});

test('a new permission can be created', function () {
    // Assert
    assertDatabaseMissing('permissions', [
        'name' => 'test permission',
    ]);

    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('create permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.create-permission')
        ->assertSee('Create Permission')
        ->set('name', 'test permission')
        ->call('create');

    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);
});

test('the name field is required', function () {
    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('create permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.create-permission')
        ->assertSee('Create Permission')
        ->set('name', '')
        ->call('create')
        ->assertHasErrors(['name' => 'required']);
});

test('the name field is unique', function () {
    Permission::create(['name' => 'test permission']);

    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('create permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.create-permission')
        ->assertSee('Create Permission')
        ->set('name', 'test permission')
        ->call('create')
        ->assertHasErrors(['name' => 'unique']);
});

test('it is required to the the correct permission to access the component', function () {
    Livewire::test(CreatePermission::class)
        ->assertForbidden();

    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(CreatePermission::class)
        ->assertForbidden();

    $user->givePermissionTo('create permissions');

    Livewire::actingAs($user)
        ->test(CreatePermission::class)
        ->assertOk();
});
