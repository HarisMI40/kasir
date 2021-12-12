<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        // User::factory()->count(2)->create();
        user::create(
			[
                'name' => 'admin2',
                'email' => 'admin2@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // password
                'remember_token' => Str::random(10),
            ]
            );
    }
}
