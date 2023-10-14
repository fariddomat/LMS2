<?php

namespace App\Http\Controllers;

require_once('../vendor/autoload.php');

use Illuminate\Http\Request;

class TapController extends Controller
{

    public function form()
    {
        return view('tap-payment');
    }

    public function payment(Request $request)
    {

        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
            'body' => '{
                "amount":1,
                "currency":"SAR",
                "customer_initiated":true,
                "threeDSecure":true,
                "save_card":false,
                "description":"Register Student",
                "metadata":{"udf1":"Metadata 1"},
                "reference":{"transaction":"txn_01","order":"ord_01"},
                "receipt":{"email":true,"sms":true},
                "customer":{
                    "first_name":"test",
                    "middle_name":"test",
                    "last_name":"test",
                    "email":"test@test.com",
                    "phone":{"country_code":965,"number":51234567}},
                    "source":{"id":"src_all"},
                    "post":{"url":"https://holistichealth.sa/tap-payment"},
                    "redirect":{"url":"https://holistichealth.sa/tap-callback"}}',
            'headers' => [
                'Authorization' => 'Bearer sk_test_Bp25K4oXYmUSvie8NC3OMF1H',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $response = json_decode($response->getBody());
        // dd($response->transaction->url);
        return redirect($response->transaction->url);
    }

    public function callback(Request $request)
    {
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
                "authorization: Bearer sk_test_Bp25K4oXYmUSvie8NC3OMF1H" // SECRET API KEY
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $responseTap = json_decode($response);
        if ($responseTap->status == 'CAPTURED') {

            // dd($responseTap->customer->email);
            return redirect()->route('tap.form')->with('success', 'Payment Successfully Made.');
        }

        return redirect()->route('tap.form')->with('error', 'Something Went Wrong.');
    }
}
