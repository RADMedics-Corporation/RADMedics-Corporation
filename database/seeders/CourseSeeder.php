<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private function create($data): void
    {
        Course::updateOrCreate(['slug' => $data['slug']], $data);
    }

    public function run(): void
    {
        $courses = [
            [
               'name' => 'Emergency Medical Technician (EMT)',
                'slug' => Str::slug('EMT'),
                'description' => 'A 40-day intensive face-to-face program preparing future Emergency Medical Technicians in patient assessment, pre-hospital stabilization, trauma & medical emergency management, and safe transport.',
                'mode_of_learning' => 'F2F',
                'thumbnail' => "images/course-image-1.jpg",
                'published_at' => now(),
            ],
            [
                'name' => 'Emergency Medical Responder (EMR)',
                'slug' => Str::slug('EMR'),
                'description' => 'A 15-day foundational course for aspiring Emergency Medical Responders focusing on scene safety, initial patient care, basic airway management, bleeding control, shock prevention, and rapid activation of higher medical support.',
                'mode_of_learning' => 'Hybrid F2F',
                'thumbnail' => "images/course-image-2.jpg",
                'published_at' => now(),
            ],
            [
                'name' => 'Basic Life Support & First Aid',
                'slug' => Str::slug('BLS'),
                'description' => 'A 7-day skills-based program covering high-quality CPR, AED use, airway & breathing support, wound and fracture management, environmental emergencies, and immediate life-saving interventions',
                'mode_of_learning' => 'Hybrid F2F',
                'thumbnail' => "images/course-image-3.jpg",
                'published_at' => now(),
            ],
        ];

        foreach ($courses as $data) {
            $this->create($data);
        }

        $this->command->info("Courses seeded successfully.");
    }
}
