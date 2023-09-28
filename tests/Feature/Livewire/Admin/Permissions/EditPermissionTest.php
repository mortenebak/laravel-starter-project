<?php

use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('a permission can be updated', function () {
    $permission = Permission::create([
        'name' => 'test permission',
    ]);
    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);

    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('edit permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.edit-permission', ['permission' => $permission->id])
        ->assertSee('Update Permission')
        ->set('name', 'test permission 2')
        ->call('update');

    // Assert
    assertDatabaseMissing('permissions', [
        'name' => 'test permission',
    ]);
    assertDatabaseHas('permissions', [
        'name' => 'test permission 2',
    ]);
});

test('it shows errors if no name is given', function () {
    $permission = Permission::create([
        'name' => 'test permission',
    ]);
    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);

    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('edit permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.edit-permission', ['permission' => $permission->id])
        ->assertSee('Update Permission')
        ->set('name', '')
        ->call('update')
        ->assertHasErrors(['name' => 'required']);

    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);
    assertDatabaseMissing('permissions', [
        'name' => 'test permission 2',
    ]);
});

test('it shows errors if name is not unique', function () {
    $permission = Permission::create([
        'name' => 'test permission',
    ]);
    $permission2 = Permission::create([
        'name' => 'test permission 2',
    ]);
    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);
    assertDatabaseHas('permissions', [
        'name' => 'test permission 2',
    ]);

    // Act
    $user = User::factory()->create();
    $user->givePermissionTo('edit permissions');

    Livewire::actingAs($user)
        ->test('admin.permissions.edit-permission', ['permission' => $permission->id])
        ->assertSee('Update Permission')
        ->set('name', 'test permission 2')
        ->call('update')
        ->assertHasErrors(['name' => 'unique']);

    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);
    assertDatabaseHas('permissions', [
        'name' => 'test permission 2',
    ]);
});

test('it is required to the the right permission to edit a permission', function () {

    $permission = Permission::create([
        'name' => 'test permission',
    ]);

    Livewire::test(\App\Livewire\Admin\Permissions\EditPermission::class, ['permission' => $permission->id])
        ->assertForbidden();

    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(\App\Livewire\Admin\Permissions\EditPermission::class, ['permission' => $permission->id])
        ->assertForbidden();

    $user->givePermissionTo('edit permissions');

    Livewire::actingAs($user)
        ->test(\App\Livewire\Admin\Permissions\EditPermission::class, ['permission' => $permission->id])
        ->assertSee('Update Permission');
});
