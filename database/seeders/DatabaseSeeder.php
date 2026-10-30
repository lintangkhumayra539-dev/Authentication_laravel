<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $adminPassword = env('ADMIN_PASSWORD');

        if (filled($adminPassword)) {
            $admin = User::firstOrCreate(
                ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
                [
                    'name' => env('ADMIN_NAME', 'Administrator'),
                    'password' => Hash::make($adminPassword),
                ],
            );

            $admin->syncRoles('Admin');
        }
    }
}
