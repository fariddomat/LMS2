<?php

namespace App\Http\Controllers\Home;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Enrollment;
use App\Models\OrderMaterial;
use App\Models\Payment;
use App\Models\PaymentMaterial;
use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class MaterialController extends Controller
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
        $material = Material::findOrFail($request->material_id);

        session()->put('material_id', $request->material_id);
        $order_material = OrderMaterial::where('user_id', auth()->id())
            ->where('material_id', $request->material_id)->get();
        if ($order_material->count() > 0) {
            session()->flash('success', 'لقد طلبت قمت بشراء هذه المادة مسبقا !');
            return redirect()->to( asset('materials/' . $material->file) );

        }
        // return redirect()->route('enrollments.callback');
        $stripe = new \Stripe\StripeClient('sk_test_51LnVFkAKQSG9RjIjGFkDqFvDuW9mt3axN7bnovgWzlz78PgjAXk6ccQmRSJhSayQsnlq5BkvXBxr1h7palVJB72w00MWk9DaGu');
        $redirectUrl = 'https://mellowminds.co.uk/materials/tap-callback?session_id={CHECKOUT_SESSION_ID}';

            $response =  $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'customer_email' => $user->email,
                'payment_method_types' => ['link', 'card'],
                'line_items' => [
                    [
                        'price_data'  => [
                            'product_data' => [
                                'name' => $material->name,
                            ],
                            'unit_amount'  => 100 * $material->price,
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


        $material = Material::findOrFail(session('material_id'));
        $order_material = OrderMaterial::firstOrCreate([
            'user_id' => auth()->id(),
            'material_id' => $material->id
        ]);

        PaymentMaterial::create([
            'user_id' => auth()->id(),
            'material_id' => $material->id,
            'amount' => $material->price,
            'currency' => 'USD',
            'payment_gateway' => 'Stripe',
            'transaction_id' => '1',
        ]);
        try {
            $user = Auth::user();
            $info = array(
                'name' => 'إشعار عملية شراء materials ',

                'route' => route('dashboard.enrollments.index'),
                'details' => ' تم شراء materials من قبل ' . $user->name . ' لباقي التفاصيل '
            );
            Mail::send('mail', $info, function ($message) use ($user) {
                $message->to('notify@mellowminds.co.uk', 'notify')
                    ->subject('تم شراء materials');
                $message->from('notify@mellowminds.co.uk', 'Mellowminds');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
        session()->flash('success', 'لقد تمت عملية شراء materials بنجاح !');
        return redirect()->to( asset('materials/' . $material->file) );
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
