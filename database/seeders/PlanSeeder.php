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
                'price' => 39,
                'currency' => 'DKK',
                'interval' => 'monthly',
                'features' => "+Single project\n+1 year of free updates\n+Billing portal\n+Credit management\n+Priority support\n+Stripe & Paddle support\n+30-day Money Back Guarantee\n-2 months discount",
            ]);
        }
        if (! Plan::query()->where('slug', '=', 'pro-yearly')->exists()) {
            Plan::query()->create([
                'title' => 'Pro - 399 DKK / år',
                'slug' => 'pro-yearly',
                'stripe_id' => 'price_1M9oZfKePSHD5WYk4ZM245Hv',
                'price' => 399,
                'currency' => 'DKK',
                'interval' => 'yearly',
                'features' => "+Single project\n+1 year of free updates\n+Billing portal\n+Credit management\n+Priority support\n+Stripe & Paddle support\n+30-day Money Back Guarantee\n+2 months discount",
            ]);
        }
    }
}
