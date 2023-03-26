<?php

use Livewire\Livewire;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\assertDatabaseHas;

test('a new role can be update', function () {
    $role = Role::create(['name' => 'Test Role']);

    Livewire::actingAs($this->user)
        ->test('admin.roles.edit-role', ['role' => $role->id])
        ->set('name', 'Test Role Updated')
        ->call('update')
        ->assertHasNoErrors()
        ->assertEmitted('roleUpdated');

    assertDatabaseHas('roles', [
        'name' => 'Test Role Updated',
    ]);
});

test('a name is required', function () {
    $role = Role::create(['name' => 'Test Role']);

    Livewire::actingAs($this->user)
        ->test('admin.roles.edit-role', ['role' => $role->id])
        ->set('name', '')
        ->call('update')
        ->assertHasErrors(['name' => 'required']);
});

test('a name is unique', function () {
    $role = Role::create(['name' => 'Test Role']);

    Livewire::actingAs($this->user)
        ->test('admin.roles.edit-role', ['role' => $role->id])
        ->set('name', 'Super Admin')
        ->call('update')
        ->assertHasErrors(['name' => 'unique']);
});
