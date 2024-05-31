<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'username' => 'admin',
        ]);

        User::create([
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
            'username' => 'superadmin',
            'role' => UserRole::SUPER_ADMIN,
        ]);
    }
}
