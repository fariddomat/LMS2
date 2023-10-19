<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('dashboard.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->except(['img', 'file']);

        $request->validate([
            'name' => 'required',
            'img' => 'required|image',
            'file' => 'required|file'
        ]);

        $img = Image::make($request->img)
            ->encode('jpg');
        Storage::disk('public')->put('materials/' . $request->img->hashName(), (string)$img, 'public');
        $request_data['img'] = $request->img->hashName();

        $file=$request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('materials/', $fileName ,['disk' => 'public']);
        $request_data['file'] = $fileName;

        Material::create($request_data);
        return redirect()->route('dashboard.materials.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material=Material::findOrFail($id);
        Storage::disk('public')->delete('materials/'. $material->file);
        Storage::disk('public')->delete('materials/'. $material->img);
        $material->delete();
        return redirect()->route('dashboard.materials.index')->with('success', 'Material deleted successfully.');

    }
}
