<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a admin user
        User::factory()->create([
            'name' => 'Arjun P. Rosell',
            'email' => 'rosellarjun@gmail.com',
            'password' => bcrypt('12345jun'),
            'email_verified_at' => now(),
        ]);

        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'client']);

        // Find the user by email
        $user = User::where('email', 'rosellarjun@gmail.com')->first();
        if ($user) {
            $adminRole = Role::where('name', 'admin')->first();
            if ($adminRole) {
                $user->roles()->attach($adminRole);
            } else {
                $this->command->info('Admin role not found.');
            }
        } else {
            $this->command->info('User not found.');
        }
    }
}
