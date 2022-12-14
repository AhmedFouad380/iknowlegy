<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    @if(Session('lang') == 'en')
        <link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}" type="text/css">
    @else
        <link rel="stylesheet" href="{{asset('website/assets/css/ar_style.css')}}" type="text/css">

    @endif
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    @yield('css')
    @inject('Setting','App\Models\Setting')
    <title>{{$Setting->find(1)->name}} || @yield('title')</title>
</head>
<body>

<!--********************************* this is header idiscuss******************************** -->
<div class="fixed-nav">
    <section class="phone-header">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="chat">
                        <a href="{{url('IDISCUSS')}}" target="_blank">
                        <span><i class="fa-solid fa-comments"></i></span>
                        <small> {{__('lang.IDISCUSS')}}</small>
                        </a>
                        <a  data-bs-toggle="modal" data-bs-target="#SIGN" target="_blank">
                            <span>
                                <i class="fa-solid fa-user"></i></span>
                            <small> {{__('lang.Login')}} </small>
                        </a>

                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 d-flex flex-row-reverse">
                    <div class="change-lang ">
                        @if(Session('lang') == 'ar')
                        <a href="{{url('lang\en')}}">
                        <span><i class="fa-solid fa-earth-americas"></i></span>
                        <small> English </small>
                        </a>
                        @else
                            <a href="{{url('lang\ar')}}">
                                <span><i class="fa-solid fa-earth-americas"></i></span>
                                <small> Arabic </small>
                            </a>


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav class="d-flex navbar #navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <div class="image-responsive">
                    <img src="{{$Setting->find(1)->logo}}">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <svg  style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M192 80c0-26.5-21.5-48-48-48H48C21.5 32 0 53.5 0 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80zm0 256c0-26.5-21.5-48-48-48H48c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336zM256 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H304c-26.5 0-48 21.5-48 48zM448 336c0-26.5-21.5-48-48-48H304c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336z" class=""></path></svg>
                            {{__('lang.Categories')}}
                        </a>
                        <ul class="dropdown-menu">
                            @inject('MainCategories','App\Models\Category')
                            @inject('SubCategories','App\Models\SubCategory')
                            @foreach($MainCategories->where('is_active','active')->get() as $MainCat)
                            <li> <a class="dropdown-item" href="#"> {{$MainCat->title}} </a>
                                <ul class="submenu dropdown-menu">
                                    @foreach($SubCategories->where('is_active','active')->where('category_id',$MainCat->id)->get() as $SubCat)
                                        <li><a class="dropdown-item" href="{{url('Category',$SubCat->slug)}}">{{$SubCat->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                                @endforeach
                        </ul>
                    </li>



{{--                            @inject('Pages','App\Models\Page')--}}
{{--                            @foreach($Pages->where('is_active','active')->where('type','header')->get() as $page)--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link #nav-link active" href="{{url('Page',$page->slug)}}">{{$page->title}}</a>--}}
{{--                        </li>--}}

{{--                            @endforeach--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link #nav-link active" href="{{url('contact')}}">{{__('lang.contact')}}</a>--}}
{{--                    </li>--}}
                    <li class="mob-hidden">
                        <form action="{{url('Search')}}" method="get">
                            <div class="search-box" style="top: 21px!important;">
                                <div class="move-box">
                                    <input type="text" name="search" placeholder=" {{__('lang.search')}}">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>

                    </li>
                </ul>

            </div>
            <div class="d-flex align-items-center mob-hidden" >
                <div class="sign-login">
                    @if(Auth::guard('web')->check())
                        <div class="dropdown" >
                            <button class=" login dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                hi,  {{Auth::guard('web')->user()->name}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{url('MyCourses')}}">{{__('lang.MyCourses')}}</a></li>
                                <li><a class="dropdown-item" href="#">{{__('lang.profile')}}</a></li>
                                <li><a class="dropdown-item" href="{{__('lang.wishlist')}}">{{__('lang.wishlist')}}</a></li>
                                <li><a class="dropdown-item" href="{{url('logoutUser')}}">{{__('admin.logout')}}</a></li>
                            </ul>
                        </div>
                    @elseif(Auth::guard('instructor')->check())
                        <div class="dropdown" >
                            <button class=" login dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                hi,  {{Auth::guard('instructor')->user()->name}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('InstractorDashboard')}}">{{__('admin.Dashboard')}}</a></li>
                                <li><a class="dropdown-item" href="#">{{__('lang.profile')}}</a></li>
                                <li><a class="dropdown-item" href="{{url('logoutUser')}}">{{__('admin.logout')}}</a></li>
                            </ul>
                        </div>
                    @elseif(Auth::guard('admin')->check())
                        <div class="dropdown" >
                            <button class=" login dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                hi,  {{Auth::guard('admin')->user()->name}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{url('Dashboard')}}">{{__('admin.Dashboard')}}</a></li>
                                <li><a class="dropdown-item" href="{{url('logoutUser')}}">logout</a></li>
                            </ul>
                        </div>
                    @else

                        <button class="login"  data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('lang.Start teaching')}} </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <!-- MODEL-TITLE -->
                                            <div class="model-img">
                                                <img src="{{$Setting->find(1)->logo}}">
                                            </div>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- model body -->
                                    <div class="modal-body">
                                        <div class="row padding-row nav nav-tabs nav-bottom " id="nav-tab" role="tablist">
                                            <div class="col-md-12 col-12 col-lg-12">
                                                <a class="nav-link faq-tabs nav-log active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('lang.sign up as Instructor')}}</a>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane  faq-tabs fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <!--  2 ?????????????? -->
                                                <form method="post" action="{{url('RegisterInstructor')}}" >
                                                    @csrf
                                                    <div class="col-md-12 col-12 col-lg-12 top-package">
                                                        <div class="row">
                                                            @foreach(\App\Models\InstructorPackage::where('is_active','active')->get() as $Packages)
                                                                <div class="col-md-4 col-4 col-lg-4">
                                                                    <div class="box-package " data-id="{{$Packages->id}}">
                                                                        <div class="header-package
                                                                            @if($Packages->color == 'gold') gold-pack @elseif($Packages->color == 'silver' ) silver-pack @endif">
                                                                            <span class="taj"><i class="fa-solid fa-crown"></i></span>
                                                                            <h5>{{$Packages->title}}</h5>
                                                                        </div>
                                                                        <div class="body-package">
                                                                            <h6>egp {{$Packages->cash}}</h6>
                                                                            <p>
                                                                                {!! $Packages->description !!}
                                                                            </p>
                                                                        </div>
                                                                        <div class="footer-package @if($Packages->color == 'gold') gold-pack @elseif($Packages->color == 'silver' ) silver-pack @endif">
                                                                            <div class="block-select all-select packageselect-{{$Packages->id}} " >select</div>
                                                                            <div class="none-select all-selected packageselected-{{$Packages->id}}">selected<i class="fa-solid fa-circle-check"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 col-lg-12 form-login">
                                                        <div class="row">
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.name')}} <span>*</span></label>
                                                                <input class="form-control " type="text"  name="name" placeholder="enter your name">
                                                            </div>
                                                            <input type="hidden" value="" id="package_id" required name="package_id">
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.age')}} <span>*</span></label>
                                                                <input class="form-control " type="number" name="age" required placeholder="enter your name">
                                                            </div>

                                                            <div class="col-md-12 col-12 col-lg-12">
                                                                <label>{{__('lang.email')}} <span>*</span></label>
                                                                <input class="form-control" type="email" name="email" required placeholder="enter your email">
                                                            </div>

                                                            <div class=" col-md-12 col-12 col-lg-12 ">
                                                                <label>code <span>*</span></label><label>{{__('lang.phone')}} <span>*</span></label>
                                                                <div class="d-flex">
                                                                    <input type="text" name="phone"class="form-control code"  id="txtPhone2" required>
                                                                    <input type="tel" class="form-control tel" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-12col-lg-12 mb-text">

                                                                <label> {{__('lang.about')}} <span>*</span></label>
                                                                <br>
                                                                <textarea name="" class="form-control" cols="69" rows="3"></textarea>

                                                            </div>

                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.password')}} <span>*</span></label>
                                                                <input class="form-control " type="password" name="password" placeholder="enter your password">
                                                            </div>
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.password_confirmation')}} <span>*</span></label>
                                                                <input class="form-control " type="password" placeholder="confirm your password">
                                                            </div>

                                                            <div class="col-md-12 col-12 col-lg-12 ">
                                                                <label>{{__('lang.upload your cv')}} <span>*</span></label>
                                                                <input class="form-control " type="file" placeholder="enter your name">
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-12">
                                                                <div class="d-flex top-check">
                                                                    <input type="checkbox">
                                                                    <p class="policy">By signing up, you agree to our <a><span>Terms</span></a>of Use and Privacy <a><span>Policy</span></a> .*</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-12 ">
                                                                <div class="d-flex top-policy">
                                                                    <input type="checkbox">
                                                                    <p class="policy ">
                                                                        I certify that the course(s) uploaded by me and their content(s) were created by me, and the copyrights are mine alone, and I am fully responsible for them and I bear all the legal responsibility, and acknowledge that providing false statements may lead to penalties under applicable law.
                                                                    </p>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-12 " style="text-align: right;">

                                                                <button type="button" class="btn close" data-bs-dismiss="modal">{{__('lang.Close')}}</button>
                                                                <button type="submit" class="btn sign-up">{{__('lang.sign up')}}</button>
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

                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <!-- MODEL-TITLE -->
                                            <div class="model-img">
                                                <img src="{{$Setting->find(1)->logo}}">
                                            </div>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- model body -->
                                    <div class="modal-body">
                                        <div class="row padding-row nav nav-tabs nav-bottom " id="nav-tab" role="tablist">
                                            <div class="col-md-12 col-12 col-lg-12">
                                                <a class=" nav-link faq-tabs active nav-log" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__('lang.sign up as Student')}}</a>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane  faq-tabs fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <!-- 1 ?????????????? -->

                                                <form action="{{url('RegisterStudent')}}" method="post" >
                                                    @csrf
                                                    <div class="col-md-12 col-12 col-lg-12 form-login">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12 col-lg-12">
                                                                <label>{{__('lang.name')}} <span>*</span></label>
                                                                <input class="form-control " type="text"  required name="name" placeholder="enter your name">
                                                            </div>

                                                            <div class="col-md-12 col-12col-lg-12">
                                                                <label>{{__('lang.email')}} <span>*</span></label>
                                                                <input class="form-control" type="email" name="email" required placeholder="enter your email">
                                                            </div>

                                                            <div class=" col-md-12 col-12 col-lg-12">
                                                                <label>{{__('lang.code')}} <span>*</span></label><label>{{__('lang.phone')}} <span>*</span></label>
                                                                <div class="d-flex">
                                                                    <input type="text" name="code" required id="txtPhone" class="form-control code">
                                                                    <input type="number" name="phone"  required class="form-control tel">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-6 col-lg-6">
                                                                <label>{{__('lang.password')}} <span>*</span></label>
                                                                <input class="form-control " type="password" required name="password" placeholder="enter your password">
                                                            </div>
                                                            <div class="col-md-6 col-6 col-lg-6">
                                                                <label>{{__('lang.password_confirmation')}} <span>*</span></label>
                                                                <input class="form-control " type="password" required name="password_confirmation" placeholder="confirm your password">
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-12">
                                                                <div class="d-flex top-check">
                                                                    <input type="checkbox" required >
                                                                    <p class="policy">By signing up, you agree to our <a><span>Terms</span></a>of Use and Privacy <a><span>Policy</span></a> .*</p>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-12 " style="text-align: right; margin-top:15px">

                                                                <button type="button" class="btn close" data-bs-dismiss="modal">{{__('lang.Close')}}</button>
                                                                <button type="submit" class="btn sign-up">{{__('lang.sign up')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                            <div class="tab-pane  fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <!--  2 ?????????????? -->
                                                <form method="post" action="{{url('RegisterInstructor')}}" >
                                                    @csrf
                                                    <div class="col-md-12 col-12 col-lg-12 top-package">
                                                        <div class="row">
                                                            @foreach(\App\Models\InstructorPackage::where('is_active','active')->get() as $Packages)
                                                                <div class="col-md-4 col-4 col-lg-4">
                                                                    <div class="box-package " data-id="{{$Packages->id}}">
                                                                        <div class="header-package
                                                                            @if($Packages->color == 'gold') gold-pack @elseif($Packages->color == 'silver' ) silver-pack @endif">
                                                                            <span class="taj"><i class="fa-solid fa-crown"></i></span>
                                                                            <h5>{{$Packages->title}}</h5>
                                                                        </div>
                                                                        <div class="body-package">
                                                                            <h6>egp {{$Packages->cash}}</h6>
                                                                            <p>
                                                                                {!! $Packages->description !!}
                                                                            </p>
                                                                        </div>
                                                                        <div class="footer-package @if($Packages->color == 'gold') gold-pack @elseif($Packages->color == 'silver' ) silver-pack @endif">
                                                                            <div class="block-select all-select packageselect-{{$Packages->id}} " >select</div>
                                                                            <div class="none-select all-selected packageselected-{{$Packages->id}}">selected<i class="fa-solid fa-circle-check"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 col-lg-12 form-login">
                                                        <div class="row">
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.name')}} <span>*</span></label>
                                                                <input class="form-control " type="text" placeholder="enter your name">
                                                            </div>
                                                            <input type="hidden" value="" id="package_id" required name="package_id">
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.age')}} <span>*</span></label>
                                                                <input class="form-control " type="number" required placeholder="enter your name">
                                                            </div>

                                                            <div class="col-md-12 col-12 col-lg-12">
                                                                <label>{{__('lang.email')}} <span>*</span></label>
                                                                <input class="form-control" type="email" required placeholder="enter your email">
                                                            </div>

                                                            <div class=" col-md-12 col-12 col-lg-12 ">
                                                                <label>code <span>*</span></label><label>{{__('lang.phone')}} <span>*</span></label>
                                                                <div class="d-flex">
                                                                    <input type="text" class="form-control code"  id="txtPhone2" required>
                                                                    <input type="tel" class="form-control tel" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-12col-lg-12 mb-text">

                                                                <label> {{__('lang.about')}} <span>*</span></label>
                                                                <br>
                                                                <textarea class="form-control" cols="69" rows="3"></textarea>

                                                            </div>

                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.password')}} <span>*</span></label>
                                                                <input class="form-control " type="email" placeholder="enter your password">
                                                            </div>
                                                            <div class="col-md-6 col-6 col-lg-6 ">
                                                                <label>{{__('lang.password_confirmation')}} <span>*</span></label>
                                                                <input class="form-control " type="password" placeholder="confirm your password">
                                                            </div>

                                                            <div class="col-md-12 col-12 col-lg-12 ">
                                                                <label>{{__('lang.upload your cv')}} <span>*</span></label>
                                                                <input class="form-control " type="file" placeholder="enter your name">
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-12">
                                                                <div class="d-flex top-check">
                                                                    <input type="checkbox">
                                                                    <p class="policy">By signing up, you agree to our <a><span>Terms</span></a>of Use and Privacy <a><span>Policy</span></a> .*</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-12 ">
                                                                <div class="d-flex top-policy">
                                                                    <input type="checkbox">
                                                                    <p class="policy ">
                                                                        I certify that the course(s) uploaded by me and their content(s) were created by me, and the copyrights are mine alone, and I am fully responsible for them and I bear all the legal responsibility, and acknowledge that providing false statements may lead to penalties under applicable law.
                                                                    </p>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-12 " style="text-align: right;">

                                                                <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn sign-up">sign up</button>
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

                        <button class="sign"  data-bs-toggle="modal" data-bs-target="#exampleModal2">{{__('lang.become learner')}}</button>
                        <div class="modal fade" id="SIGN" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <!-- MODEL-TITLE -->
                                            <div class="model-img">
                                                <img src="{{$Setting->find(1)->logo}}">
                                            </div>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row padding-row nav nav-tabs nav-bottom " id="aa" role="tablist">
                                            <div class="col-md-12 col-12 col-lg-12">
                                                <a class=" nav-link faq-tabs active nav-log" id="aa" data-toggle="tab" href="#aa" role="tab" aria-controls="nav-home" aria-selected="true">sign in as Student Or Instructor</a>
                                            </div>
                                        </div>
                                        <form action="{{url('Userlogin')}}" method="post" >
                                            @csrf

                                            <div class="col-md-12 col-12 col-lg-12 form-login">
                                                <div class="row">

                                                    <div class="col-md-12 col-12col-lg-12">
                                                        <label>{{__('lang.email')}} <span>*</span></label>
                                                        <input class="form-control" type="email" name="email" required placeholder="enter your email">
                                                    </div>


                                                    <div class="col-md-12 col-12 col-lg-12">
                                                        <label>{{__('lang.password')}} <span>*</span></label>
                                                        <input class="form-control " type="password"  required name="password" placeholder="enter your password">
                                                    </div>

                                                    <div class="col-md-12 col-lg-12 col-12 " style="text-align: right; margin-top:15px">

                                                        <button type="button" class="btn close" data-bs-dismiss="modal">
                                                            {{__('lang.Close')}}</button>
                                                        <button type="submit" class="btn sign-up">{{__('lang.Login')}}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <ul class="menu-cart">
                    <li class="cart" style="width: 100%"><a href="{{url('cart')}}" >
                                                <span id="cart-count-data">
                                                @if(Auth::guard('web')->check() && \App\Models\Cart::where('user_id',Auth::guard('web')->id())->count() > 0)
                                                        <span id="cart-count" >{{\App\Models\Cart::where('user_id',Auth::guard('web')->id())->count()}}</span>
                                                    @endif
                                                </span>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="line-color"></div>
</div>







@yield('content')

<!-- this is footer -->


<div class="col-lg-12 col-md-12 col-12">
    <footer class="new_footer_area bg_color">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don???t miss any updates of our new templates and extensions.!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two footer-btn" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">{{__('lang.contact')}}</h3>
                            <ul class="list-unstyled f_list">

                                <li><a href="{{url('contact')}}" target="_blank">{{__('lang.Contact us')}} </a></li>
                                <li><a href="{{url('Careers')}}">{{__('lang.Careers')}}</a></li>
                                <li><a href="{{url('internships')}}">{{__('lang.Internships')}}</a></li>
                                <li><a href="{{url('Faq')}}" target="_blank">{{__('lang.Faq')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">{{__('lang.Pages')}}</h3>
                            <ul class="list-unstyled f_list">
                                @foreach(\App\Models\Page::where('is_active','active')->where('type','footer')->get() as $Page)
                                <li><a href="{{url('page',$Page->slug)}}" target="">{{$Page->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">{{__('lang.Socail Media')}}</h3>
                            <div class="f_social_icon">
                                @inject('Setting','App\Models\Setting')

                                <a href="{{$Setting->find(1)->facebook}}" target="_blank" class="fab fa-facebook fb"></a>
                                <a href="{{$Setting->find(1)->twitter}}" targrt="_blank" class="fab fa-twitter tw"></a>
                                <a href="{{$Setting->find(1)->linkedin}}" targrt="_blank" class="fab fa-linkedin lin"></a>
                                <a href="{{$Setting->find(1)->instgram}}" targrt="_blank" class="fab fa-instagram fb" ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400 " >?? CoreBugs.. 2022 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <p>Made with <i class="icon_heart "></i> in <a href="https://corebugs.com" target="_blank" class="core">CoreBugs</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- end footer -->
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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

    $(function() {
        var code = "+20"; // Assigning value from model.
        $('#txtPhone2').val(code);
        $('#txtPhone2').intlTelInput({
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

    $('.box-package').on('click',function(){
       id = $(this).data('id');
        $('.box-package').removeClass('active');
        $(this).addClass('active');
        $('.all-select').addClass('block-select')
        $('.all-select').removeClass('none-select')
        $('.all-selected').removeClass('block-select');

        $('.packageselect-'+id).removeClass('block-select ');
        $('.packageselect-'+id).addClass('none-select');

        $('.packageselected-'+id).addClass('block-select');

        document.getElementById("package_id").value = id;

    });

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
            '????????!',
            '?????? ???? ?????????? ??????????.',
            'error'
        )
    </script>

@endif
@if( session()->has("PendingPayment"))
    <script>
        Swal.fire(
            '!????????',
            '???????? ?????? ???????????????? ???????????? ?????????? ???????????? ???????????????? ??????????????.',
            'info'
        )
    </script>

@endif
@if( session()->has("SuccessPayment"))
    <script>
        Swal.fire(
            '???? ?????????????? ??????????',
            '?????? ?????????? ?????????? ?????????? ?????????? ???????? ?????????? ???????????? ??????????????.',
            'success'
        )
    </script>

@endif


@if( session()->has("messageSuccess"))
    <script>
        Swal.fire(
            '???? ?????????????? ??????????!',
            '{{$message}}.',
            'success'
        )
    </script>

@endif
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: '???????? !',
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
            title: '???????? !',
            text: '{{$messageError}}',
        })
    </script>

@endif
@if(Auth::guard('web')->check())
<?php  $check = 1; ?>
@else
    <?php  $check = 0; ?>

@endif
<script>
    $('.addWishList').click(function () {
        $(this).toggleClass('red')

        id = $(this).data('id');
       var  check = {{$check}}
        if(check){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "get",
            url: "{{url('addWishList')}}",
            data: {"id": id,_token: CSRF_TOKEN},
            success: function (data) {
                // out =  '<span id="cart-count" >' + data + '</span>';
                if(data == 1){
                // $('#cart-count-data').html(out);
                Swal.fire("@if(Session('lang') == 'ar' ) ????  @else Success @endif ", "@if(Session('lang') == 'ar' ) ???? ?????????????? ??????????   @else Successfully ??Added To WishList @endif", "success");
                }else{
                    Swal.fire("@if(Session('lang') == 'ar' ) ????  @else Success @endif ", "@if(Session('lang') == 'ar' ) ???? ?????????? ??????????   @else Successfully Delete From WishList @endif", "success");

                }
            }
        });
        }else{
            Swal.fire("@if(Session('lang') == 'ar' ) ???????? !  @else Sorry ! @endif ", "@if(Session('lang') == 'ar' ) ???????????? ?????????? ???????????? ????????   @else Please login first @endif", "error");

        }
    });

</script>
<script>
    $('.add-Cart').click(function () {
        id = $(this).data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "get",
            url: "{{url('addCart')}}",
            data: {"id": id,_token: CSRF_TOKEN},
            success: function (data) {
           out =  '<span id="cart-count" >' + data + '</span>';

                $('#cart-count-data').html(out);
                Swal.fire("@if(Session('lang') == 'ar' ) ????  @else Success @endif ", "@if(Session('lang') == 'ar' ) ???? ?????????????? ??????????   @else Successfully ??Added To Cart @endif", "success");

            }
        });
    });

</script>
<script>

    $('.remove-cart').click(function () {
        var  id = $(this).data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        if (id) {
            Swal.fire({
                title: "{{__('lang.warrning')}}",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "{{__('lang.btn_yes')}}",
                cancelButtonText: "{{__('lang.btn_no')}}",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: '{{url("remove-cart")}}',
                        type: "get",
                        data: {'id': id, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                location.reload();
                            } else {
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("{{__('lang.Cancelled')}}", "{{__('lang.Message_Cancelled_Delete')}}", "error");
                }
            });
        }


    });
</script>

@yield('js')
</html>
