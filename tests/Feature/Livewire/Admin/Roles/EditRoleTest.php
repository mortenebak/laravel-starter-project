<?php

use App\Livewire\Admin\Roles\EditRole;
use App\Models\User;
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
        ->assertDispatched('roleUpdated');

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

it('is required to have permission to edit a role', function() {

    $role = Role::create(['name' => 'Test Role']);

    Livewire::test(EditRole::class, ['role' => $role->id])
        ->assertForbidden();

    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(EditRole::class, ['role' => $role->id])
        ->assertForbidden();

    $user->givePermissionTo('edit roles');

    Livewire::actingAs($user)
        ->test(EditRole::class, ['role' => $role->id])
        ->assertOk();
});
