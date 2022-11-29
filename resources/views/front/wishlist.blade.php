@extends('front.layout')
@section('title')
    {{__('lang.wishlist')}}
@endsection
@section('content')
           <div class="header-img courses-img">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-12 container">
                            <div class="adress-head courses-pb">
                                <div class="typewriter courses-header">
                                    <h1 id="demo" data-value="{{__('lang.wishlist')}}"> </h1>
                                    <!-- <h5 class="move-box">Learn From The Best Online Courses</h5> -->
                                </div>
                                <div class="search-box courses-search-box">
                                    <div class="move-box">
                                        <input type="text" placeholder="{{__('lang.search')}}">
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




             <!-- ender-filtter section -->

             <!-- this is section 2 courses -->
             <section class="container">
              <div class="section-2">
                 <div  class="row margin-bottom">
                        <div class="col-md-6">
                            <h2 data-aos="fade-right" class="title-2">{{__('lang.wishlist')}}</h2>
                        </div>

                    </div>
                  <div class="row">
                      @foreach($Wishlists as $Wishlist)
                          <div class="col-lg-3 col-md-3 col-12">
                              <div class="course">
                                  <div class="card" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                      <div class="border-bottom-card">
                                          <div class="img-card">
                                              <img src="{{$Wishlist->course->image}}">
                                          </div>
                                          <div class="data-card">
                                              <div class="flex-card">
                                                  <h6 title="learn photoshop">{{$Wishlist->course->title}}</h6>
                                                  <h5>
                                                      <i class="fa fa-usd" aria-hidden="true"></i>
                                                      {{$Wishlist->course->price}}
                                                  </h5>
                                              </div>
                                              <div class="teacher-name" style="padding-bottom: 5px">
                                                  {{$Wishlist->course->SubCategory->title}}
                                              </div>
                                              <div class="teacher-name" style="padding-bottom: 7px">
                                                  By   {{$Wishlist->course->Instructor->name}}
                                              </div>
                                              <div style="padding-bottom: 5px" class="rating-box">
                                                            <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                  <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                  <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                  <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                  <span class="rating-item">
                                                              <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                              </div>





                                          </div>
                                      </div>
                                      <div class="d-flex course-deteils">
                                          <div class="hours">
                                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                                              <span> {{__('lang.hours')}} :{{$Wishlist->course->time}}</span>
                                          </div>
                                          <div class="lessons">
                                              <i class="fa fa-play-circle-o" aria-hidden="true"></i>

                                              <span> {{__('lang.lessons')}} : {{$Wishlist->course->Lessons->count()}} </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="course-content">
                                      <div class="box-content">
                                          <div class="box-data">
                                              <div class="img-content">
                                                  <img src="{{$Wishlist->course->image}}">
                                              </div>
                                              <div class="text-content">
                                                  <div class="flex-card">
                                                      <h6 title="learn photoshop">{{$Wishlist->course->title}}</h6>
                                                      <div class="icon-card">
                                                          <i class="fa fa-heart red addWishList " data-id="{{$Wishlist->course->id}}" aria-hidden="true"></i>
                                                      </div>
                                                  </div>
                                                  {{--                                                      <h6> {{$course->Instructor->name}}</h6>/--}}
                                              </div>
                                          </div>

                                          {!! $Wishlist->course->description !!}
                                          <div class="trailer">
                                              <div class="last-course-data">
                                                  <div>
                                                        <span class="span">
                                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        </span>
                                                      <small> {{__('lang.hours')}} : {{$Wishlist->course->time}}</small>
                                                  </div>
                                                  <div>
                                                        <span class="span">
                                                          <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                        </span>
                                                      <small>{{__('lang.lessons')}} : {{$Wishlist->course->Lessons->count()}} </small>
                                                  </div>
                                                  <div>
                                                      <span class="span">
                                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                                      </span>
                                                      <small>{{__('lang.Enrolled')}} : {{$Wishlist->course->Enrollment->count()}}</small>
                                                  </div>
                                              </div>
                                              <div class="watch trailer">
                                                  <a href="{{url('Course',$Wishlist->course->slug)}}">
                                                      <button class="btn-watch">
                                                          {{__('lang.details')}}
                                                          <span></span>
                                                          <span></span>
                                                          <span></span>
                                                          <span></span>
                                                      </button>
                                                  </a>

                                              </div>

                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>

                      @endforeach

                  </div>
              </div>
            </section>
              <!-- end section 2 courses -->
@endsection


@section('js')
    <script>
        $("#maincat").click(function () {
            var wahda = $(this).val();

            if (wahda != '') {

                $.get("{{ URL::to('/GetSubCategorySearch')}}" + '/' + wahda, function ($data) {

                    $('#subcat').html($data);


                });
            }
        });

    </script>

@endsection
