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
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Morten Bak Super Admin',
             'email' => 'meb@indexed.dk',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Morten Bak Admin',
            'email' => 'meb+admin@indexed.dk',
        ]);

         $this->call([
             RoleSeeder::class,
             PermissionSeeder::class,
         ]);
    }
}
