<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curriculum::create([
            'title' => 'Ingenieria de Sistemas',
            ]);
        Curriculum::create([
            'title' => 'Ingenieria Quimica',
            ]);
        Curriculum::create([
            'title' => 'Ingenieria Industrial',
            ]);
        Curriculum::create([
            'title' => 'Ingenieria Electronica',
            ]);
        Curriculum::create([
            'title' => 'Ingenieria Mecanica',
            ]);



    }
}
