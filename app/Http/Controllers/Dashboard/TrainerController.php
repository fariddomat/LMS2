<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;

class TrainerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers=Trainer::paginate(40);
        return view('dashboard.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
            'img' => 'required|image',
        ]);

        $request_data = $request->except(['img']);

        if ($request->img) {

            $img = Image::make($request->img)
                ->resize(600, 600)
                ->encode('jpg');

            Storage::disk('public')->put('trainers/images/' . $request->img->hashName(), (string)$img, 'public');
            $request_data['img'] = $request->img->hashName();
        }


        Trainer::create($request_data);

        session()->flash('success', 'Successfully created !');

        return redirect()->route('dashboard.trainers.index');

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
        $trainer = Trainer::findOrFail($id);
        return view('dashboard.trainers.edit', compact('trainer'));
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
        $trainer = Trainer::findOrFail($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
            'img' => 'sometimes|image',
        ]);

        $request_data = $request->except(['img']);

        if ($request->img) {
            if ($trainer->img != null)
                Storage::disk('public')->delete('trainers/images/' . $trainer->img);

            $img = Image::make($request->img)
                ->resize(600, 600)
                ->encode('jpg');

            Storage::disk('public')->put('trainers/images/' . $request->img->hashName(), (string)$img, 'public');
            $request_data['img'] = $request->img->hashName();
        }


        $trainer->update($request_data);

        session()->flash('success', 'Successfully Updated !');

        return redirect()->route('dashboard.trainers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer=Trainer::findOrFail($id);
        $trainer->delete();

        session()->flash('success', 'Successfully deleted !');

        return redirect()->route('dashboard.trainers.index');
    }
}
