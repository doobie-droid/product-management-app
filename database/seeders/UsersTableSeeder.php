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
            'name' => 'Leslie Douglas',
            'email' => 'lesliedouglas23@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(config('app.password')),
        ]);

        User::factory(10)->create();
    }
}
