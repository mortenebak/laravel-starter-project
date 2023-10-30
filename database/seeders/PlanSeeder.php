<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Plan::query()->where('slug', '=', 'pro-monthly')->exists()) {
            Plan::query()->create([
                'title' => 'Pro - 39 DKK / måned',
                'slug' => 'pro-monthly',
                'stripe_id' => 'price_1M9oZfKePSHD5WYkw7y8wq1R',
            ]);
        }
        if (! Plan::query()->where('slug', '=', 'pro-yearly')->exists()) {
            Plan::query()->create([
                'title' => 'Pro - 399 DKK / år',
                'slug' => 'pro-yearly',
                'stripe_id' => 'price_1M9oZfKePSHD5WYk4ZM245Hv',
            ]);
        }
    }
}
