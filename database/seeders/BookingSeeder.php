<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Verificar y crear datos básicos si no existen
        if (Teacher::count() == 0) {
            $this->call(TeacherSeeder::class);
        }
        
        if (Subject::count() == 0) {
            $this->call(SubjectSeeder::class);
        }
        
        if (Classroom::count() == 0) {
            $this->call(ClassroomSeeder::class);
        }

        // Obtener datos existentes
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        // Si todavía no hay datos, crear algunos manualmente
        if ($classrooms->isEmpty()) {
            $classrooms = Classroom::factory(3)->create();
        }
        if ($subjects->isEmpty()) {
            $subjects = Subject::factory(3)->create();
        }
        if ($teachers->isEmpty()) {
            $teachers = Teacher::factory(3)->create();
        }

        $bookingTitles = [
            'Clase de Matemáticas Avanzadas',
            'Taller de Programación Web',
            'Sesión de Laboratorio',
            'Reunión de Departamento',
            'Examen Final',
            'Tutoría Grupal',
            'Workshop de Diseño',
            'Presentación de Proyectos',
            'Clase de Repaso',
            'Seminario Especial'
        ];

        $bookings = [];

        for ($i = 0; $i < 20; $i++) {
            $classroom = $classrooms->random();
            $subject = $subjects->random();
            $teacher = $teachers->random();
            
            $date = Carbon::today()->addDays(rand(1, 30));
            $startTime = Carbon::createFromTime(rand(7, 18), rand(0, 3) * 15, 0);
            $endTime = (clone $startTime)->addHours(rand(1, 3));

            $bookings[] = [
                'title' => $bookingTitles[array_rand($bookingTitles)],
                'description' => $this->generateDescription(),
                'date' => $date,
                'start_time' => $startTime->format('H:i:s'),
                'end_time' => $endTime->format('H:i:s'),
                'classroom_id' => $classroom->id,
                'subject_id' => $subject->id,
                'teacher_id' => $teacher->id,
                'status' => $this->randomStatus(),
                'attendees' => rand(5, $classroom->capacity),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Booking::insert($bookings);
        
        $this->command->info('🎀 ' . count($bookings) . ' reservas creadas exitosamente!');
    }

    private function generateDescription(): string
    {
        $descriptions = [
            'Clase regular del curso con todos los estudiantes inscritos.',
            'Sesión práctica con equipos especializados.',
            'Reunión importante para planificación académica.',
            'Evaluación parcial del semestre actual.',
            'Taller interactivo con participación activa.',
            'Tutoría para resolver dudas y consultas.',
            'Presentación de trabajos finales.',
            'Laboratorio con materiales específicos.',
            'Clase magistral con invitado especial.',
            'Repaso general para examen final.'
        ];

        return $descriptions[array_rand($descriptions)];
    }

    private function randomStatus(): string
    {
        $statuses = ['pending', 'confirmed', 'confirmed', 'confirmed', 'cancelled'];
        return $statuses[array_rand($statuses)];
    }
}