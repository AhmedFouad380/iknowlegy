@extends('front.layout')

@section('title')
    {{$data->title}}
@endsection
@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100&family=Lato:wght@100&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />

@endsection
@section('content')
    <!-- this is section 1  -->
    <section class="container">
         <div class="row" style="min-height: 500px;">
            <div class="col-7 col-md-7 col-lg-7">
                <div class="about-us1">
                    <div class="d-flex">
                        <h4 class="left-h4"> {{$data->title}}</h4>
                         <div class="line"></div>
                    </div>
                    <p class="black-color">{!! $data->description !!}</p>
                </div>
            </div>
             <div class="col-4 col-md-4 col-lg-4">
                <div class="about-us3">
                    <div class="about-color">
                    </div>
                    <div class="about-img">
                        <img src="{{asset('website/assets/images/empty-wooden-dock-lake-during-breathtaking-sunset-cool-background.jpg')}}" alt="">
                        <div class="about-login">
                           <div class="about-login1">
                                <h4>Get a</h4>
                                <span>Free</span>
                                <span class="block-span1">Registration.</span>
                           </div>
                            <div class="about-form">
                                <form>
                                    <input type="text" class="form-control form-color" placeholder="your name">
                                    <input type="number" class="form-control form-color" placeholder="your number">
                                    <input type="email" class="form-control form-color" placeholder="your email">
                                    <select class="form-select form-color" aria-label="Default select example">
                                          <option selected>select course</option>
                                          <option value="1">web design</option>
                                          <option value="2">graphic</option>
                                          <option value="3">php</option>
                                    </select>
                                    <textarea class="form-control form-color" id="exampleFormControlTextarea1" rows="3" placeholder="message"></textarea>
                                    <button class="form-control">submit request</button>

                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>

         <!-- this is section 2 our Instructors -->
         <section class="row top-row">
            <div class="adress-our">
                    <div class="d-flex">
                        <div>
                            <h4>our Instructors</h4>
                            <h6>we have a good team</h6>
                        </div>
                        <div class="line3">
                        </div>
                    </div>
            </div>
              <div class="col-md-12 col-lg-12 col-12">
                <section class="regular slider">
                    @foreach(\App\Models\Instructor::where('is_active','active')->inRandomOrder()->limit(8)->get()  as $Instuctor)
                    <div class="div-our">
                        <div class="our-instructors">
                            <div class="image-our">
                                <img src="{{$Instuctor->image}}">
                                <div class="social-our">
                                    <div class="socialour">
                                        <span><i class="fa-brands fa-facebook-f"></i></span>
                                        <span><i class="fa-brands fa-youtube"></i></span>
                                        <span> <i class="fa-brands fa-instagram"></i></span>
                                        <span><i class="fa-brands fa-twitter"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-about">
                                <h5>{{$Instuctor->name}}</h5>
                                <h6 class="gray-color">{{$Instuctor->job_title}}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>
              </div>
         </section>
    </section>

      <!-- this is footer -->

@endsection

@section('js')
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    <script type="text/javascript">
        $(document).on('ready', function () {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });
    </script>

@endsection
