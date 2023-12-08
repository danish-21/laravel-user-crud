<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
//        $this->call(UserSeeder::Class);
        // \App\Models\users::factory(10)->create();

        // \App\Models\users::factory()->create([
        //     'name' => 'Test users',
        //     'email' => 'test@example.com',
        // ]);
    }
}
