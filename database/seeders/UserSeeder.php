<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::class::create([
            'name' => 'Nicolas Suarez',
            'email' => 'nasuarezro@unal.edu.co',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'id_person' => 1
        ]);
        User::factory(50)->create();
    }
}
