<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Affiliate;
use App\Model\AdminEarning;
use App\Model\AffiliateHistory;
use App\Model\Cart;
use App\Model\Course;
use App\Model\CoursePurchaseHistory;
use App\Model\Enrollment;
use App\Model\Instructor;
use App\Model\InstructorEarning;
use App\Model\Package;
use App\Model\PackagePurchaseHistory;
use App\Model\VerifyUser;
use App\Model\Wishlist;
use App\Notifications\AffiliateCommission;
use App\Notifications\EnrolmentCourse;
use App\SubscriptionCart;
use App\SubscriptionEnrollment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\PayMob;
use App\User;
use App\Model\Order;
use App\Model\OrderDetails;
use Auth;
use App\NotificationUser;
use App\PayMobWallet;
use App\Mail\VerifyMail;
use App\Notifications\InstructorRegister;
use App\Notifications\VerifyNotifications;
class PayMobController extends Controller
{

    public function paymobInstractor(Request $request)
    {
        $Order = new Order;
        $Order->user_id=$request->id;
        $Order->type=2;
        $Order->save();

        $user = User::find($request->id);

        $auth = PayMob::authPaymob();

        PayMob::sample('authPaymob');

        $paymobOrder = PayMob::makeOrderPaymob(
            $request->price * 100, // total amount by cents/piasters.
            $Order->id
        // your (merchant) order id.
        );


        $Order->paymob_order_id=$paymobOrder->id;
        $Order->save();

        PayMob::sample('makeOrderPaymob');



        $paymentKey = PayMob::getPaymentKeyPaymob(
            $request->price * 100, // total amount by cents/piasters.
            $paymobOrder->id, // paymob order id from step 2.
            // For billing data
            $user->email, // optional
            $user->name, // optional
            'Instructor', // optional
            $user->phone // optional
        );

        PayMob::sample('getPaymentKeyPaymob');


        $token = $paymentKey->token;
        return view('paymob',compact('token'));

    }

    public function index(Request $request)
    {

        $Order = new Order;
        $Order->user_id=Auth::guard('web')->id;
         if(isset($request->coupon)){
             $Order->promo_id=$request->coupon;

        }
         $Order->total_price=$request->price;
        $Order->pay_type='visa';
        $Order->is_payed='in_progress';
        $Order->save();

        $carts = Cart::where('user_id', Auth::guard('web')->id())->get();

        foreach($carts as $cart){

            $data = new OrderDetails();
            $data->order_id=$Order->id;
            $data->user_id=$cart->user_id;
            $data->course_id=$cart->course_id;
            $data->price=$cart->Course->price;
            $data->name=$cart->Course->name;
            $data->save();


        }

        $PayMob = new PayMob();

        $auth = $PayMob->authPaymob();

        $PayMob->sample('authPaymob');
        $user = User::find(Auth::guard('web')->id());
        $price = $request->price * 100 ;
        $paymobOrder = $PayMob->makeOrderPaymob(
            (int)$price, // total amount by cents/piasters.
            $Order->id
            // your (merchant) order id.
        );
        $Order->paymob_order_id=$paymobOrder->id;
        $Order->save();

        $PayMob->sample('makeOrderPaymob');



        $paymentKey = $PayMob->getPaymentKeyPaymob(

            (int)$price, // total amount by cents/piasters.
            $paymobOrder->id, // paymob order id from step 2.
            // For billing data
            $user->email, // optional
            $user->name, // optional
            '..', // optional
            $user->phone, // optional
            '129480',
                        'egypt', // optional
            'cairo' // optional

        );

        $PayMob->sample('getPaymentKeyPaymob');

        $token = $paymentKey->token;
                Cart::where('user_id', Auth::guard('web')->id())->delete();

        return view('paymob',compact('token'));

    }


    public function offlinePayment(Request $request)
    {
        $Order = new Order;
        $Order->user_id=Auth::id();
        $Order->pay_type='offline';
        if(isset($request->coupon)){
                    $Order->coupon=$request->coupon;

        }
        $Order->total_price=$request->price;
        $Order->save();

        $carts = Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();

            foreach($carts as $cart){
            $data = new OrderDetails();
            $data->order_id=$Order->id;
            $data->user_id=$cart->user_id;
            $data->course_id=$cart->course_id;
            $data->save();


        }


                Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->delete();

        $Message = 'Your order id is ' .$Order->id;

        return $Message;

    }


        public function index2(Request $request)
    {
        $Order = new Order;
        $Order->user_id=Auth::id();
        $Order->type=1;
             if(isset($request->coupon)){
                    $Order->coupon=$request->coupon;

        }
        $Order->save();

        $carts = Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();

        foreach($carts as $cart){
            $data = new OrderDetails();
            $data->order_id=$Order->id;
            $data->user_id=$cart->user_id;
            $data->course_id=$cart->course_id;
            $data->save();


        }
        $PayMob = new PayMob();

        $auth = $PayMob->authPaymob();

        $PayMob->sample('authPaymob');
        $user = User::find(\Illuminate\Support\Facades\Auth::id());
            $price = $request->price * 100 ;
        $paymobOrder = $PayMob->makeOrderPaymob(
            (int)$price, // total amount by cents/piasters.
            $Order->id
            // your (merchant) order id.
        );

        $Order->paymob_order_id=$paymobOrder->id;
        $Order->save();

         $PayMob->sample('makeOrderPaymob');


                $paymentKey =  $PayMob->getPaymentKeyPaymob(
            (int)$price, // total amount by cents/piasters.
            $paymobOrder->id, // paymob order id from step 2.
            // For billing data
            $user->email, // optional
            $user->name, // optional
            '..', // optional
            $request->mobilewallet, // optional
             '129478',
            'egypt', // optional
            'cairo' // optional

        );

         $PayMob->sample('getPaymentKeyPaymob');
         $token = $paymentKey->token;

                    $makePayment = $this->makePaymentWallet($token, $request->mobilewallet);
                                   Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->delete();
                    return $makePayment->iframe_redirection_url;


    }

    public function index3(Request $request)
    {
        $Order = new Order;
        $Order->user_id=Auth::id();
        $Order->type=1;
        $Order->save();

        $carts = Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();

        foreach($carts as $cart){
            $data = new OrderDetails();
            $data->order_id=$Order->id;
            $data->user_id=$cart->user_id;
            $data->course_id=$cart->course_id;
            $data->save();


        }


        $auth = PayMob::authPaymob();

        PayMob::sample('authPaymob');
        $user = User::find(\Illuminate\Support\Facades\Auth::id());
        $price = $request->price * 100 ;

        $paymobOrder = PayMob::makeOrderPaymob(
            (int)$price, // total amount by cents/piasters.
            $Order->id
        // your (merchant) order id.
        );


            $Order->paymob_order_id=$paymobOrder->id;
        $Order->save();

        PayMob::sample('makeOrderPaymob');




            $token = $paymentKey->token;
            $makePayment = PayMob::makePaymentWallet($token, $user->mobilewallet);

            return response($makePayment);
        Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->delete();


    }

    public function getOrderStatus(Request $request)
    {
        if ($request->success == 'true') {
            $Order = Order::where('paymob_order_id',$request->order)->first();

            if($Order->type == 1){
            $OrderDetails = OrderDetails::where('order_id',$Order->id)->get();


                foreach ($OrderDetails as $cart) {
        $amount = 0;

                    /*if this course in wishlist delete it*/
                    Wishlist::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('course_id', $cart->course_id)->delete();

                    //todo::there are calculate the Instructor balance Calculate the admin or Instructor commission
                    $course = Course::findOrFail($cart->course_id); //get course
                    $instructor = Instructor::where('user_id', $course->user_id)->first(); //get instructor
                    $package = Package::findOrFail($instructor->package_id);//get instructor package commission
                    $admin_get = 0;
                    $instructor_get = 0;
                    if($Order->coupon != null){
                         if ($course->price != 0 && $course->price != null ) {
                        if($course->is_discount == 0 && $Order->coupon == null ){
                            $admin_get = ($course->price * $package->commission) / 100; //$admin commission
                            $instructor_get = ($course->price - $admin_get); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->price * commission()) / 100; //
                         }else if($course->is_discount == 0 & isset($Order->coupon)){

                            $admin_get1 = ($course->price * $package->commission) / 100; //$admin commission
                            $admin_get = $admin_get1  - couponDiscountPrice($Order->coupon);
                            $instructor_get = ($course->price - $admin_get1); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->price * commission()) / 100; //
                            $Order->coupon=null;
                            $Order->save();
                        }elseif ($course->is_discount != 0 & isset($Order->coupon)){
                            $admin_get1 = ($course->price * $package->commission) / 100; //$admin commission
                            $admin_get = $admin_get1  - couponDiscountPrice($Order->coupon);
                            $instructor_get = ($course->discount_price - $admin_get1); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->price * commission()) / 100; //
                            $Order->coupon=null;
                            $Order->save();
                        }else{
                            $admin_get = ($course->discount_price * $package->commission) / 100; //$admin commission
                            $instructor_get = ($course->discount_price - $admin_get); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->discount_price * commission()) / 100; //

                            // $admin_get = ($course->price * $package->commission) / 100; //$admin commission
                            // $instructor_get = ($course->discount_price - $admin_get); //instructor amount
                            // /*todo::refer calculate*/
                            // $amount += ($course->discount_price * commission()) / 100; //

                        }
                    }
                    }else{
                    if ($course->price != 0 && $course->price != null ) {
                        if($course->is_discount == 0 ){
                            $admin_get = ($course->price * $package->commission) / 100; //$admin commission
                            $instructor_get = ($course->price - $admin_get); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->price * commission()) / 100; //
                        }else{
                            $admin_get = ($course->price * $package->commission) / 100; //$admin commission
                            $instructor_get = ($course->discount_price - $admin_get); //instructor amount
                            /*todo::refer calculate*/
                            $amount += ($course->price * commission()) / 100; //

                            // $admin_get = ($course->price * $package->commission) / 100; //$admin commission
                            // $instructor_get = ($course->discount_price - $admin_get); //instructor amount
                            // /*todo::refer calculate*/
                            // $amount += ($course->discount_price * commission()) / 100; //

                        }
                    }
                    }
                    //admin earning
                    //Todo::Admin Earning calculation
                    $admin = new AdminEarning();
                    $admin->amount = $admin_get;
                    $admin->purposes = "Commission from enrolment";
                    $admin->save();

                    //save in enrolments table
                    $enrollment = new Enrollment();
                    $enrollment->user_id = $cart->user_id; //this is student id
                    $enrollment->course_id = $cart->course_id;
                    $enrollment->save();

                    // student get notification
                    $details = [
                        'body' => translate('You enrolled new course  ' . $course->title),
                    ];
                    $this->userNotify($enrollment->user_id, $details);


                    // instructor get notification
                    $details = [
                        'body' => translate($course->title . ' this course enrolled by New student' ),
                    ];
                    $this->userNotify($course->user_id, $details);

                    //todo::Instructor Earning history
                    //instructor Earning
                    $instructorEarning = new InstructorEarning();
                    $instructorEarning->enrollment_id = $enrollment->id;
                    $instructorEarning->package_id = $package->id;
                    $instructorEarning->user_id = $instructor->user_id; //instructor user_id
                    $instructorEarning->course_price = $course->price == null ? 0 : $course->price;
                    $instructorEarning->will_get = $instructor_get;
                    $instructorEarning->save();

                    //todo::update the instructor balance
                    $instructor->balance += $instructor_get;
                    $instructor->save();

                    //save in purchase history
                    $history = new CoursePurchaseHistory();
                    $history->enrollment_id = $enrollment->id;
                    $history->amount = $course->price == null ? 0 : $course->price;
                    $history->payment_method = $request->session()->get('payment'); //todo::must be change here
                    $history->save();


                    //todo::mail Admin, Instructor, Student
                    try {
                        //teacher
                        $user = User::find($instructorEarning->user_id);
                        $user->notify(new EnrolmentCourse());
                        //student
                        $user = User::find($enrollment->user_id);
                        $user->notify(new EnrolmentCourse());

                    } catch (\Exception $exception) {
                    }

                    //delete from cart
                    $cart->delete();


                }

                /*todo::affiliate commission calculate*/
                $req = $request->cookie('ref');
                if ($req != null && affiliateStatus()) {
                    $affiliate = Affiliate::where('refer_id', $req)->first();
                    $affiliate->balance += $amount;
                    $affiliate->save();

                    /*save affiliate history*/
                    $history = new AffiliateHistory();
                    $history->affiliate_id = $affiliate->id;
                    $history->user_id = \Illuminate\Support\Facades\Auth::id();
                    $history->refer_id = $req;
                    $history->amount = $amount;
                    $history->save();

                    /*send affiliate commission*/
                    try {
                        $user = User::where('id', $affiliate->user_id)->first();
                        $user->notify(new AffiliateCommission());
                    }catch (\Exception $exception){}
                }


            /*empty the session*/
            $request->session()->forget('payment');
                  session()->forget(['coupon']);

            Session::flash('message', translate('Congratulations, Your enrollment is done successfully.'));
            }else{
                $Instractor =  Instructor::where('user_id',$Order->user_id)->first();
                $package = Package::find($Instractor->package_id);
                //add purchase history
                $purchase = new PackagePurchaseHistory();
                $purchase->amount = $package->price;
                $purchase->payment_method = "PayMob";
                $purchase->package_id = $package->id;
                $purchase->user_id = $Order->user_id;
                $purchase->save();


                //todo::admin Earning calculation
                $admin = new AdminEarning();
                $admin->amount = $package->price;
                $admin->purposes = "Sale Package";
                $admin->save();

                try {
                    $user = User::find($Order->user_id);
                    $user->notify(new InstructorRegister());
                    //verify email
                    $verifyUser = VerifyUser::create([
                        'user_id' => $user->id,
                        'token' => sha1(time())
                    ]);
                    //send verify mail
                    $user->notify(new VerifyNotifications($user));
                } catch (\Exception $exception) {

                }

                return redirect()->route('login');
            }
        } else {
            Session::flash('message', 'Error In Payment Please Try Again');

        }
        return redirect()->route('my.courses');


    }

    function userNotify($user_id,$details)
    {
        $notify = new NotificationUser();
        $notify->user_id = $user_id;
        $notify->data = $details;
        $notify->save();
    }


       public function makePaymentWallet(
        $token,$phone
    ) {
        // JSON body.
        $json = [
          'source' => [
            'identifier'        => $phone,
            'subtype'           => 'WALLET',
           ],
          'payment_token' => $token
        ];
        // Send curl
        $payment = $this->cURL(
            'https://accept.paymob.com/api/acceptance/payments/pay',
            $json
        );
        return $payment;
    }

   public function cURL($url, $json)
    {
        // Create curl resource
        $ch = curl_init($url);

        // Request headers
        $headers = array();
        $headers[] = 'Content-Type: application/json';

        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output contains the output string
        $output = curl_exec($ch);

        // Close curl resource to free up system resources
        curl_close($ch);
        return json_decode($output);
    }
}
