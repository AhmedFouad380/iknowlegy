@extends('front.layout')
@section('title')
    {{__('lang.Cart')}}
@endsection
@section('css')
    <link  rel="stylesheet" href="{{asset('website/cart/style.css')}}">
@endsection
@section('content')
               <div class="header-img courses-img">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-12 container">
                            <div class="adress-head courses-pb">
                                <div class="typewriter courses-header">
                                    <h1 id="demo" data-value="{{__('lang.Cart')}}"> </h1>
                                    <!-- <h5 class="move-box">Learn From The Best Online Courses</h5> -->
                                </div>
                                <div class="search-box courses-search-box">
                                    <div class="move-box">
                                        <input type="text" placeholder=" {{__('lang.search')}}">
                                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  @include('front.socail')
                </div>
            </div>
            <!-- end header  -->

            <!-- this is cart page  -->
            <section class="color-cart">
                <section class="container">
                    <div class="top-cart">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-8">
                                <div class="left-cart" data-aos="fade-right">
                                    <h4 class="my-cart"> {{__('lang.Cart')}}</h4>
                                    <div class="seller space-cart">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <span class="span1-cart"></span>
                                                <span class="span2-cart">@if($data->count() > 0) {{$data->count()}} {{__('lang.item(s)')}} @else {{__('lang.Sorry Cart is Empty')}} @endif</span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-6">
{{--                                                <div class="text-right-cart">--}}
{{--                                                    <span class="span3-cart"> {}}</span>--}}
{{--                                                    <span class="span4-cart">  150 EGP</span>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <?php $totalprice = [];?>
                                    @foreach($data as $cart)

                                    <div class="cart-data space-cart">
                                         <div class="row">
                                             <div class="col-lg-8 col-md-8 col-8">
                                                  <div class="cart-data1">
                                                      <div class="img-cart">
                                                          <img src="{{$cart->Course->image}}">
                                                      </div>
                                                      <div class="details-cart">
                                                          <h5>{{$cart->Course->title}}</h5>
                                                          <h6>by<span  class="color-this-span">{{$cart->Course->Instructor->name}}</span></h6>
                                                      </div>
                                                  </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-4">
                                                <div class="cart-data2 text-right-cart">
                                                    @if($cart->Course->is_discount == 'active')
                                                    <span class="span5-cart">
                                                        <span class="bolder-price">{{$cart->Course->discount_price}}</span>
                                                         <span class="gray-color">EGP</span>
                                                    </span>
                                                    <span class="span6-cart gray-color"> {{$cart->Course->price}} EGP</span>
                                                    <span class="span7-cart remove-cart"  data-id="{{$cart->id}}">
                                                         <span class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                         <span class="gray-color"> {{__('lang.Delete')}}</span>
                                                    </span>
                                                    @else
                                                        <span class="span5-cart">
                                                        <span class="bolder-price">{{$cart->Course->price}}</span>
                                                         <span class="gray-color">EGP</span>
                                                    </span>
                                                        <span class="span6-cart gray-color"> </span>
                                                        <span class="span7-cart remove-cart"  data-id="{{$cart->id}}">
                                                         <span class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                         <span class="gray-color"> {{__('lang.Delete')}}</span>
                                                        </span>
                                                    @endif
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                        <?php
                                            if($cart->course->is_discount == 'active'){
                                                $totalprice[] = $cart->course->discount_price;
                                            }else{
                                                $totalprice[] = $cart->course->price;
                                            }
                                        ?>

                                    @endforeach

                                </div>
                            </div>
                            @if($data->count() > 0)
                            <div class="col-lg-3 col-md-3 col-3">
                                <div class="cart-box cart-data" data-aos="fade-left">
                                      <h6>{{__('lang.Order Summary')}}</h6>
                                      <div class="row">
                                          <div class="col-lg-6 col-md-6 col-6">

                                              <span class="span-8 gray-color"> {{__('lang.Sub Total')}}</span>
                                              @if(\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->count() > 0)
                                              <span class="span-8 gray-color"> {{__('lang.PromoCode')}}</span>
                                              @endif
                                              <span class="span-9 gray-color"> {{__('lang.total')}}</span>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-6 ">
                                            <div class="text-right-cart">
                                                <span class="span-10 gray-color"> {{array_sum($totalprice)}}  EGB</span>
                                                @if(\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->count() > 0)
                                                    @if(\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->type == 'cash')
                                                    <span class="span-10 red"> - {{\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->price}} EGB</span>
                                                    @else
                                                        <span class="span-10 red"> - {{\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->price}} % </span>

                                                    @endif
                                                        @if(\App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->type == 'cash')
                                                        <span class="span-11 gray-color">{{array_sum($totalprice) -  \App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->price}} EGB</span>
                                                        @else
                                                            <span class="span-11 gray-color">{{ array_sum($totalprice)  - ((array_sum($totalprice) *  \App\Models\PromoCodeRelation::where('user_id',Auth::guard('web')->id())->where('is_used','not_yet')->first()->Promo->price ) / 100)  }} EGB</span>
                                                        @endif
                                                @else
                                                    <span class="span-11 gray-color">{{array_sum($totalprice)}} EGB</span>
                                                @endif

                                            </div>
                                        </div>
                                      </div>
                                      <div class="cart-input1">
                                          <form action="{{url('active_promo_code')}}" method="post">
                                            @csrf
                                          <input type="text"  name="code" placeholder="{{__('lang.add promo code')}}">
                                          <button type="submit">{{__('lang.Apply')}}</button>
                                          </form>

                                      </div>

                                    <div id="main-card">
                                        <form action="" method="">
                                            <!--<section>-->
                                            <!--	<div><span>purchase free :</span><span>0.00</span></div>-->
                                            <!--	<div><span>total :</span><span>USD 49.00</span></div>-->
                                            <!--</section>-->
                                            <section>
                                                <div>
                                                    <p>Card Payments </p>
                                                    <img src="{{asset('website/cart/master.png')}}" width="40" alt="">
                                                    <img src="{{asset('/website/cart/visa.png')}}" width="40" alt="">
                                                    <input type="radio"  class="type" name="type" value="visa" style="    margin-right: 10px;">
                                                </div>
                                                <div>
                                                    <p>Mobile Wallet</p>
                                                    <img src="{{asset('website/cart/voda.png')}}" style="height: 25px; width: 25px" />
                                                    <img src="{{asset('website/cart/orange.png')}}" style="height: 25px; width: 25px" />
                                                    <img src="{{asset('website/cart/etisalat.png')}}" style="height: 25px; width: 25px" />
                                                    <img src="{{asset('website/cart/bank.png')}}" style="height: 20px; width: 20px" />
                                                    <input type="radio"  id="wallet" class="type" value="wallet"name="type">

                                                </div>
                                                <div id="div1" style="display:none">
                                                    <div class="form-group">
                                                        <label for="username">Mobile wallet number : </label>
                                                        <input class="form-control" type="text" maxlength="11" id="mobilewallet" name="mobilewallet" required="required" placeholder="Mobile wallet number" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <p>offline payment</p>
                                                    <input type="radio"  id="offlinePayment" value="offlinePayment" class="type" name="type">
                                                </div>
                                                    <div id="div2" style="display:none">
                                                        <p> Bank Name:
                                                            QNB ALAHLI <br>
                                                            Account Number
                                                            : 00193-20310600440
            <br>
                                                            IBAN
                                                            : EG890037019308182031060044060
<br>
                                                            Swift Code
                                                            : QNBAEGCXXXX
                                                            <br>
                                                            Please Send The Receipt To This Mail Offlinepayment@Iknowlegy.Com, So We Can Open The Course For You.
                                                        </p>
                                                    <div>
                                            </section>
                                        </form>
                                    </div>

                                    <div class="cart-button">
                                          <button id="PaymentCheckout" >
                                             {{__('lang.Buy Now')}}
                                          </button>
                                      </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </section>
            </section>
            <!-- this is footer -->

@endsection

@section('js')
    <script>
        $(".type").click(function(){
            if($(this).val() == "wallet")
            {
                document.getElementById('div1').style.display = "block";
                document.getElementById('div2').style.display = "none";

            }
            else  if($(this).val() == "offlinePayment")

            {
                document.getElementById('div2').style.display = "block";
                document.getElementById('div1').style.display = "none";
            }
            else{
                document.getElementById('div1').style.display = "none";
                document.getElementById('div2').style.display = "none";

            }

        });



    </script>
    <script>

        $("#PaymentCheckout").click(function(){
            var price=$(this).data('price')
            var coupon=$(this).data('coupon')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var type= $("input[name='type']:checked").val();
            if(type == 'visa'){
                $.ajax({
                    type: "get",
                    url: "{{url('paymobtest')}}",
                    data: {"price":price ,_token: CSRF_TOKEN ,"coupon":coupon},
                    success: function (data) {
                        $(".bs-edit-modal-lg .modal-body").html(data)
                        $(".bs-edit-modal-lg").modal('show')
                        $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                            //   $('.bs-edit-modal-lg').empty();
                            $('.bs-edit-modal-lg').hide();
                        })
                    }
                })
            }else if(type == 'wallet'){
                var price=$(this).data('price')
                var mobilewallet=$('#mobilewallet').val()
                $.ajax({
                    type: "get",
                    url: "{{url('paymobtest2')}}",
                    data: {"price":price ,_token: CSRF_TOKEN ,'type':type , "mobilewallet":mobilewallet  ,"coupon":coupon},
                    success: function (data) {
                        window.location.href = data;

                    }
                })
            }else if(type == 'offlinePayment'){
                var price=$(this).data('price')
                $.ajax({
                    type: "get",
                    url: "{{url('offlinePayment')}}",
                    data: {"price":price ,_token: CSRF_TOKEN ,'type':type  ,"coupon":coupon},
                    success: function (data) {
                        console.log(data);
                        $(".bs-edit-modal-lg2 .modal-body").html(data)
                        $(".bs-edit-modal-lg2").modal('show')
                        $(".bs-edit-modal-lg2").on('hidden.bs.modal',function (e){
                            //   $('.bs-edit-modal-lg').empty();
                            $('.bs-edit-modal-lg').hide();
                        })
                    }
                })
            }
        })

        $("#PaymentCheckout2").click(function(){
            var price=$(this).data('price')
            var mobilewallet=$(this).data('mobilewallet')
            var type=$(this).data('type')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "get",
                url: "{{url('paymobtest2')}}",
                data: {"price":price ,_token: CSRF_TOKEN ,'type':type , "mobilewallet":mobilewallet},
                success: function (data) {
                    console.log(data);
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })
    </script>

    @endsection
