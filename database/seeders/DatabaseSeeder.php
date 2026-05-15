<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private function create(string $roleStr): void
    {
        $role = Role::firstOrCreate(
            ['name' => $roleStr]
        );

        $email = "{$roleStr}@example.com";

        if (User::where('email', $email)->exists()) {
            $this->command->info("User already exists: {$email}");
            return;
        }

        User::factory()->create([
            'name' => $roleStr,
            'email' => "{$roleStr}@example.com",
            'password' => Hash::make('password'),
            'role_id' => $role->id,
        ]);
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
