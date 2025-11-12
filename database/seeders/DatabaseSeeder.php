<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TeacherSeeder::class,
            SubjectSeeder::class,
            ClassroomSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
