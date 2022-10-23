@extends('front.layout')
@section('title')
    {{$Course->title}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />

@endsection
@section('content')
               <div class="header-img courses-img course-details-img">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-12 container">
                            <div class="adress-head courses-pb">
                                <div class="typewriter courses-header">
                                    <h1 class="move-box h1-minheight"> {{$Course->title}} </h1>
                                    <h5 class="move-box h5-lighter">{!! $Course->description !!}
                                    </h5>
                                </div>
                                <div>
                                    <div class="move-box">
                                       <button class="btn1-course">whatch trailer</button>
                                       <button class="btn1-course add-Cart" data-id="{{$Course->id}}" >Add to Cart</button>
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
              <div class="container-fluied">
                 <div class="color-line-course">
                     <div class="row">
                         <div class="col-lg-9 col-md-9 col-9"></div>
                         <div class="col-lg-3 col-3 col-md-3">
                             <div class="d-flex">
                                 <div class="course2-rate">
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                 </div>
                                 <div class="course-price">
                                     <i class="fa fa-usd" aria-hidden="true"></i>
                                     <span class="price">{{$Course->price}}</span>
                                 </div>
                                 <div class="time">
                                     <i class="fa fa-clock-o" aria-hidden="true"></i>
                                     <span>{{$Course->time}}</span>
                                 </div>
                             </div>
                         </div>
                    </div>
                 </div>
              </div>
            <!-- this is section 2 page  -->
           <section class="container move-course-details">
             <div class="move2-course-details">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                            <div class="author" data-aos="flip-down">
                                <h4>about the author</h4>
                                <div class="autor-img">
                                  <img src="{{$Course->Instructor->image}}">
                                </div>
                                <h6>{{$Course->Instructor->name}}</h6>
                                <span class="gray-color block-span">
                                     {{$Course->Instructor->job_title}}
                                </span>
                                <div class="rate-author">
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                     <span class="rate"><i class="fa fa-star" aria-hidden="true"></i></span>
                                </div>
                                <div class="btn-p ">
                                  <button class="view-profile">view profile</button>
                              </div>
                            </div>

                    </div>

                </div>
             </div>
           </section>


       <!-- this is sectin 3 -->
       <div class="container" data-aos="fade-left">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-4">

              </div>
              <div class="col-lg-8 col-md-8 col-8">
                <div class="card-body">
                  <div class="flex flex-column mb-5 mt-4 faq-section">
                      <div class="row">
                          <div class="col-md-12">
                              <div id="accordion">
                                  <div class="card">
                                      <div class="card-header border-header" id="heading-1">
                                          <h5 class="mb-0">
                                              <a role="button" class="collapse-title about-this" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">about this course
                                              </a>
                                          </h5>
                                      </div>
                                      <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                          <div class="card-body">
                                            <p class="gray-color style-words style-p">
                                                {!! $Course->long_description !!}
                                           </p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card">
                                      <div class="card-header border-header" id="heading-2">
                                          <h5 class="mb-0">
                                              <a class="collapsed collapse-title about-this" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                  lessons
                                              </a>
                                          </h5>
                                      </div>
                                      <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="border-div">
                                                       <div class="row">
                                                           <div class="col-lg-6 col-md-6 col-6">
                                                                <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
                                                                <span class="gray-color style-words">introduction to typescript</span>
                                                           </div>
                                                           <div class="col-lg-6 col-md-6 col-6">
                                                               <div class="d-flex reserved-span">
                                                                    <span class="gray-color style-words"> 1:30:21 </span>
                                                               </div>
                                                           </div>
                                                       </div>
                                                    </div>
                                               </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="border-div">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-6">
                                                                <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
                                                                <span class="gray-color style-words">introduction to typescript</span>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-6">
                                                                <div class="d-flex reserved-span">
                                                                    <span class="gray-color style-words"> 1:30:21 </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="border-div none-border">
                                                       <div class="row">
                                                           <div class="col-lg-6 col-md-6 col-6">
                                                                <span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
                                                                <span class="gray-color style-words">introduction to typescript</span>
                                                           </div>
                                                           <div class="col-lg-6 col-md-6 col-6">
                                                               <div class="d-flex reserved-span">
                                                                    <span class="gray-color style-words"> 1:30:21 </span>
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
                          </div>

                      </div>
                  </div>
              </div>
              </div>
          </div>
       </div>

       <!-- end section 3  -->

       <!-- this is section 4 -->
       <section class="container" data-aos="fade-up-right">
        <section id="testimonials">
            <!--heading--->
            <div class="testimonial-heading">
               <div class="row">
                  <div class="col-lg-1 col-md-1 col-1">
                      <h4>REVIEWS</h4>
                  </div>
                  <div class="col-lg-11 col-md-11 col-11">
                     <div class="flex-line">
                        <div class="line-line"></div>
                     </div>
                  </div>
               </div>
            </div>
            <!--testimonials-box-container------>
            <section class="regular slider testimonial-box-container">
                <!--BOX-1-------------->
    <div class="testimonial-box">
        <!--top------------------------->
        <div class="box-top">
            <!--profile----->
            <div class="profile">
                <!--img---->
                <div class="profile-img">
                    <img src="assets/images/beautiful-woman-speaking-by-video-call-with-tablet-outdoors.jpg" />
                </div>
                <!--name-and-username-->
                <div class="name-user">
                    <strong>ahmed mohamed</strong>
                    <span>@ahmedmohamed</span>
                </div>
            </div>
            <!--reviews------>
            <div class="reviews">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i><!--Empty star-->
            </div>
        </div>
        <!--Comments---------------------------------------->
        <div class="client-comment">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
        </div>
    </div>
    <!--BOX-2-------------->
    <div class="testimonial-box">
        <!--top------------------------->
        <div class="box-top">
            <!--profile----->
            <div class="profile">
                <!--img---->
                <div class="profile-img">
                    <img src="assets/images/beautiful-woman-speaking-by-video-call-with-tablet-outdoors.jpg" />
                </div>
                <!--name-and-username-->
                <div class="name-user">
                    <strong>esraa ashraf</strong>
                    <span>@esraaashraf</span>
                </div>
            </div>
            <!--reviews------>
            <div class="reviews">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i><!--Empty star-->
            </div>
        </div>
        <!--Comments---------------------------------------->
        <div class="client-comment">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
        </div>
    </div>
    <!--BOX-3-------------->
    <div class="testimonial-box">
        <!--top------------------------->
        <div class="box-top">
            <!--profile----->
            <div class="profile">
                <!--img---->
                <div class="profile-img">
                    <img src="assets/images/beautiful-woman-speaking-by-video-call-with-tablet-outdoors.jpg" />
                </div>
                <!--name-and-username-->
                <div class="name-user">
                    <strong>ahmedfouad</strong>
                    <span>ahmedfouad</span>
                </div>
            </div>
            <!--reviews------>
            <div class="reviews">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i><!--Empty star-->
            </div>
        </div>
        <!--Comments---------------------------------------->
        <div class="client-comment">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
        </div>
    </div>
    <!--BOX-4-------------->
    <div class="testimonial-box">
        <!--top------------------------->
        <div class="box-top">
            <!--profile----->
            <div class="profile">
                <!--img---->
                <div class="profile-img">
                    <img src="assets/images/beautiful-woman-speaking-by-video-call-with-tablet-outdoors.jpg" />
                </div>
                <!--name-and-username-->
                <div class="name-user">
                    <strong>esraa ezzat</strong>
                    <span>@esraaezzat</span>
                </div>
            </div>
            <!--reviews------>
            <div class="reviews">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i><!--Empty star-->
            </div>
        </div>
        <!--Comments---------------------------------------->
        <div class="client-comment">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
        </div>
    </div>
            </section>
          </section>
       </section>
       <!-- end section 4  -->
       <!-- this is section 5 -->
       <section class="container top-5" data-aos="zoom-out-left">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-2">
                    <div class="comments">
                        <h4>add review</h4>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-10">
                <div class="flex-line">
                    <div class="line-line line-line2"></div>
                </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-1 col-md-1 col-1"></div> -->
                 <div class="col-lg-12 col-md-12 col-12">
                    <div class="master">
                        <div class="rating-component">
                          <div class="status-msg gray-color">
                            <label>
                                            <input  class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                        </label>
                          </div>
                          <div class="stars-box">
                            <i class="star fa fa-star gray-color" title="1 star" data-message="Poor" data-value="1"></i>
                            <i class="star fa fa-star gray-color" title="2 stars" data-message="Too bad" data-value="2"></i>
                            <i class="star fa fa-star gray-color" title="3 stars" data-message="Average quality" data-value="3"></i>
                            <i class="star fa fa-star gray-color" title="4 stars" data-message="Nice" data-value="4"></i>
                            <i class="star fa fa-star gray-color" title="5 stars" data-message="very good qality" data-value="5"></i>
                          </div>
                          <div class="starrate">
                            <label>
                                            <input  class="ratevalue" type="hidden" name="rate_value" value=""/>
                                        </label>
                          </div>
                        </div>

                        <div class="feedback-tags">
                          <div class="tags-container" data-tag-set="1">
                            <div class="question-tag ">
                              Why was your experience so bad ?
                            </div>
                          </div>
                          <div class="tags-container" data-tag-set="2">
                            <div class="question-tag">
                              Why was your experience so bad?
                            </div>

                          </div>

                          <div class="tags-container" data-tag-set="3">
                            <div class="question-tag">
                              Why was your average rating experience ?
                            </div>
                          </div>
                          <div class="tags-container" data-tag-set="4">
                            <div class="question-tag">
                              Why was your experience good?
                            </div>
                          </div>

                          <div class="tags-container" data-tag-set="5">
                            <div class="make-compliment">
                              <div class="compliment-container">
                                Give a compliment
                                <i class="far fa-smile-wink"></i>
                              </div>
                            </div>
                          </div>
                          <br>

                          <div class="tags-box">
                            <textarea type="text" rows="3" class="tag form-control gray-color" name="comment" id="inlineFormInputName" placeholder="">please enter your review</textarea>
                            <input type="hidden" name="course_id" value="{{ $Course->id }}" />
                          </div>

                        </div>

                        <div class="button-box">
                          <input type="submit" class=" done btn btn-warning" disabled="disabled" value="Add review" />
                        </div>

                        <div class="submited-box">
                          <div class="loader"></div>
                          <div class="success-message">
                            Thank you!
                          </div>
                        </div>
                      </div>
                 </div>
            </div>


       </section>
            <!-- this is footer -->

@endsection

@section('js')
    <script src="{{asset('website/assets/js/script.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    <script type="text/javascript">
        $(document).on('ready', function () {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1
            });
        });


        $('#heading-1').click(function () {
            $('#collapse-1 ').addClass('show');
            $('#collapse-2').removeClass('show');
        })

        $('#heading-2').click(function () {
            $('#collapse-2').addClass('show');
            $('#collapse-1').removeClass('show');
        })

    </script>


@endsection
