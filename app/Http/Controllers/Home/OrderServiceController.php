<?php

namespace App\Http\Controllers\Home;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\OrderService;
use App\Models\PaymentService;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// require_once('../laravel_project/vendor/autoload.php');

class OrderServiceController extends Controller
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
        $service = Service::findOrFail($request->service_id);
        if ($service->price == 0) {
            return redirect()->back();
        }
        $user = Auth::user();
        if (!$user)
            abort(403);

        $order = OrderService::where('user_id', $user->id)->where('service_id', $service->id)->get();
        if ($order->count() > 0) {
            session()->flash('success', 'لقد طلبت هذه الخدمة مسبقا !');
            return redirect()->back();
        }
        session()->put('service_id', $request->service_id);

        $profile = Profile::where('email', $user->email)->firstOrFail();
         // return redirect()->route('enrollments.callback');
         $stripe = new \Stripe\StripeClient('sk_test_51LnVFkAKQSG9RjIjGFkDqFvDuW9mt3axN7bnovgWzlz78PgjAXk6ccQmRSJhSayQsnlq5BkvXBxr1h7palVJB72w00MWk9DaGu');
         $redirectUrl = 'https://mellowminds.co.uk/orderservices/tap-callback';

             $response =  $stripe->checkout->sessions->create([
                 'success_url' => $redirectUrl,
                 'customer_email' => $user->email,
                 'payment_method_types' => ['link', 'card'],
                 'line_items' => [
                     [
                         'price_data'  => [
                             'product_data' => [
                                 'name' => $service->title,
                             ],
                             'unit_amount'  => 100 * $service->price,
                             'currency'     => 'USD',
                         ],
                         'quantity'    => 1
                     ],
                 ],
                 'mode' => 'payment',
                 'allow_promotion_codes' => false
             ]);
         return redirect($response['url']);



    }

    public function callback(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);
        $service = Service::findOrFail(session('service_id'));




        PaymentService::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'amount' => $service->amount,
            'currency' => 'USD',
            'payment_gateway' => 'stripe',
            'transaction_id' => 1,
        ]);

        try {
            $user = Auth::user();
            $info = array(
                'name' => 'إلى ' . $user->name,

                'route' => route('profiles.index'),
                'details' => 'شكرا لكم لطلبكم خدمة ' . $service->title . '
                    سيتم التواصل معكم قريبا جداً لتحديد موعد للخدمة المطلوبة'
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('تم طلب الخدمة بنجاح لدى mellowminds.co.uk');
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
                'name' => 'إشعار عملية طلب خدمة ',

                'route' => route('dashboard.orderservices.index'),
                'details' => ' تم شراء خدمة  ' . $service->title . ' طلب رقم ' . $order->id . ' لصاحبه ' . $user->name . ' لباقي التفاصيل '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to('notify@mellowminds.co.uk', 'notify')
                    ->subject('تم طلب خدمة جديدة');
                $message->from('notify@mellowminds.co.uk', 'Mellowminds');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('services.show', $service->title)->with('success', 'Payment Successfully Made.');
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
            'service_id' => 'required',
        ]);

        OrderService::firstOrCreate([
            'service_id' => $request->service_id,
            'user_id' => auth()->id(),
        ]);


        session()->flash('success', 'تم الاشتراك بالخدمة بنجاح');
        return redirect()->route('profiles.index');
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
