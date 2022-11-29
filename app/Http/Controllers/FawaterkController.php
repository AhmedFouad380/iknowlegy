<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FawaterkController extends Controller
{
    public function test(){
        print_r('a');die();
        // prepare the data in the correct format.
        return view('front.checkout');

    }

    public function Checkout(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fawaterkstage.com/api/v2/createInvoiceLink',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
    "cartTotal": "50",
    "currency": "EGP",
    "customer": {
        "first_name": "mohammad",
        "last_name": "hamza",
        "email": "test@fawaterk.com",
        "phone": "011252523655",
        "address": "test address"
    },
    "redirectionUrls": {
         "successUrl" : "https://dev.fawaterk.com/success",
         "failUrl": "https://dev.fawaterk.com/fail",
         "pendingUrl": "https://dev.fawaterk.com/pending"
    },
    "cartItems": [
        {
            "name": "this is test oop 112252",
            "price": "25",
            "quantity": "1"
        },
        {
            "name": "this is test oop 112252",
            "price": "25",
            "quantity": "1"
        }
    ]
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer d83a5d07aaeb8442dcbe259e6dae80a3f2e21a3a581e1a5acd'
            ),
        ));
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        if($response->status == 'success'){
            print_r($response->data->url);die();
        }else{
            print_r($response);die();
        }
        // prepare the data in the correct format.
       return view('front.checkout');

    }
}
