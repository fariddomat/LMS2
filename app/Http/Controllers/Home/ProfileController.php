<?php

namespace App\Http\Controllers\Home;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if(!$user)
            abort(403);
        $profile=Profile::where('email', $user->email)->firstOrFail();
        return view('home.profile.show', compact('profile'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()){
            return redirect()->route('profiles.create');
        }
        return view('home.profile.create');
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
            'full_name'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required|email|unique:users,email,',
            'password'=> 'required|confirmed',
            'birth_date'=> 'required',
            'address'=> 'required',
            'type'=> 'required',
            'about'=> 'required',
            'why'=> 'required',
        ]);
        $request->merge(['password'=>bcrypt($request->password)]);
        $profile=Profile::create($request->except('password_confirmation'));


        $user = User::create([
            'name' => $profile->full_name,
            'email' => $profile->email,
            'password' => $profile->password,
        ]);

        $role=Role::where('name', $request->type)->firstOrFail();
        $user->attachRoles([$role->id]);
        session()->flash('success','تم رفع الطلب إلى إدارة الأكاديمية للمراجعة، دمتم بخير !');

        try {
            $info = array(
                'name' => 'إشعار إنشاء حساب جديد ',

                'route' => route('dashboard.profiles.index'),
                'details' => 'لديكم تسجيل طالب جديد في الاكاديمية اسم '.$user->name.' لباقي التفاصيل '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to('notify@holistichealth.sa', 'notify')
                    ->subject('تم إنشاء حساب جديد');
                $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
            });

        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();
        if(!$user)
            abort(403);
        $profile=Profile::where('email', $user->email)->firstOrFail();
        return view('home.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::findOrFail($id);
        return view('home.profile.edit', compact('profile'));
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
        $profile=Profile::findOrFail($id);
        $request->validate([
            'full_name'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required|email|unique:profiles,email,'. $id,
            'birth_date'=> 'required',
            'address'=> 'required',
            'type'=> 'required',
            'about'=> 'required',
            'why'=> 'required',
        ]);

        $user=User::where('email', $profile->email)->firstOrFail();
        $profile->update($request->all());

        $user->update([
            'name' => $profile->full_name,
            'email' => $profile->email,
        ]);

        $role=Role::where('name', $request->type)->firstOrFail();
        $user->syncRoles([$role->id]);
        session()->flash('success','تم التعديل بنجاح !');
        return redirect()->route('profiles.index');
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

    public function password()
    {
        return view('home.profile.password');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'oldpassword' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'nconfirm_password' => ['same:password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->back();
    }
}
