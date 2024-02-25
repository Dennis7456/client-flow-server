<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'user_name' => 'admin247',
            'email' => 'admin@test.net',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            
        ]);

        \App\Models\Client::factory(50)->create();
    }
}
