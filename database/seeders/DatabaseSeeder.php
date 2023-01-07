<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name'  => 'Morten Bak Super Admin',
            'email' => 'meb@indexed.dk',
        ]);

        \App\Models\User::factory()->create([
            'name'  => 'Morten Bak Admin',
            'email' => 'meb+admin@indexed.dk',
        ]);

        \App\Models\User::factory(4)->create();

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
