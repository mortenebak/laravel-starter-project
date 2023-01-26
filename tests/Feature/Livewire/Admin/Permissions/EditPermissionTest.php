<?php

use Spatie\Permission\Models\Permission;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test('a permission can be updated', function () {
    // Arrange
    $this->actingAs(adminUser());

    $permission = Permission::create([
        'name' => 'test permission'
    ]);
    // Assert
    assertDatabaseHas('permissions', [
        'name' => 'test permission'
    ]);

    // Act
    Livewire::test('admin.permissions.edit-permission', ['permission' => $permission->id])
            ->assertSee('Edit permission')
            ->set('name', 'test permission 2')
            ->call('update');

    // Assert
    assertDatabaseMissing('permissions', [
        'name' => 'test permission'
    ]);
    assertDatabaseHas('permissions', [
        'name' => 'test permission 2'
    ]);

});
