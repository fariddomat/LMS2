<?php

namespace App\Http\Controllers\Home;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::orderBy('id')->get();
        return view('home.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $service=Service::where('title', $title)->firstOrFail();
        $services=Service::all();
        return view('home.services.show', compact('service', 'services'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rating(Request $request)
    {
        $service=Service::findOrFail($request->service_id);
        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'rating' => 'required|numeric',
            'review' => 'required',
        ]);

        ServiceReview::firstOrCreate([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'rating' => $request->rating,
            'review' => $request->review,

        ]);

        try {
            $user=Auth::user();
            $info = array(
                'name' => 'إشعار عملية تقييم خدمة ',

                'route' => route('dashboard.servicereviews.index'),
                'details' => '	الحصول على تقييم جديد من قبل '.$user->name.' لمراجعته  '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to('notify@holistichealth.sa', 'notify')
                    ->subject('تم تقييم خدمة ');
                $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
            });

        } catch (\Throwable $th) {
            //throw $th;
        }



        session()->flash('success', 'تم التقييم بنجاح');
        return redirect()->back();
    }
}
