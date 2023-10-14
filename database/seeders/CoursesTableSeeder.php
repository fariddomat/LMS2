<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => 'Course 1',
                'description' => 'Course description',
                'duration' => 30,
                'price' => 29.99,
            ],
            [
                'title' => 'Course 2',
                'description' => 'Course description',
                'duration' => 50,
                'price' => 49.99,
            ],
            // Add more courses here
        ];

        // Loop through the courses and insert them into the database
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
