<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private function courses()
    {
        return [
            [
                'data' => [
                   'name' => 'Emergency Medical Technician (EMT)',
                    'slug' => Str::slug('EMT'),
                    'description' => 'A 40-day intensive face-to-face program preparing future Emergency Medical Technicians in patient assessment, pre-hospital stabilization, trauma & medical emergency management, and safe transport.',
                    'mode_of_learning' => 'F2F',
                    'thumbnail' => "images/course-image-1.jpg",
                    'require_experience' => true,
                    'published_at' => now(),
                ],
                'modules' => [
                    [
                        'title' => 'Introduction to EMT',
                        'published_at' => now(),
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'published_at' => now(),
                                'type' => 'text',
                                'content' => ['body' => 'Definition, goals, importance, survival outcomes, role of lay rescuer vs healthcare provider']
                            ],
                        ],
                    ],
                    [
                        'title' => 'Scene Safety & Initial Assessment',
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'type' => 'text',
                                'content' => ['body' => 'Scene safety, PPE, checking responsiveness, calling for help, activating EMS/code team']
                            ],
                        ],
                    ]
                ],
            ],
            [
                'data' => [
                    'name' => 'Emergency Medical Responder (EMR)',
                    'slug' => Str::slug('EMR'),
                    'description' => 'A 15-day foundational course for aspiring Emergency Medical Responders focusing on scene safety, initial patient care, basic airway management, bleeding control, shock prevention, and rapid activation of higher medical support.',
                    'mode_of_learning' => 'Hybrid F2F',
                    'thumbnail' => "images/course-image-2.jpg",
                    'require_experience' => true,
                    'published_at' => now(),
                ],
                'modules' => [
                    [
                        'title' => 'Introduction to EMR',
                        'published_at' => now(),
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'published_at' => now(),
                                'type' => 'text',
                                'content' => ['content' => 'Definition, goals, importance, survival outcomes, role of lay rescuer vs healthcare provider']
                            ],
                        ],
                    ],
                    [
                        'title' => 'Scene Safety & Initial Assessment',
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'type' => 'text',
                                'content' => ['body' => 'Scene safety, PPE, checking responsiveness, calling for help, activating EMS/code team']
                            ],
                        ],
                    ]
                ],
            ],
            [
                'data' => [
                    'name' => 'Basic Life Support & First Aid',
                    'slug' => Str::slug('BLS'),
                    'description' => 'A 7-day skills-based program covering high-quality CPR, AED use, airway & breathing support, wound and fracture management, environmental emergencies, and immediate life-saving interventions',
                    'mode_of_learning' => 'Hybrid F2F',
                    'thumbnail' => "images/course-image-3.jpg",
                    'published_at' => now(),
                ],
                'modules' => [
                    [
                        'title' => 'Introduction to BLS',
                        'published_at' => now(),
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'published_at' => now(),
                                'type' => 'text',
                                'content' => ['body' => 'Definition, goals, importance, survival outcomes, role of lay rescuer vs healthcare provider']
                            ],
                        ],
                    ],
                    [
                        'title' => 'Scene Safety & Initial Assessment',
                        'submodules' => [
                            [
                                'title' => 'Key content',
                                'type' => 'text',
                                'content' => ['body' => 'Scene safety, PPE, checking responsiveness, calling for help, activating EMS/code team']
                            ],
                        ],
                    ]
                ],
            ]
        ];
    }

    private function createModules(Course $course, array $modules): void
    {
        foreach ($modules as $sort => $data) {
            $module = Module::create([
                'course_id' => $course->id,
                'title' => $data['title'],
                'sort_order' => $sort + 1,
                'published_at' => $data['published_at'] ?? null,
            ]);

            $this->createSubmodules($module, $data['submodules'] ?? []);
        }
    }

    private function createSubmodules(Module $module, array $subs): void
    {
        foreach($subs as $sort => $data) {
            Submodule::create([
                'module_id' => $module->id,
                'title' => $data['title'],
                'type' => $data['type'],
                'content' => $data['content'] ?? ['body' => 'default'],
                'sort_order' => $sort + 1,
                'published_at' => $data['published_at'] ?? null,
            ]);
        }
    }

    public function run(): void
    {

        foreach ($this->courses() as $c) {
            $course = Course::updateOrCreate([
                'slug' => $c['data']['slug']
            ], $c['data']);

            $this->createModules($course, $c['modules'] ?? []);
        }

        $this->command->info("Courses seeded successfully.");
    }
}
