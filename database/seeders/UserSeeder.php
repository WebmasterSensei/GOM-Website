<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::findOrCreate('admin');
        $userRole = Role::findOrCreate('user');

        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('123'),
        ]);
        $admin->assignRole($adminRole);

        // Create a regular user
        $user = User::create([
            'name' => 'Default user',
            'email' => 'user@example.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole($userRole);
    }
}
