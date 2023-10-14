<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderService;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderService::latest()->paginate(40);
        return view('dashboard.orderservices.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $services = Service::all();
        $profiles = Profile::all();
        return view('dashboard.orderservices.create', compact('services', 'profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
        ]);

        $order = OrderService::firstOrCreate([
            'user_id' => $request->user_id,
            'service_id' => $request->input('service_id'),
        ]);
        // $enrollment->save();

        return redirect()->route('dashboard.orderservices.index')->with('success', 'Order Service created successfully');
    }

    public function destroy($id)
    {
        $order = OrderService::findOrFail($id);
        $order->delete();

        return redirect()->route('dashboard.orderservices.index')->with('success', 'Order Service deleted successfully');
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
