<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

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
}
