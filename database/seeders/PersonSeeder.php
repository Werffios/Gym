<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::class::create([
            'document' => '123456789',
            'date_of_birth' => '1999-01-01',
            'id_curriculum' => 1,
        ]);
        Person::factory(50)->create();
    }
}
