<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Traits\UseZoom;
use App\Models\OnlineClasse;
use App\Models\Service;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class OnlineClasseController extends Controller
{
    use UseZoom;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;


    public function createZoomLink($request)
    {

        $data = $this->create($request);

        return $data;
    }
    public function updateZoomLink($id, $data)
    {
        $data = $this->updatezoom($id, $data);
        return $data;
    }
    public function deleteZoomLink($request)
    {

        $data = $this->delete($request);
        return $data;
    }


    public function linkZoomAccount(Request $req)
    {
        $response = $this->linkZoom(Auth::Id(), $req->email);
        return back()->with('message', $response['message']);
    }

    public function createMeeting($request, $id)
    {

        $classe = OnlineClasse::findOrFail($id);

        if ($classe->start_url === null) {

            $data = $this->create($request);

            // dd($data['data']['id']);


            if ($data) {
                $meeting_id = $data['data']['id'];
                $password = $data['data']['password'];
                $meeting_start = $data['data']['start_url'];
                $meeting_join = $data['data']['join_url'];
                $classe->meeting_id = $meeting_id . "";
                $classe->password = $password;
                $classe->start_url = $meeting_start;
                $classe->join_url = $meeting_join;
                $classe->save();
                $classe->update([
                    'meeting_id' => $data['data']['id']
                ]);
                // dd($classe);

                return redirect($meeting_start);
            } else {
                return redirect()->back()->with('error', 'Sorry No Meeting create');
            }
        } else {
            return redirect($classe->start_url);
        }

        return redirect()->back()->with('error', 'url already added');
    }




    /**
     * Zoom Meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function meeting(Request $req)
    {

        return view('zoom.meeting', get_defined_vars());
    }

    /**
     * Zoom ended
     *
     * @return \Illuminate\Http\Response
     */
    public function ended(Request $req)
    {
        return view('zoom.class-end');
    }

    public function index()
    {
        $online_classes = OnlineClasse::all();
        return view('dashboard.online_classes.index', compact('online_classes'));
    }

    public function createView()
    {
        $services = Service::all();
        $courses = Course::all();
        return view('dashboard.online_classes.create', compact('services', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'nullable',
            'course_id' => 'nullable',
            'topic' => 'required',
            'duration' => 'required',
            'start_at' => 'required',
        ]);

        $online_classe = OnlineClasse::create([
            'service_id' => $request->service_id,
            'course_id' => $request->course_id,
            'user_id' => auth()->user()->id,
            'topic' => $request->topic,
            'duration' => $request->duration,
            'start_at' => $request->start_at,
        ]);

        $this->createMeeting($request, $online_classe->id);

        return redirect()->route('dashboard.online_classes.index');
    }

    public function edit($id)
    {
        $online_classes = OnlineClasse::all();
        return view('dashboard.online_classes.index', compact('online_classes'));
    }

    public function destroy($id)
    {
        $online_classe = OnlineClasse::findOrFail($id);
        // dd($online_classe);
        try {
            $this->deleteZoomLink($online_classe->meeting_id);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $online_classe->delete();
        return redirect()->back();
    }
}
