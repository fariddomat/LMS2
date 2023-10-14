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

require_once('../laravel_project/vendor/autoload.php');

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
        $service=Service::findOrFail($request->service_id);
        if($service->price==0){
            return redirect()->back();
        }
        $user = Auth::user();
        if(!$user)
            abort(403);

        $order=OrderService::where('user_id', $user->id)->where('service_id',$service->id)->get();
        if($order->count() > 0){
            session()->flash('success','لقد طلبت هذه الخدمة مسبقا !');
            return redirect()->back();
        }
        $profile = Profile::where('email', $user->email)->firstOrFail();
        // if ($profile->status != 'active') {
        //     return redirect()->route('profiles.index');
        // }

        $phoneNumber = $profile->mobile; // Replace with your phone number variable

        // Remove the '+' or '00' prefix
        $phoneNumber = preg_replace('/^\+|^00/', '', $phoneNumber);

        // Extract the country code and number
        $countryCode = '';
        $number = '';

        if (preg_match('/^\d{1,3}/', $phoneNumber, $matches)) {
            $countryCode = $matches[0];
            $number = substr($phoneNumber, strlen($countryCode));
        }

        // // Output the results
        // echo 'Country Code: ' . $countryCode . PHP_EOL;
        // echo 'Number: ' . $number . PHP_EOL;
        // dd('stop');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
            'body' => '{
                "amount":'.$service->price.',
                "currency":"SAR",
                "customer_initiated":true,
                "threeDSecure":true,
                "save_card":false,
                "description":"Register",
                "metadata":{"udf1":"Metadata 1"},
                "reference":{
                    "transaction":"txn_01",
                    "order":"'.$request->service_id.'"
                },
                "receipt":{"email":true,"sms":true},
                "customer":{
                    "first_name":"' . $profile->full_name . '",
                    "email":"' . $profile->email . '",
                    "phone":{
                        "country_code":"' . $countryCode . '",
                        "number":"' . $number . '"
                    }
                },
                    "source":{"id":"src_all"},
                    "post":{"url":"https://holistichealth.sa/orderservices/create"},
                    "redirect":{"url":"https://holistichealth.sa/orderservices/tap-callback/'.$request->service_id.'"}}',

            'headers' => [
                'Authorization' => 'Bearer sk_test_lXMKocjxUQt0Z3hORNarzI4B',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $response = json_decode($response->getBody());
        // dd($response->transaction->url);
        return redirect($response->transaction->url);
    }

    public function callback(Request $request, $id)
    {

        $service=Service::findOrFail($id);

        $input = $request->all();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges/" . $input['tap_id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_lXMKocjxUQt0Z3hORNarzI4B" // SECRET API KEY
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $responseTap = json_decode($response);
        if ($responseTap->status == 'CAPTURED') {
            $order=OrderService::firstOrCreate([
                'service_id' => $id,
                'user_id' => auth()->id(),
            ]);


            PaymentService::create([
                'user_id'=>auth()->id(),
                'service_id'=>$id,
                'amount'=>$responseTap->amount,
                'currency'=>$responseTap->currency,
                'payment_gateway'=>'Tap',
                'transaction_id'=>$responseTap->id,
            ]);

            try {
                $user=Auth::user();
                $info = array(
                    'name' => 'إلى ' . $user->name,

                    'route' => route('profiles.index'),
                    'details' => 'شكرا لكم لطلبكم خدمة '.$service->title.'،
                     طلبكم رقم '.$order->id.' سيتم التواصل معكم قريبا جداً لتحديد موعد للخدمة المطلوبة'
                );
                Mail::send('mail', $info, function ($message) use ($user) {
                    $message->to($user->email, $user->name)
                        ->subject('تم طلب الخدمة بنجاح لدى holistichealth.sa');
                    $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
                });

                session()->flash('success', 'تم إرسال الإيميل بنجاح !');
            } catch (\Throwable $th) {
                //throw $th;
                session()->flash('success', 'لم يتم إرسال الإيميل بنجاح !');
            }

            try {
                $user=Auth::user();
                $info = array(
                    'name' => 'إشعار عملية طلب خدمة ',

                    'route' => route('dashboard.orderservices.index'),
                    'details' => ' تم شراء خدمة  '.$service->title.' طلب رقم '.$order->id.' لصاحبه '.$user->name.' لباقي التفاصيل '
                );
                Mail::send('mail', $info, function ($message) use ($user) {
                    $message->to('notify@holistichealth.sa', 'notify')
                        ->subject('تم طلب خدمة جديدة');
                    $message->from('notify@holistichealth.sa', ' Holistic Wellness - العافية الشمولية');
                });

            } catch (\Throwable $th) {
                //throw $th;
            }
            return redirect()->route('services.show', $service->title)->with('success', 'Payment Successfully Made.');
        }

        return redirect()->route('services.show', $service->title)->with('error', 'Something Went Wrong.');
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
