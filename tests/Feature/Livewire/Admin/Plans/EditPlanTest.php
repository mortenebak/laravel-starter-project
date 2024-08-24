<?php

use App\Livewire\Admin\Plans\EditPlan;
use App\Models\Plan;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseMissing;

it('requires the correct access to view the component', function () {

    Livewire::test(EditPlan::class)
        ->assertForbidden();

    $user = User::factory()->create();
    /** @var User $user */
    $user->givePermissionTo('edit plans');

    Livewire::actingAs($user)
        ->test(EditPlan::class)
        ->assertOk();
});

it('can fetch the plan from the provided plan id', function () {
    Livewire::test(EditPlan::class)
        ->assertForbidden();

    $user = User::factory()->create();
    /** @var User $user */
    $user->givePermissionTo('edit plans');

    $plan = Plan::factory()->create();

    Livewire::actingAs($user)
        ->test(EditPlan::class, ['plan' => $plan])
        ->assertOk()
        ->assertSet('title', $plan->title)
        ->assertSet('slug', $plan->slug)
        ->assertSet('stripe_id', $plan->stripe_id);

});

it('has wired properties and methods', function () {
    $user = User::factory()->create();
    /** @var User $user */
    $user->givePermissionTo('edit plans');
    $plan = Plan::factory()
        ->create();

    Livewire::actingAs($user)
        ->test(EditPlan::class, ['plan' => $plan])
        ->assertOk()
        ->assertPropertyWired('title')
        ->assertPropertyWired('slug')
        ->assertPropertyWired('stripe_id')
        ->assertMethodWired('save');
});

it('can save a updated plan', function () {

    $user = User::factory()->create();
    /** @var User $user */
    $user->givePermissionTo('edit plans');
    $plan = Plan::factory()
        ->create();

    Livewire::actingAs($user)
        ->test(EditPlan::class, ['plan' => $plan])
        ->assertOk()
        ->set('title', 'New Plan Title')
        ->set('slug', 'New-Plan-Slug')
        ->set('stripe_id', 'New Stripe ID')
        ->call('save')
        ->assertHasNoErrors();

    assertDatabaseMissing('plans', [
        'title' => $plan->title,
        'slug' => $plan->slug,
        'stripe_id' => $plan->stripe_id,
    ]);

    expect($plan->refresh())
        ->title->toBe('New Plan Title')
        ->slug->toBe('New-Plan-Slug')
        ->stripe_id->toBe('New Stripe ID');

});
