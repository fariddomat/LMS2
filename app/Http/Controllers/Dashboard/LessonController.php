<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('sort_id', 'asc')->get();
        return view('dashboard.lessons.index', compact('lessons'));
    }

    public function show(Course $course)
    {
        $lessons = $course->lessons;
        return view('dashboard.lessons.index', compact('lessons'));
    }

    public function create(Course $course)
    {
        // dd($course);
        $course_categories=CourseCategory::where('course_id', $course->id)->get();
        return view('dashboard.lessons.create', compact('course', 'course_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'course_category_id' => 'required',
            'video' => 'required|mimetypes:video/mp4,video/webm,video/quicktime|max:100000000',
        ]);

        $lesson = new Lesson();
        $lesson->title = $validated['title'];
        $lesson->description = $validated['description'];
        $lesson->duration = $validated['duration'];
        $lesson->course_category_id = $validated['course_category_id'];
        // $lesson->video_path = $validated['video']->store('videos', 'public');
        $lesson->course_id = $request->course_id;


        // Save the video file
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            // $fileName = $file->getClientOriginalName();
            $filename = uniqid(). '.' .\File::extension($file->getClientOriginalName());
            $path = $file->storeAs('public/lessons', $filename.'.mp4', ['disk' => 'public']);

            // Set the video file path for the lesson
            $lesson->video_path = $path;
        }

        $lesson->save();

        $course = Course::findOrFail($request->course_id);
        return response()->json([
            'success' => true,
            'message' => 'Lesson created successfully.',
            'redirect_url' => route('dashboard.courses.show', $course)
        ]);
        // return redirect()->route('dashboard.courses.show', $course)->with('success', 'Lesson created successfully.');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        $course_categories=CourseCategory::where('course_id', $lesson->course->id)->get();
        // dd($lesson->course->id);
        return view('dashboard.lessons.edit', compact('course', 'lesson', 'course_categories'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'course_category_id' => 'required',
        ]);

        $lesson->title = $validated['title'];
        $lesson->description = $validated['description'];
        $lesson->course_category_id = $validated['course_category_id'];

        $lesson->save();

        return redirect()->route('dashboard.courses.show', $lesson->course_id)->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $course = Course::findOrFail($lesson->course_id);
        Storage::disk('public')->delete('public/lessons/' . $lesson->video_path);
        $lesson->delete();
        return redirect()->route('dashboard.courses.show', $course)->with('success', 'Lesson deleted successfully.');
    }
    public function sort(Request $request)
    {
        // dd($request->order);
        $lessons = Lesson::all();
        foreach ($lessons as $lesson) {
            foreach ($request->order as $order) {
                if ($order['id'] == $lesson->id) {
                    $lesson->update(['sort_id' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
