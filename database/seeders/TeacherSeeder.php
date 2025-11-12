<?php
// database/seeders/TeacherSeeder.php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Ana García',
                'email' => 'ana.garcia@escuela.com',
                'specialty' => 'Matemáticas Avanzadas',
                'phone' => '+54 11 1234-5678'
            ],
            [
                'name' => 'Carlos López', 
                'email' => 'carlos.lopez@escuela.com',
                'specialty' => 'Programación Web',
                'phone' => '+54 11 2345-6789'
            ],
            [
                'name' => 'María Fernández',
                'email' => 'maria.fernandez@escuela.com', 
                'specialty' => 'Diseño Gráfico',
                'phone' => '+54 11 3456-7890'
            ],
            [
                'name' => 'Roberto Silva',
                'email' => 'roberto.silva@escuela.com',
                'specialty' => 'Ciencias de Datos',
                'phone' => '+54 11 4567-8901'
            ],
            [
                'name' => 'Lucía Martínez',
                'email' => 'lucia.martinez@escuela.com',
                'specialty' => 'Inteligencia Artificial',
                'phone' => '+54 11 5678-9012'
            ]
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}