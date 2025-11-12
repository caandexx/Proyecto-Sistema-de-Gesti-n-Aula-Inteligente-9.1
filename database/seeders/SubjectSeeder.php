<?php
// database/seeders/SubjectSeeder.php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Matemáticas Avanzadas',
                'code' => 'MATH101',
                'color' => '#ff9eb5',
                'credits' => 4,
                'level' => 'avanzado',
                'description' => 'Curso avanzado de matemáticas con enfoque en aplicaciones prácticas.'
            ],
            [
                'name' => 'Programación Web',
                'code' => 'PROG202', 
                'color' => '#ffb380',
                'credits' => 3,
                'level' => 'intermedio',
                'description' => 'Desarrollo de aplicaciones web modernas con frameworks actuales.'
            ],
            [
                'name' => 'Diseño Gráfico',
                'code' => 'DESIGN303',
                'color' => '#d8bfd8',
                'credits' => 2,
                'level' => 'básico', 
                'description' => 'Fundamentos del diseño gráfico y herramientas digitales.'
            ],
            [
                'name' => 'Ciencias de Datos',
                'code' => 'DATA404',
                'color' => '#a2d2ff',
                'credits' => 5,
                'level' => 'avanzado',
                'description' => 'Análisis y procesamiento de grandes volúmenes de datos.'
            ],
            [
                'name' => 'Inteligencia Artificial',
                'code' => 'AI505',
                'color' => '#bde0fe',
                'credits' => 4,
                'level' => 'avanzado',
                'description' => 'Introducción a los algoritmos de machine learning y AI.'
            ]
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}