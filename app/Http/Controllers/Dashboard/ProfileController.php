<?php

namespace App\Http\Controllers\Dashboard;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {

        $profiles = Profile::whenSearch(request()->search)->orderBy('created_at')
            ->paginate(40);
        return view('dashboard.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profiles.create');
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
            'full_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|confirmed',
            'birth_date' => 'required',
            'address' => 'required',
            'type' => 'required',
            'about' => 'required',
            'why' => 'required',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $profile = Profile::create($request->except('password_confirmation'));


        $user = User::create([
            'name' => $profile->full_name,
            'email' => $profile->email,
            'password' => $profile->password,
        ]);

        $role = Role::where('name', $request->type)->firstOrFail();
        $user->attachRoles([$role->id]);
        session()->flash('success', 'تم الحفظ بنجاح !');
        return redirect()->route('dashboard.profiles.index');
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
        $profile = Profile::find($id);
        return view('dashboard.profiles.edit', compact('profile'));
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
            'full_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:profiles,email,' . $id,
            'birth_date' => 'required',
            'address' => 'required',
            'type' => 'required',
            'about' => 'required',
            'why' => 'required',
        ]);
        $profile = Profile::find($id);

        $user = User::where('email', $profile->email)->firstOrFail();
        $profile->update($request->all());

        $user->update([
            'name' => $profile->full_name,
            'email' => $profile->email,
        ]);

        $role = Role::where('name', $request->type)->firstOrFail();
        $user->syncRoles([$role->id]);

        session()->flash('success', 'تم التعديل بنجاح !');
        return redirect()->route('dashboard.profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        $user = User::where('email', $profile->email)->firstOrFail();
        $profile->delete();
        $user->delete();
        session()->flash('success', 'تم الحذف بنجاح !');
        return redirect()->route('dashboard.profiles.index');
    }

    public function reject($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            if ($profile->status == 'paid') {

                $profile->update([
                    'status' => 'paid_reject'
                ]);
            } else {

                $profile->update([
                    'status' => 'reject'
                ]);
            }
            $user = User::where('email', $profile->email)->first();
            $user->update([
                'status' => 'ban'
            ]);
            session()->flash('success', 'تم إلغاء التفعيل بنجاح !');
            return redirect()->route('dashboard.profiles.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function active($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            if ($profile->status == 'paid_reject') {

                $profile->update([
                    'status' => 'reject'
                ]);
            } else {
                $profile->update([
                    'status' => 'active'
                ]);

                $user = User::where('email', $profile->email)->first();
                $user->update([
                    'status' => 'active'
                ]);
            }
            try {
                $info = array(
                    'name' => 'إلى ' . $user->name,

                    'route' => route('courses.index'),
                    'details' => 'شكرا لكم عزيزي الطالب لقد تم تفعيل حسابكم في الاكاديمية بنجاح يمكنك الآن تسجيل الدخول للاشتراك بالدورة بكل سهولة '
                );
                Mail::send('mail', $info, function ($message) use ($user) {
                    $message->to($user->email, $user->name)
                        ->subject('تم تفعيل حسابك بنجاح لدى holistichealth.sa');
                    $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
                });

                session()->flash('success', 'تم إرسال الإيميل بنجاح !');
            } catch (\Throwable $th) {
                //throw $th;
                session()->flash('success', 'لم يتم إرسال الإيميل بنجاح !');
            }
            session()->flash('success', 'تم تفعيل الحساب بنجاح !');
            return redirect()->route('dashboard.profiles.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function paid($id)
    {
        $profile = Profile::find($id);
        if ($profile) {
            $profile->update([
                'status' => 'paid'
            ]);
            session()->flash('success', 'تم تسديد الدفعات بنجاح !');
            return redirect()->route('dashboard.profiles.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
