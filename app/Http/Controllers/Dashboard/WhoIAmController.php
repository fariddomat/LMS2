<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WhoIAm;
use Illuminate\Http\Request;

class WhoIAmController extends Controller
{

    public function index()
    {
        $sections = WhoIAm::all();
        return view('dashboard.whoiam.index', compact('sections'));
    }

    public function create()
    {
        return view('dashboard.whoiam.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'title' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $section = new WhoIAm;
        $section->header = $request->input('header', 0);
        $section->start_date = $request->input('start_date');
        $section->end_date = $request->input('end_date');
        $section->title = $request->input('title');
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $section->image = $imagePath;
        }

        $section->save();

        return redirect()->route('dashboard.whoiam.index')->with('success', 'Section created successfully.');
    }

    public function edit($section)
    {
        $section=WhoIAm::findOrFail($section);
        return view('dashboard.whoiam.edit', compact('section'));
    }

    public function update(Request $request,  $section)
    {

        $section=WhoIAm::findOrFail($section);
        $request->validate([
            'header' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'title' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $section->header = $request->input('header', 0);
        $section->start_date = $request->input('start_date');
        $section->end_date = $request->input('end_date');
        $section->title = $request->input('title');
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $section->image = $imagePath;
        }

        $section->save();

        return redirect()->route('dashboard.whoiam.index')->with('success', 'Section updated successfully.');
    }

    public function destroy($section)
    {

        $section=WhoIAm::findOrFail($section);
        $section->delete();
        return redirect()->route('dashboard.whoiam.index')->with('success', 'Section deleted successfully.');
    }
}
