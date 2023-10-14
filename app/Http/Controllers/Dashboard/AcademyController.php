<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function create()
    {
        $academy = Academy::first();
        return view('dashboard.academy.create', compact('academy'));
    }

    public function store(Request $request)
    {

        $academy =  Academy::find(1);
        if (is_null($academy)) {
            $academy = Academy::create($request->all());
        }
        $academy->update($request->all());

        session()->flash('success', 'Academy Updated Successfully');
        return redirect()->back();
    }

}
