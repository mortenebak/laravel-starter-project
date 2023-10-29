<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'meb@indexed.dk',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Super Admin');

        Plan::query()->create([
            'title' => 'Pro - 39 DKK / måned',
            'slug' => 'pro-monthly',
            'stripe_id' => 'price_1M9oZfKePSHD5WYkw7y8wq1R',
        ]);
        Plan::query()->create([
            'title' => 'Pro - 399 DKK / år',
            'slug' => 'pro-yearly',
            'stripe_id' => 'price_1M9oZfKePSHD5WYk4ZM245Hv',
        ]);
    }
}
