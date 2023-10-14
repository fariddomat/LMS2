<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_categories = CourseCategory::orderBy('sort_id', 'asc')->get();
        return view('dashboard.courses.categories.index', compact('course_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $categories=CourseCategory::all();
        return view('dashboard.courses.categories.create', compact('courses', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'name' => 'required',
        ]);

        $course_category = CourseCategory::create([
            'course_id' => $request->input('course_id'),
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('dashboard.course_categories.index')->with('success', 'CourseCategory created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseCategory  $course_category
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $course_category)
    {
        $courses=Course::all();
        $categories=CourseCategory::all();

        return view('dashboard.courses.categories.edit', compact('course_category', 'courses', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseCategory  $course_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $course_category)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'name' => 'required',
        ]);

        $course_category->update([
            'course_id' => $request->input('course_id'),
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),

        ]);

        return redirect()->route('dashboard.course_categories.index')->with('success', 'CourseCategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseCategory  $course_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCategory $course_category)
    {
        $course_category->delete();
        return redirect()->route('dashboard.course_categories.index')->with('success', 'CourseCategory deleted successfully.');
    }

    public function sort(Request $request)
    {
        // dd($request->order);
        $course_categories = CourseCategory::all();
        foreach ($course_categories as $course_category) {
            foreach ($request->order as $order) {
                if ($order['id'] == $course_category->id) {
                    $course_category->update(['sort_id' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

}
