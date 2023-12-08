<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfUsers = 1000;

        for ($i = 1; $i <= $numberOfUsers; $i++) {
            $random_number = mt_rand(6000000000, 9999999999);

            \DB::table('users')->insert([
                'name' => \Str::random(15),
                'email' => \Str::random(20) . '@gmail.com',
                'mobile' => $random_number,
                'status' => true,
            ]);
        }
        //
    }

}
