@extends('front.layout')
@section('content')

    <div id="fawaterkDivId"></div>

@endsection

@section('js')
    <script src="https://app.fawaterk.com/fawaterkPlugin/fawaterkPlugin.min.js"></script>
<script>
    var pluginConfig = {
        envType: "test",
        token: "162f82c60e01f0ae0c0602510423a3884a5f9da3c609ee39db",
        requestBody: {
            "cartTotal": "50",
            "currency": "EGP",
            "customer": {
                "first_name": "test",
                "last_name": "fawaterk",
                "email": "test@fawaterk.com",
                "phone": "0123456789",
                "address": "test address"
            },
            "redirectionUrls": {
                "successUrl": "https://dev.fawaterk.com/success",
                "failUrl": "https://dev.fawaterk.com/fail",
                "pendingUrl": "https://dev.fawaterk.com/pending"
            },
            "cartItems": [{
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
        }
    };
    fawaterkCheckout(pluginConfig);

</script>
@endsection
