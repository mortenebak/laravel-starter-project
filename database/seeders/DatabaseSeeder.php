<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
    }
}
