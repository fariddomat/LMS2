<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class ContactFormController extends Controller
{

    public function index()
    {
        $contacts = ContactForm::latest()->paginate(50);
        return view('dashboard.contactForm.index', compact('contacts'));
    }

    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();
        session()->flash('success', 'Contact Us Deleted Successfully');
        return redirect()->route('dashboard.contactForm.index');
    }
    public function changeStatus(Request $request, ContactForm $contactForm)
    {
        $contactForm->read = 1; //done
        $contactForm->save();
        $response = [
            'status' => 1,
            'message' => 'Status Changed',
        ];
        return response()->json($response);
    }

    public function note(Request $request, ContactForm $contactForm)
    {
        $contactForm->note = $request->note; //done
        $contactForm->save();
        session()->flash('success', 'Contact Us Note Updated Successfully');
        return redirect()->back();
    }

    public function notify()
    {
        $users = User::all();
        return view('dashboard.contactForm.notify', compact('users'));
    }

    public function send_mail(Request $request)
    {
        $request->validate([
            'details' => 'required',
        ]);

        $users = null;
        if ($request->users[0] == null) {

            $users = User::all();
        } else {

            $users = User::whereIn('id', $request->users)->get();
        }
        foreach ($users as $key => $user) {
            $info = array(
                'name' => 'إشعار حجز جلسة لدى mellowminds ',
                'route' => route('home'),
                'details' => $request->details
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('إشعار بريد إلكتروني من mellowminds');
                $message->from('notify@mellowminds.co.uk', 'Mellowminds');
            });

            // echo "Successfully sent the email";
        }

        session()->flash('success', 'Email Sent Successfully');
        return redirect()->route('dashboard.contactForm.index');
    }
}
