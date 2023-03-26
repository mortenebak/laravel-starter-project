<?php

use Livewire\Livewire;
use Spatie\Permission\Models\Permission;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('the livewire can be displayed', function () {
    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission');
});

test('a new permission can be created', function () {
    // Assert
    assertDatabaseMissing('permissions', [
        'name' => 'test permission',
    ]);

    // Act
    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission')
            ->set('name', 'test permission')
            ->call('create');

    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission',
    ]);
});

test('the name field is required', function () {
    // Act
    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission')
            ->set('name', '')
            ->call('create')
            ->assertHasErrors(['name' => 'required']);
});

test('the name field is unique', function () {
    Permission::create(['name' => 'test permission']);

    // Act
    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission')
            ->set('name', 'test permission')
            ->call('create')
            ->assertHasErrors(['name' => 'unique']);
});
