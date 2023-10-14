<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Lesson $lesson)
    {
        return view('dashboard.lessons.files.create', compact('lesson'));
    }

    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:pdf,doc,docx,txt,jpeg,png,jpg,webp'
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('lesson_files/'.$lesson->id, $fileName ,['disk' => 'public']);
                LessonFile::create([
                    'lesson_id' => $lesson->id,
                    'file_name' => $fileName
                ]);
            }
        }
        session()->flash('success', 'تم الحفظ بنجاح !');
        return redirect()->route('dashboard.lesson.files.show', $lesson)->with('success', 'Files uploaded successfully.');
    }

    public function destroy(LessonFile $lessonFile)
    {
        $lesson = $lessonFile->lesson;
        Storage::disk('public')->delete('lesson_files/'.$lesson->id.'/'. $lessonFile->file_name);

        $lessonFile->delete();
        session()->flash('success', 'تم الحذف بنجاح !');

        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson=Lesson::findOrFail($id);
        return view('dashboard.lessons.files.show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
