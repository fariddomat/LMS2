<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::latest()->paginate(40);

        return view('dashboard.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        $profiles = Profile::all();
        return view('dashboard.enrollments.create', compact('courses', 'profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]);

        $enrollment = Enrollment::firstOrCreate([
            'user_id' => $request->user_id,
            'course_id' => $request->input('course_id'),
        ]);
        // $enrollment->save();

        return redirect()->route('dashboard.enrollments.index')->with('success', 'Enrollment created successfully');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('dashboard.enrollments.index')->with('success', 'Enrollment deleted successfully');
    }
}
