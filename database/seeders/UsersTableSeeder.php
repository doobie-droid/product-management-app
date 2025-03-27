<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'is_admin' => true,
            'password' => Hash::make(config('app.password')),
        ]);

        User::create([
            'name' => 'Plain User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'is_admin' => false,
            'password' => Hash::make(config('app.password')),
        ]);

        User::factory(10)->create();
    }
}
