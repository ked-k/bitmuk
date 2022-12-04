<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'first_name' => 'user' . ($i == 0 ? '' : $i),
                'last_name' => 'last' . ($i == 0 ? '' : $i),
                'phone' => '01985475684',
                'Avatar' => null,
                'address' => 'gabtoli',
                'city' => 'narsingdi',
                'state' => 'dhaka',
                'zip' => '1600',
                'country' => 'test country',
                'status' => 1,
                '2fa' => 0,
                'email' => 'user' . ($i == 0 ? '' : $i) . '@tdevs.co',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
