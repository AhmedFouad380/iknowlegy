@extends('front.layout')
@section('title')
    {{__('lang.Faq')}}
@endsection

@section('content')
    <div class="header-img courses-img">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 container">
                    <div class="adress-head courses-pb">
                        <div class="typewriter courses-header">
                            <h1 id="demo" data-value="FAQ"> </h1>
                            <!-- <h5 class="move-box">Learn From The Best Online Courses</h5> -->
                        </div>
                        <div class="search-box courses-search-box">
{{--                            <div class="move-box">--}}
{{--                                <input type="text" placeholder=" find what you want">--}}
{{--                                <button><i class="fa fa-search" aria-hidden="true"></i></button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <ul class="menu-social" data-aos="fade-down-left">
                    <li class="social-color"><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                    <li class="social-color"><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    <li class="social-color"><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class="social-color"><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="container faq-top" data-aos="fade-down">
    <div class="category-title">
        <div  class="row margin-bottom">
            <div class="col-md-6">
{{--                <!--                            <h6 data-aos="fade-right" class="title-1"></h6>-->--}}
{{--                <!-- <h2 data-aos="fade-right"class="title-1">FAQ</h2> -->--}}
            </div>
            <div class="col-md-6">
                <div class="gatogries-link" data-aos="fade-left">
                    <!--                                <a href="categories.html" target="_blank">browse all <i class="fa fa-arrow-right" aria-hidden="true"></i></a>-->
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="nav nav-tabs nav-bottom" id="nav-tab" role="tablist">
            <a class="nav-link faq-tabs active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__('lang.student')}}</a>
            <a class="nav-link faq-tabs" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('lang.Instructor')}}</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane  faq-tabs fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card-body">
                <div class="flex flex-column mb-5 mt-4 faq-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion">
                                @foreach(\App\Models\Faq::where('is_active','active')->where('type','student')->get() as $Faq)
                                <div class="card">
                                    <div class="card-header border-header" id="heading-1">
                                        <h5 class="mb-0">
                                            <a role="button" class="collapse-title collapse-title-a" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">{{$Faq->title}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                        <div class="card-body gray-color size-body">
                                            {{$Faq->description}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane  fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="">
            <div class="card-body">
                <div class="flex flex-column mb-5 mt-4 faq-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion">
                                @foreach(\App\Models\Faq::where('is_active','active')->where('type','instructor')->get() as $Faq)
                                    <div class="card">
                                        <div class="card-header border-header" id="heading-1">
                                            <h5 class="mb-0">
                                                <a role="button" class="collapse-title collapse-title-a" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">{{$Faq->title}}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                            <div class="card-body gray-color size-body">
                                                {{$Faq->description}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</section>


@endsection
