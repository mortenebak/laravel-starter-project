<?php

namespace Tests\Feature\Command;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CreateSuperAdminCommandTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateSuperAdmin()
    {
        Role::create(['name' => 'Super Admin']);

        $this->assertDatabaseCount('users', 0);
        $this->artisan('app:create-super-admin')
            ->expectsQuestion('What is the users name?', 'Test User')
            ->expectsQuestion('What is the users email?', 'test@test.com')
            ->expectsQuestion('What is the users password?', 'password')
            ->expectsConfirmation('Is this user a super admin?', 'yes')
            ->expectsOutput('User created successfully');

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@test.com',
        ]);

        $user = User::first();
        expect($user->hasRole('Super Admin'))->toBeTrue();
    }
}
