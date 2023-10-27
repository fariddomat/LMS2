<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DayOfWork;
use Illuminate\Http\Request;

class DayOfWorkController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dayOfWorks=DayOfWork::all();
        return view('dashboard.dayOfWorks.index', compact('dayOfWorks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dayOfWorks.create');
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
            'day'=>'required'
        ]);
        $dayOfWork=DayOfWork::create($request->all());
      
        session()->flash('success', 'Created Successfully !');
        return redirect()->route('dashboard.dayOfWorks.index');
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
        $dayOfWork=DayOfWork::findOrFail($id);
        return view('dashboard.dayOfWorks.edit', compact('dayOfWork', 'doctors'));
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
        $request->validate([
            'day'=>'required',
        ]);
        $dayOfWork=DayOfWork::findOrFail($id);
        $dayOfWork->update($request->all());

        session()->flash('success', 'Updated Successfully !');
        return redirect()->route('dashboard.dayOfWorks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dayOfWork=DayOfWork::findOrFail($id);
        $dayOfWork->delete();

        session()->flash('success', 'Deleted Successfully !');
        return redirect()->route('dashboard.dayOfWorks.index');
    }
}
