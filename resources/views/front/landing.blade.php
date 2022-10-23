<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <!-- <link rel="stylesheet" href="assets/css/all.min.css" type="text/css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fredoka+One&family=Overpass:wght@700&family=Rajdhani:wght@600&family=Righteous&family=Saira:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/assets2/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" sizes="16x16" href="https://iknowlegy.com/public/uploads/site/AFCRbTA87TngcMqs1rs0fq1Jl3bsQXgLcgDtAhm9.png">

    <title>iknowlegy</title>
    <style>
        .landing-img{
            background-image: {{asset('website/assets/images/2401442.png')}}!important;
        }

        .copoon{
            margin-top: -100px ;font-size: 40px;     margin-bottom: 111px;
        }
        @media (max-width: 576px)
        {
            .landing-img{
                background-image: {{asset('website/assets/images/2401442.png')}}!important;
            }
            .copoon{
              font-size: 20px;     margin-bottom: 53px;
            }

        }
    </style>
</head>
<body class="landing-img" >
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-6">
                <div class="image-responsive">

                    <img src="{{\App\Models\Setting::find(1)->logo}}">
                </div>
            </div>
            <div class="col-md-10 col-lg-10 col-6">
                <div class="about-us-page">
                    <ul>
                        <li>
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal2">about</a>

                        </li>
                    </ul>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <!-- MODEL-TITLE -->
                                        <div class="model-img">
                                            <img src="{{\App\Models\Setting::find(1)->logo}}">
                                        </div>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- model body -->
                                <div class="modal-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane  faq-tabs fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab1">
                                            IKNOWLEGY is an E-Learning platform that provides you with quality professional courses powered by seasoned instructors.
                                            <br>
                                            With IKNOWLEGY you will get the market experience you need to kickoff your career.
                                            <br>
                                            You can apply for internships in well-known companies partnering with IKNOWLEGY to implement what you have learned.
                                            <br>
                                            A personalized career path (PCP) will be created for each learner after the completion of the course.
                                            <br>
                                            You can update your Live CV that is accessible through a link for recruiters to check it easily.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex move-flex-box">
            <h3 class="copoon">
                <p>SGIN UP   <span style="color: #51BE78">NOW</span> <br> FOR  <span style="color: #51BE78">50% </span >COUPON</p>
            </h3>
            <div class="text-page">

                <div class="text-text">
                    <span class="span-landing1 ">Numbers of registered learners</span>
                    <span class="span-landing2 ">{{\App\Models\User::count()}}</span>
                    <div class="landing-line"></div>
                </div>
                <p> <span>c</span>oming <span>s</span>oon</p>

            </div>
            <div class="time-counter">
                <div class="days">
                    <span id="days">0</span>
                    <p  class="time-counter-p">days</p>
                </div>
                <div class="hours">
                    <span id="hours">0</span>
                    <p  class="time-counter-p">hours</p>
                </div>
                <div class="minutes">
                    <span id="minutes">0</span>
                    <p class="time-counter-p">minutes</p>
                </div>
                <div class="secondes">
                    <span id="seconds">0</span>
                    <p  class="time-counter-p">seconds</p>
                </div>
            </div>
            <div class="">
                <!-- <button class="login"  data-bs-toggle="modal" data-bs-target="#exampleModal">sign up</button> -->
                <div class="btn-page form-2 ">
                    <button class="sign-up-form-2"><a href="landing-page form.html" target="_self" data-bs-toggle="modal" data-bs-target="#exampleModal">sign up <span>now</span></a></button>

                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <!-- MODEL-TITLE -->
                                    <div class="model-img">
                                        <img src="{{\App\Models\Setting::find(1)->logo}}">
                                    </div>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- model body -->
                            <div class="modal-body">
                                <div class="row padding-row nav nav-tabs nav-bottom " id="nav-tab" role="tablist">
                                    <div class="col-md-12 col-12 col-lg-12">
                                        <a class=" nav-link faq-tabs active nav-log" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sign Up As Learner</a>
                                    </div>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane  faq-tabs fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <!-- 1 المحتوى -->

                                        <form action="{{url('RegisterStudent')}}" method="post" >
                                            @csrf
                                            <div class="col-md-12 col-12 col-lg-12 form-login">
                                                <div class="row">
                                                    <div class="col-md-12 col-12 col-lg-12">
                                                        <label>full name <span>*</span></label>
                                                        <input class="form-control " type="text"  required name="name" placeholder="Enter Your Full Name">
                                                    </div>

                                                    <div class="col-md-12 col-12col-lg-12">
                                                        <label>email adress <span>*</span></label>
                                                        <input class="form-control" type="email" name="email" required placeholder="Enter Your Email Address">
                                                    </div>

                                                    <div class=" col-md-12 col-12 col-lg-12">
                                                        <label>code <span>*</span></label><label>phone <span>*</span></label>
                                                        <div class="d-flex">
                                                            <input type="text" name="code" required id="txtPhone" class="form-control code">
                                                            <input type="tel" name="phone"  placeholder="Enter Your Mobile Number" required class="form-control tel">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-12 col-lg-12">
                                                        <label>Birth Date <span>*</span></label>
                                                        <input class="form-control " type="date"  required name="birth_date" placeholder="Enter Your Date">
                                                    </div>

                                                    <div class="col-md-12 col-12 col-lg-12">
                                                        <label>Faculty <span>*</span></label>
                                                        <select class="form-control" name="faculty_id" >
                                                            <option value="0">Choose ..</option>
                                                            @foreach(\App\Models\Faculty::where('is_active','active')->get() as $Faculty )
                                                                <option value="{{$Faculty->id}}">{{$Faculty->en_title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span style="font-size:11px;">( You Can update it later from your personal setting)</span>
                                                    </div>

                                                    <div class="col-md-6 col-6 col-lg-6">
                                                        <label>password <span>*</span></label>
                                                        <input class="form-control " type="password" required name="password" placeholder="Enter Your Password">
                                                    </div>
                                                    <div class="col-md-6 col-6 col-lg-6">
                                                        <label>confirm password <span>*</span></label>
                                                        <input class="form-control " type="password" required name="password_confirmation" placeholder="Confirm Your Password">
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-12">
                                                        <div class="d-flex top-check">
                                                            <input type="checkbox" required >
                                                            <p class="policy">By signing up, you agree to our <a><span>Terms</span></a>of Use and Privacy <a><span>Policy</span></a> .*</p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-12 " style="text-align: right; margin-top:15px">

                                                        <button type="submit" class="btn sign-up">Sign Up</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- end header  -->


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(function() {
        var code = "+20"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>

<script>

    $('#nav-home-tab').on('click',function(){
        $
        $('#nav-home-tab').addClass('active');
        $('#nav-home').addClass('active show');
        $('#nav-profile').removeClass('active show');
        $('#nav-profile-tab').removeClass('active');

    });

    $('#nav-profile-tab').on('click',function(){
        $
        $('#nav-home-tab').removeClass('active show');
        $('#nav-home').removeClass('active');
        $('#nav-profile').addClass('active show');
        $('#nav-profile-tab').addClass('active');

    })
</script>
<script>
    $(document).ready(function(){
        document.getElementById("preloading").style.display = "none";
        document.getElementById("preloader").style.display = "none";
    });
</script>


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("October 1, 2022 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="demo"
        document.getElementById("days").innerHTML = days ;
        document.getElementById("hours").innerHTML = hours ;
        document.getElementById("minutes").innerHTML = minutes ;
        document.getElementById("seconds").innerHTML = seconds ;
        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<script>

    // set up text to print, each item in array is new line
    var element = document.querySelector('#demo');
    var aText = new Array(element.getAttribute('data-value') , element.getAttribute('data-value2') , element.getAttribute('data-value3')) ;


    var iSpeed = 100; // time delay of print out
    var iIndex = 0; // start printing array at this posision
    var iArrLength = aText[0].length; // the length of the text array
    var iScrollAt = 20; // start scrolling up at this many lines

    var iTextPos = 0; // initialise text position
    var sContents = ''; // initialise contents variable
    var iRow; // initialise current row

    function typewriter()
    {
        sContents =  ' ';
        iRow = Math.max(0, iIndex-iScrollAt);
        var destination = document.getElementById("demo");

        while ( iRow < iIndex ) {
            sContents += aText[iRow++] + '<br />';
        }
        destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
        if ( iTextPos++ == iArrLength ) {
            iTextPos = 0;
            iIndex++;
            if ( iIndex != aText.length ) {
                iArrLength = aText[iIndex].length;
                setTimeout("typewriter()", 500);
            }
        } else {
            setTimeout("typewriter()", iSpeed);
        }
    }


    typewriter();

</script>
<script>
    AOS.init();
</script>

<?php
$message = session()->get("messageSuccess");
$messageError = session()->get("messageError");
$pendingPayment = session()->get("PendingPayment");
$SuccessPayment = session()->get("SuccessPayment");
$RejectPayment = session()->get("RejectPayment");

?>
@if( session()->has("RejectPayment"))
    <script>
        Swal.fire(
            'عفوا!',
            'فشل في عملية الدفع.',
            'error'
        )
    </script>

@endif
@if( session()->has("PendingPayment"))
    <script>
        Swal.fire(
            '!عفوا',
            'طلبك تحت الانتظار الرجاء تحويل المبلغ لاستكمال العملية.',
            'info'
        )
    </script>

@endif
@if( session()->has("SuccessPayment"))
    <script>
        Swal.fire(
            'تم العملية بنجاح',
            'تمت عملية الدفع بنجاح يمكنك الان تحميل السيرة الذاتية.',
            'success'
        )
    </script>

@endif


@if( session()->has("messageSuccess"))
    <script>
        Swal.fire(
            'Success !',
            'successfully registered.',
            'success'
        )
    </script>

@endif
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'عفوا !',
            text:  " {{implode(' - ',$errors->all())}} "
        })
    </script>

    <div class="alert alert-danger">
        <ul>
        </ul>
    </div>
@endif

@if( session()->has("messageError"))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'عفوا !',
            text: '{{$messageError}}',
        })
    </script>

@endif

</html>
