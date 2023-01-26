<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('the livewire can be displayed', function () {
    $this->actingAs(adminUser());

    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission');

});

test('a new permission can be created', function () {
    // Arrange
    $this->actingAs(adminUser());
    // Assert
    assertDatabaseMissing('permissions', [
        'name' => 'test permission'
    ]);

    // Act
    Livewire::test('admin.permissions.create-permission')
            ->assertSee('Create permission')
            ->set('name', 'test permission')
            ->call('create');

    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission'
    ]);

});
