<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@debora-craft.com'],
            [
                'name' => 'Admin',
                'password' => 'admin123', // Will be automatically hashed by the model cast
                'role' => 'admin',
            ]
        );

        // Always update password to ensure it's correct
        $admin->password = 'admin123'; // Will be automatically hashed by the model cast
        $admin->role = 'admin';
        $admin->name = 'Admin';
        $admin->save();

        $this->command->info('Admin user created/updated successfully!');
        $this->command->info('Email: admin@debora-craft.com');
        $this->command->info('Password: admin123');
    }
}

