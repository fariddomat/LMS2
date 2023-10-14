<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        $roles=Role::whereRoleNot(['superadministrator'])->get();

        $users=User::whereRoleNot(['superadministrator'])
            ->whenSearch(request()->search)
            ->whenRole(request()->role_id)
            ->with('roles')
            ->paginate(40);
        return view('dashboard.users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::whereRoleNot(['superadministrator'])->get();
        return view('dashboard.users.create',compact('roles'));

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
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
            'role_id'=>'required|numeric',
        ]);
        $request->merge(['password'=>bcrypt($request->password)]);
        $user=User::create($request->all());
        $user->attachRoles([$request->role_id]);
        session()->flash('success','تم الحفظ بنجاح !');
        return redirect()->route('dashboard.users.index');
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
        $roles=Role::whereRoleNot(['superadministrator'])->get();

        $user=User::find($id);
        return view('dashboard.users.edit',compact('roles','user'));

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
            'name'=>'required',
            'email'=>'required|email|unique:users,email,' . $id,
            'role_id'=>'required|numeric',
            'password' =>'sometimes|confirmed'
        ]);
        $user=User::find($id);
        $profile=Profile::where('email', $user->email)->firstOrFail();
        $user->update($request->except('password','password_confirmation'));
        if($request->password != ''){
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }
        $profile->update([
            'email'=> $user->email,
            'password' => $user->password
        ]);
        $user->syncRoles([$request->role_id]);

        session()->flash('success','تم التعديل بنجاح !');
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        session()->flash('success','تم الحذف بنجاح !');
        return redirect()->route('dashboard.users.index');
    }

    public function ban($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update([
                'status'=>'ban'
            ]);
            session()->flash('success','تم الحظر بنجاح !');
            return redirect()->route('dashboard.users.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function unban($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update([
                'status'=>'active'
            ]);

            session()->flash('success','تم إلغاء الحظر بنجاح !');
            return redirect()->route('dashboard.users.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
