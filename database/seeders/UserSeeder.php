<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private function create(string $roleStr): void
    {
        $role = Role::firstOrCreate(
            ['name' => $roleStr]
        );

        $email = "{$roleStr}@example.com";

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $roleStr,
                'email' => "{$roleStr}@example.com",
                'password' => Hash::make('password'),
                'role_id' => $role->id,
            ]
        );

        UserProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => rand(0, 1) ? 'male' : 'female',
                'phone' => '0912-345-6789',
                'birthdate' => now()->subYears(rand(20, 40)),
                'address' => "Mandaluyong City"
            ]
        );
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->create('super_admin');
        $this->create('admin');
        $this->create('instructor');
        $this->create('student');
        $this->create('temporary');

        $this->command->info("Roles and users seeded successfully.");
    }
}
