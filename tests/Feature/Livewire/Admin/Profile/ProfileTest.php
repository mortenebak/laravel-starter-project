<?php

use App\Models\User;
use Livewire\Livewire;

it('can render the edit profile page', function () {
    $this->actingAs($this->user)
        ->get(route('admin.profile.edit'))
        ->assertSeeLivewire(\App\Http\Livewire\Admin\Profile\EditProfile::class);
});

it('can update the profile', function () {
    $this->assertDatabaseHas('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);

    Livewire::actingAs($this->user)
        ->test(\App\Http\Livewire\Admin\Profile\EditProfile::class)
        ->set('name', 'New Name')
        ->set('email', 'hej@netbums.dk')
        ->call('updateProfile')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('users', [
        'name' => 'New Name',
        'email' => 'hej@netbums.dk',
    ]);

    $this->assertDatabaseMissing('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);
});

it('can not update the profile with invalid data', function () {
    $this->assertDatabaseHas('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);

    Livewire::actingAs($this->user)
        ->test(\App\Http\Livewire\Admin\Profile\EditProfile::class)
        ->set('name', '')
        ->set('email', 'invalid-email')
        ->call('updateProfile')
        ->assertHasErrors(['name', 'email']);

    $this->assertDatabaseHas('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);
});

it('can not update the profile with an email that already exists', function () {
    $newUser = User::factory()->create([
        'email' => 'test@admin.com',
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);

    Livewire::actingAs($this->user)
        ->test(\App\Http\Livewire\Admin\Profile\EditProfile::class)
        ->set('name', 'New Name')
        ->set('email', 'test@admin.com')
        ->call('updateProfile')
        ->assertHasErrors(['email']);
});

it('can logout the user if the email is changed', function () {
    $this->assertDatabaseHas('users', [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);

    Livewire::actingAs($this->user)
        ->test(\App\Http\Livewire\Admin\Profile\EditProfile::class)
        ->set('name', 'New Name')
        ->set('email', 'new@admin.com')
        ->call('updateProfile')
        ->assertRedirect(route('login'));

    $this->assertGuest();

    $this->assertDatabaseHas('users', [
        'name' => 'New Name',
        'email' => 'new@admin.com',
    ]);
});
