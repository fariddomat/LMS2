<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Seed lessons for course 1
         Lesson::create([
            'title' => 'Introduction to the Course',
            'description' => 'This lesson gives a brief introduction to the course and what it covers.',
            'video_path' => 'https://example.com/videos/introduction.mp4',
            'duration' => '00:05:22',
            'course_id' => 1,
        ]);
        Lesson::create([
            'title' => 'Chapter 1: Getting Started',
            'description' => 'This lesson covers the basics of getting started with the course.',
            'video_path' => 'https://example.com/videos/chapter1.mp4',
            'duration' => '00:15:10',
            'course_id' => 1,
        ]);

        // Seed lessons for course 2
        Lesson::create([
            'title' => 'Introduction to Programming',
            'description' => 'This lesson introduces programming concepts and terminology.',
            'video_path' => 'https://example.com/videos/intro-programming.mp4',
            'duration' => '00:10:55',
            'course_id' => 2,
        ]);
        Lesson::create([
            'title' => 'Data Types and Variables',
            'description' => 'This lesson covers data types and variables in programming.',
            'video_path' => 'https://example.com/videos/data-types.mp4',
            'duration' => '00:20:30',
            'course_id' => 2,
        ]);
    }
}
