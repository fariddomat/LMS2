<?php

namespace App\Http\Controllers\Home;

use Mail;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Post;
use App\Models\About;
use App\Models\Enrollment;
use App\Models\Faq;
use App\Models\IntegrativeMedicine;
use App\Models\Lesson;
use App\Models\Service;
use App\Models\Trainer;
use App\Models\WhoIAm;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::where('published', true)->latest()->limit(3)->get();
        $about = About::firstOrFail();
        return view('home.index', compact('posts', 'about'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        ContactForm::create($request->all());
        try {
            $info = array(
                'name' => 'إشعار للتواصل ',

                'route' => route('dashboard.contactForm.index'),
                'details' => ' لديكم طلب تواصل معنا جديد من قبل '.$request->name.''
            );
            Mail::send('mail', $info, function ($message) use ($request) {
                $message->to('notify@holistichealth.sa', 'notify')
                    ->subject('إشعار تواصل معنا holistichealth.sa');
                $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
            });

            session()->flash('success', 'تم إشعار الإدارة بنجاح !');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('success', 'لم يتم إرسال الإشعار بنجاح !');
        }

        return redirect()->back();
    }

    public function contactPage()
    {
        return view('home.contact');
    }

    public function whoiam()
    {

        $about = About::firstOrFail();
        $whoiams = WhoIAm::all();
        return view('home.whoiam', compact('whoiams', 'about'));
    }
    public function integrativeMedicines()
    {
        $integrativeMedicines = IntegrativeMedicine::orderBy('created_at')->get();
        return view('home.integrativeMedicine', compact('integrativeMedicines'));
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('created_at', 'asc')->get();
        // dd($faqs);
        return view('home.faqs', compact('faqs'));
    }

    public function video($file)
    {
        $lesson = Lesson::findOrFail($file);
        $enrollment=Enrollment::where('course_id',$lesson->course_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $videoPath = $lesson->video_path;
        // Generate a unique token for each video request
        $headers = [
            'Content-Type' => 'video/mp4',
        ];

        return response()->file($videoPath, $headers);
    }
}
