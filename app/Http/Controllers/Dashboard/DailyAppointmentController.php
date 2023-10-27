<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DailyAppointment;
use App\Models\DayOfWork;
use Illuminate\Http\Request;

class DailyAppointmentController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dayOfWork=DayOfWork::findOrFail($request->id);
        $dailyAppointment=DailyAppointment::where('day_of_work_id', $dayOfWork->id)->get();
        return view('dashboard.dailyAppointments.create', compact('dayOfWork', 'dailyAppointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dayOfWork=DayOfWork::findOrFail($request->id);
        $request->validate([
            'id'=>'required',
            'from'=>'required',
            'to'=>'required',
        ]);
        // dd($request->to);
        // dd(date('g:i',strtotime($request->from)));
        for ($i=strtotime($request->from); $i <= strtotime($request->to);  $i+=3600 ) {
            DailyAppointment::create([
                'day_of_work_id'=> $request->id,
                'time'=> date('g:i', $i),
            ]);
        }


        session()->flash('success', 'Created Successfully !');
        return redirect()->back();
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
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dailyAppointment=DailyAppointment::findOrFail($id);
        $dailyAppointment->delete();
        session()->flash('success', 'Deleted Successfully !');
        return redirect()->back();
    }
}
