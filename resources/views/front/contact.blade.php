@extends('front.layout')

@section('title')
    {{__('lang.Contact us')}}
@endsection
@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100&family=Lato:wght@100&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />

@endsection
@section('content')

    <div class="header-img courses-img">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 container">
                <div class="adress-head courses-pb">
                    <div class="typewriter courses-header">
                        <h1 id="demo" data-value="{{__('lang.Contact us')}} "> </h1>
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
<!-- end header courses -->

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row align-items-stretch col-mb-50 mb-0">
                <!-- Contact Form
                ============================================= -->
                <div class="col-lg-6"  data-aos="fade-right">

                    <div class="fancy-title title-border">
                        <h3>{{__('lang.Send us an Email')}}</h3>
                    </div>

                    <div class="form-widget">

                        <div class="form-result"></div>

                        <form class="mb-0" id="template-contactform" name="template-contactform" action="include/form.php" method="post">

                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-name">{{__('lang.name')}}} <small>*</small></label>
                                    <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-email">{{__('lang.email')}} <small>*</small></label>
                                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-phone">{{__('lang.phone')}}</label>
                                    <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12 form-group">
                                    <label for="template-contactform-subject">{{__('lang.subject')}} <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" />
                                </div>



                                <div class="w-100"></div>

                                <div class="col-12 form-group">
                                    <label for="template-contactform-message">{{__('lang.message')}} <small>*</small></label>
                                    <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                </div>

                                <div class="col-12 form-group d-none">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                </div>

                                <div class="col-12 form-group">
                                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button-c button-3d m-0">{{__('lang.Submit')}}</button>
                                </div>
                            </div>

                            <input type="hidden" name="prefix" value="template-contactform-">

                        </form>
                    </div>

                </div><!-- Contact Form End -->

                <!-- Google Map
                ============================================= -->
                <div class="col-lg-6 min-vh-50"  data-aos="fade-left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60379277244!2d31.32833419233495!3d30.059618562347413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1655859039944!5m2!1sar!2seg" width="90%" height="84%" style="border:0; margin-top: 20px; margin-left: 20px; border-radius: 7px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div><!-- Google Map End -->
                 </div>

            <!-- Contact Info
            ============================================= -->
            <div class="row col-mb-50 mtop">
                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-right">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>{{__('lang.Our Headquarters')}}<span class="subtitle">Melbourne, Australia</span></h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-right">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="fas fa-phone-alt"></i>    </a>
                        </div>
                        <div class="fbox-content">
                            <h3>{{__('lang.Speak to Us')}}<span class="subtitle">(123) 456 7890</span></h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-left">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>{{__('lang.Follow on facebook')}}<span class="subtitle">2.3M Followers</span></h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-left">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>{{__('lang.Follow on Twitter')}}<span class="subtitle">2.3M Followers</span></h3>
                        </div>
                    </div>
                </div>
            </div><!-- Contact Info End -->

        </div>
    </div>
</section><!-- #content end -->


<!-- this is section 2 courses -->
<!-- end section 2 courses -->
<!-- end section 2 courses -->

<!-- this is footer -->
@endsection
