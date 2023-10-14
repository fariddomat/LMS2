<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $lessons=Lesson::where('course_id',$course->id)->orderBy('sort_id', 'asc')->get();
        return view('dashboard.courses.show', compact('course','lessons'));
    }

    public function create()
    {
        return view('dashboard.courses.create');
    }

    public function store(Request $request)
    {

        $request_data = $request->except(['thumbnail']);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|max:2048',
        ]);

        $thumbnail = Image::make($request->thumbnail)
            ->encode('jpg');

        Storage::disk('public')->put('public/images/courses/' . $request->thumbnail->hashName(), (string)$thumbnail, 'public');


        $request_data['thumbnail'] = $request->thumbnail->hashName();
        Course::create($request_data);

        return redirect()->route('dashboard.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {

        $request_data = $request->except(['thumbnail']);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($request->thumbnail) {
            if ($course->thumbnail != null)
                Storage::disk('public')->delete('public/images/courses/' . $course->thumbnail);
            $thumbnail = Image::make($request->thumbnail)
                ->encode('jpg');

            Storage::disk('public')->put('public/images/courses/' . $request->thumbnail->hashName(), (string)$thumbnail, 'public');
            $request_data['thumbnail'] = $request->thumbnail->hashName();
        }
        $course->update($request_data);

        return redirect()->route('dashboard.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->thumbnail != null)
                Storage::disk('public')->delete('public/images/courses/' . $course->thumbnail);
        $course->delete();

        return redirect()->route('dashboard.courses.index')->with('success', 'Course deleted successfully.');
    }
}
