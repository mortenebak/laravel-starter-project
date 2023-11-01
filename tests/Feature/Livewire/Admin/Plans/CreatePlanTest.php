<?php

use App\Livewire\Admin\Plans\CreatePlan;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;

it('requires the correct access to view the component', function () {

    Livewire::test(CreatePlan::class)
        ->assertForbidden();

    Permission::create(['name' => 'create plans']);

    $user = User::factory()->create();
    $user->givePermissionTo('create plans');

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk();

});

test('it has wired properties and methods', function () {

    Permission::create(['name' => 'create plans']);

    $user = User::factory()->create();
    $user->givePermissionTo('create plans');

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk()
        ->assertPropertyWired('title')
        ->assertPropertyWired('slug')
        ->assertPropertyWired('stripe_id')
        ->assertMethodWired('create');

});

todo('it validates the fields');

todo('a plan can be created');
