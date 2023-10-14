<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceSectionController extends Controller
{

    public function index(Service $service)
    {
        $sections = $service->sections()->get();
        return view('dashboard.services.sections.index', compact('sections', 'service'));
    }

    public function create(Service $service)
    {
        return view('dashboard.services.sections.create', compact('service'));
    }
    public function store(Request $request,Service $service)
    {
        $request->validate([
            'header' => 'nullable',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $section = new ServiceSection;
        $section->service_id = $service->id;
        $section->header = $request->input('header', 0);
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $section->image = $imagePath;
        }

        $section->save();

        return redirect()->route('dashboard.sections.index', $service->id)->with('success', 'Section created successfully.');
    }

    public function edit($section)
    {
        $section=ServiceSection::findOrFail($section);
        return view('dashboard.services.sections.edit', compact('section'));
    }

    public function update(Request $request,  $section)
    {

        $section=ServiceSection::findOrFail($section);
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

        return redirect()->route('dashboard.sections.index', $section->service_id)->with('success', 'Section updated successfully.');
    }

    public function destroy($section)
    {
        $section=ServiceSection::findOrFail($section);
        $section->delete();
        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function destroyImage($section)
    {
        $section=ServiceSection::findOrFail($section);
        if ($section->image) {
            Storage::disk('public')->delete($section->image);
            $section->image = null;
            $section->save();
        }
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
