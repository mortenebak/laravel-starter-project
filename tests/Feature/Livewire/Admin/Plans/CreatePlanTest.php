<?php

use App\Livewire\Admin\Plans\CreatePlan;
use App\Models\Plan;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;

it('requires the correct access to view the component', function () {
    Livewire::test(CreatePlan::class)
        ->assertForbidden();

    $user = User::factory()->create();
    $user->givePermissionTo('create plans');

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk();
});

it('has wired properties and methods', function () {
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

it('validates the fields', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('create plans');

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk()
        ->set('title', '')
        ->set('slug', '')
        ->set('stripe_id', '')
        ->call('create')
        ->assertHasErrors(['title', 'slug', 'stripe_id']);

    Plan::factory()->create(['slug' => 'test-plan']);

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk()
        ->set('title', 'Test Plan')
        ->set('slug', 'test-plan')
        ->set('stripe_id', 'test-plan')
        ->call('create')
        ->assertHasErrors(['slug']);
});

it('can create a plan', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('create plans');

    assertDatabaseCount('plans', 0);

    Livewire::actingAs($user)
        ->test(CreatePlan::class)
        ->assertOk()
        ->set('title', 'Test Plan')
        ->set('slug', 'test-plan')
        ->set('stripe_id', 'test-plan')
        ->call('create')
        ->assertHasNoErrors()
        ->assertDispatched('planCreated');

    assertDatabaseCount('plans', 1);

    $this->assertDatabaseHas('plans', [
        'title' => 'Test Plan',
        'slug' => 'test-plan',
        'stripe_id' => 'test-plan',
    ]);
});
