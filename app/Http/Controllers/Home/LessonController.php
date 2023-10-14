<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function show($id)
    {
        try {

            $user = Auth::user();
            if (!$user->hasRole('superadministrator')) {
                $profile = Profile::where('email', $user->email)->firstOrFail();
                if ($user->status != 'active') {
                    return redirect()->route('home');
                }
            }
            $lesson = Lesson::findOrFail($id);
            $lessons = Lesson::where('course_id', $lesson->course_id)->orderBy('created_at')->get();
            if (!$user->hasRole('superadministrator')) {
                $enrollment = Enrollment::where('course_id', $lesson->course_id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();
            }
            return view('home.lessons.show', compact('lesson', 'lessons'));
        } catch (\Throwable $th) {

            return redirect()->route('home');
        }
    }
}
