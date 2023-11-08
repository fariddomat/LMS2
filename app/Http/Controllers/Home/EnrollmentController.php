<?php

namespace App\Http\Controllers\Home;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
// require_once('../laravel_project/vendor/autoload.php');

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if (!$user)
            abort(403);

        // dd($user->email);
        $course = Course::findOrFail($request->course_id);

        session()->put('course_id', $request->course_id);
        $enrollment = Enrollment::where('user_id', auth()->id())
            ->where('course_id', $request->course_id)->get();
        if ($enrollment->count() > 0) {
            session()->flash('success', 'لقد طلبت قمت بشراء هذه الدورة مسبقا !');
            return redirect()->back();
        }
        // return redirect()->route('enrollments.callback');
        $stripe = new \Stripe\StripeClient('sk_test_51LnVFkAKQSG9RjIjGFkDqFvDuW9mt3axN7bnovgWzlz78PgjAXk6ccQmRSJhSayQsnlq5BkvXBxr1h7palVJB72w00MWk9DaGu');
        $redirectUrl = 'https://mellowminds.co.uk/enrollments/tap-callback?session_id={CHECKOUT_SESSION_ID}';

            $response =  $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'customer_email' => $user->email,
                'payment_method_types' => ['link', 'card'],
                'line_items' => [
                    [
                        'price_data'  => [
                            'product_data' => [
                                'name' => $course->title,
                            ],
                            'unit_amount'  => 100 * $course->price,
                            'currency'     => 'USD',
                        ],
                        'quantity'    => 1
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => true
            ]);
        return redirect($response['url']);

    }

    public function stripeCheckout(Request $request)

    {
    }
    public function stripeCheckoutSuccess(Request $request)
    {
    }

    public function callback(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);


        $course = Course::findOrFail(session('course_id'));
        $enrollment = Enrollment::firstOrCreate([
            'user_id' => auth()->id(),
            'course_id' => $course->id
        ]);

        Payment::create([
            'enrollment_id' => $enrollment->id,
            'amount' => $course->price,
            'currency' => 'USD',
            'payment_gateway' => 'Stripe',
            'transaction_id' => '1',
        ]);
        try {
            $user = Auth::user();
            $info = array(
                'name' => 'إلى ' . $user->name,

                'route' => route('profiles.index'),
                'details' => 'شكرا لانضمامكم لأكاديمية هوليستك لقد تم تأكيد سدادكم يمكنكم تسجيل الدخول و متابعة الدورة على موقعنا من خلال حسابكم في الاكاديمية '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('تم الانضمام للأكاديمية بنجاح لدى mellowminds.co.uk');
                $message->from('notify@mellowminds.co.uk', 'Mellowminds');
            });

            session()->flash('success', 'تم إرسال الإيميل بنجاح !');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('success', 'لم يتم إرسال الإيميل بنجاح !');
        }
        try {
            $user = Auth::user();
            $info = array(
                'name' => 'إشعار عملية شراء دورة ',

                'route' => route('dashboard.enrollments.index'),
                'details' => ' تم شراء دورة من قبل ' . $user->name . ' لباقي التفاصيل '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to('notify@mellowminds.co.uk', 'notify')
                    ->subject('تم شراء دورة');
                $message->from('notify@mellowminds.co.uk', 'Mellowminds');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
        session()->flash('success', 'لقد تمت عملية شراء الدورة بنجاح !');
        return redirect()->route('courses.show', $course->title)->with('success', 'Payment Successfully Made.');
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
}
