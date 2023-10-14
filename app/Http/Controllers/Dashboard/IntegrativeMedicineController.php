<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\IntegrativeMedicine;
use Illuminate\Http\Request;

class IntegrativeMedicineController extends Controller
{
    public function index()
    {
        $sections = IntegrativeMedicine::orderBy('created_at')->get();
        return view('dashboard.integrativeMedicines.index', compact('sections'));
    }

    public function create()
    {
        return view('dashboard.integrativeMedicines.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'nullable',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $section = new IntegrativeMedicine;
        $section->header = $request->input('header', 0);
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $section->image = $imagePath;
        }

        $section->save();

        return redirect()->route('dashboard.integrativeMedicines.index')->with('success', 'Section created successfully.');
    }

    public function edit($section)
    {
        $section=IntegrativeMedicine::findOrFail($section);
        return view('dashboard.integrativeMedicines.edit', compact('section'));
    }

    public function update(Request $request,  $section)
    {

        $section=IntegrativeMedicine::findOrFail($section);
        $request->validate([
            'header' => 'nullable',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $section->header = $request->input('header', 0);
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $section->image = $imagePath;
        }

        $section->save();

        return redirect()->route('dashboard.integrativeMedicines.index')->with('success', 'Section updated successfully.');
    }

    public function destroy($section)
    {

        $section=IntegrativeMedicine::findOrFail($section);
        $section->delete();
        return redirect()->route('dashboard.integrativeMedicines.index')->with('success', 'Section deleted successfully.');
    }
}
