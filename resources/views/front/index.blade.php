@extends('front.layout')
@section('title')
    {{__('lang.Home')}}
@endsection
@section('content')
               <div class="header-img">
                    <div class="container">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12 col-12 container">
                                <div class="adress-head">
                                    <div class="typewriter">
                                        <h1 id="demo" data-value="{{__('lang.Join The HUGE')}}" data-value2="{{__('lang.Community Of')}}" data-value3="{{__('lang.IKNOWLEGY')}}"> </h1>
                                        <h5 class="move-box">{{__('lang.Learn From The Best Online Courses')}}</h5>
                                    </div>
                                    <form action="{{url('Search')}}" method="get">
                                    <div class="search-box">
                                        <div class="move-box">
                                            <input type="text" name="search" placeholder=" {{__('lang.search')}}">
                                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                   </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                     @include('front.socail')
                    </div>
               </div>
            <!-- end header  -->

            <!-- this is section 1 "counter" -->
            <div id="projectFacts" class="sectionClass">
                <div class="fullWidth eight columns">
                    <div class="projectFactsWrap ">
                            <div data-aos="fade-right" class="item wow fadeInUpBig animated animated" data-number="12" style="visibility: visible;">
                                    <i class="fa fa-briefcase"></i>
                                    <p id="number1" class="number">{{\App\Models\Category::count() + \App\Models\SubCategory::count()}}</p>
                                    <span></span>
                                    <p>{{__('lang.Categories')}}</p>
                            </div>
                            <div data-aos="fade-right" class="item wow fadeInUpBig animated animated" data-number="55" style="visibility: visible;">
                                    <i class="fa fa-smile"></i>
                                    <p id="number2" class="number">{{\App\Models\User::count()}}</p>
                                    <span></span>
                                    <p>{{__('lang.Clients')}}</p>
                            </div>
                            <div data-aos="fade-left" class="item wow fadeInUpBig animated animated" data-number="359" style="visibility: visible;">
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                    <p id="number3" class="number">{{\App\Models\Course::count()}}</p>
                                    <span></span>
                                    <p>{{__('lang.Courses')}} </p>
                            </div>
                            <div data-aos="fade-left" class="item wow fadeInUpBig animated animated" data-number="246" style="visibility: visible;">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <p id="number4" class="number">{{\App\Models\Instructor::count()}}</p>
                                    <span></span>
                                    <p>{{__('lang.Instructors')}}</p>
                            </div>
                    </div>
                </div>
                <div class="line-color"></div>
            </div>
            <!-- end dection 1 "counter" -->

            <!-- this is popular catogries -->
            <section class="container">
              <div class="category-title">
                <div  class="row margin-bottom">
                    <div class="col-md-6 col-lg-6 col-6">
                        <h6 data-aos="fade-right" class="title-1">{{__('lang.Instructors')}}</h6>
                        <h2 data-aos="fade-right"class="title-2">{{__('lang.Trending Categories')}}</h2>
                    </div>
                    <div class="col-md-6 col-lg-6 col-6">
{{--                        <div class="gatogries-link" data-aos="fade-left">--}}
{{--                              <a href="categories.html" target="_blank"> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
              </div>
              <div class="category-margin">
                <div class="row">
                    @foreach(\App\Models\Category::where('is_active','active')->inRandomOrder()->limit(8)->get() as $Category)
                      <div class="col-lg-3 col-md-3 col-12">
                          <a href="{{url('SubCategory',$Category->slug)}}">
                        <div class="category-box" data-aos="fade-right">
                            <div class="category-icon">
                                <svg width="116" height="82" viewBox="0 0 116 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9238 65.8391C11.9238 65.8391 20.4749 72.4177 35.0465 70.036C49.6182 67.6542 75.9897 78.4406 75.9897 78.4406C75.9897 78.4406 90.002 85.8843 104.047 79.2427C118.093 72.6012 115.872 58.8253 115.872 58.8253C115.743 56.8104 115.606 46.9466 97.5579 22.0066C91.0438 13.0024 84.1597 6.97958 75.9458 3.74641C58.8245 -2.99096 37.7881 -0.447684 22.9067 9.81852C15.5647 14.8832 7.65514 22.0695 3.0465 31.5007C-7.27017 52.6135 11.9238 65.8391 11.9238 65.8391Z" fill="currentColor"></path>
                                </svg>
                                <div class="category-icon-box">
                                    <img src="{{$Category->image}}" style="width:70px">
                                </div>

                            </div>
                            <div class="category-text">
                                <h5>{{$Category->title}}</h5>
                                <h6>over {{\App\Models\Course::where('main_category_id',$Category->id)->count()}} course</h6>
                            </div>
                        </div>
                          </a>
                      </div>
                    @endforeach
                  </div>
              </div>
            </section>
            <!-- end popular catogries -->

           <!-- section 3 become instructor -->
           <div class="teacher">
               <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-12">
                          <div class="teacher-img" data-aos="flip-left">

                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-12 padding-left">
                        <div class="instructor" data-aos="flip-right">
                            <h5>join as instructor</h5>
                            <div class="teacher-p">
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Non enim tempora nobis suscipit reiciendis, assumenda nisi.
                              Deleniti blanditiis ab culpa.
                              it amet consectetur, adipisicing elit
                              it amet consectetur, adip
                              Non enim tempora nobis suscipi</p>
                            </div>
                        </div>
                        <div class="btn-instructor ">
                          <button data-aos="zoom-in">join</button>
                      </div>
                      </div>
                  </div>
               </div>
           </div>
           <!-- end section 3 become instructor -->

            <!-- this is section 4 courses   -->
            <section class="container">
              <div class="section-2">
                 <div  class="row margin-bottom">
                        <div class="col-lg-6 col-md-6 col-7">
                            <h6 data-aos="fade-right" class="title-1"></h6>
                            <h2 data-aos="fade-right" class="title-2">{{__('lang.Courses')}}</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-5">
{{--                            <div class="gatogries-link" data-aos="fade-left">--}}
{{--                                  <a href="our courses.html" target="_blank">browse all <i class="fa fa-arrow-right" aria-hidden="true"></i></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                  <div class="row">
                      @foreach(\App\Models\Course::where('is_active','active')->where('is_popular','active')->inRandomOrder()->limit(8)->get() as $course)
                          <div class="col-lg-3 col-md-3 col-12">
                              <div class="course">
                                  <div class="card" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                      <div class="border-bottom-card">
                                          <div class="img-card">
                                              <img src="{{$course->image}}">
                                          </div>
                                          <div class="data-card">
                                              <div class="flex-card">
                                                  <h6 title="learn photoshop">{{$course->title}}</h6>
                                                  <h5>
                                                      <i class="fa fa-usd" aria-hidden="true"></i>
                                                      {{$course->price}}
                                                  </h5>
                                              </div>
                                              <div class="teacher-name" style="margin-bottom: 13px">
                                                  {{$course->SubCategory->title}}
                                              </div>
                                              <div class="teacher-name" style="padding-bottom: 7px">
                                                  By   {{$course->Instructor->name}}
                                              </div>
                                              <div style="padding-bottom: 5px" class="rating-box">
                                                  @if($course->rate == 1)
                                                      <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                              <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                  @elseif($course->rate == 2)
                                                      <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star gold" aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                              <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                  @elseif($course->rate == 3)
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
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                      <span class="rating-item">
                                                              <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                  @elseif($course->rate == 4)
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
                                                              <i class="fa fa-star " aria-hidden="true"></i>
                                                            </span>
                                                  @elseif($course->rate == 5)
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
                                                  @endif

                                              </div>





                                          </div>
                                      </div>
                                      <div class="d-flex course-deteils">
                                          <div class="hours">
                                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                                              <span> {{__('lang.hours')}} :{{$course->time}}</span>
                                          </div>
                                          <div class="lessons">
                                              <i class="fa fa-play-circle-o" aria-hidden="true"></i>

                                              <span> {{__('lang.lessons')}} : {{$course->Lessons->count()}} </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="course-content">
                                      <div class="box-content">
                                          <div class="box-data">
                                              <div class="img-content">
                                                  <img src="{{$course->image}}">
                                              </div>
                                              <div class="text-content">
                                                  <div class="flex-card">
                                                      <h6 title="learn photoshop">{{$course->title}}</h6>
                                                      <div class="icon-card">
                                                          <i class="fa fa-heart @if($course->is_wishlist == 1) red @endif addWishList " data-id="{{$course->id}}" aria-hidden="true"></i>
                                                      </div>
                                                  </div>
                                                  {{--                                                      <h6> {{$course->Instructor->name}}</h6>/--}}
                                              </div>
                                          </div>

                                          {!! $course->description !!}
                                          <div class="trailer">
                                              <div class="last-course-data">
                                                  <div>
                                                        <span class="span">
                                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        </span>
                                                      <small> {{__('lang.hours')}} : {{$course->time}}</small>
                                                  </div>
                                                  <div>
                                                        <span class="span">
                                                          <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                                        </span>
                                                      <small>{{__('lang.lessons')}} : {{$course->Lessons->count()}} </small>
                                                  </div>
                                                  <div>
                                                      <span class="span">
                                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                                      </span>
                                                      <small>{{__('lang.Enrolled')}} : {{$course->Enrollment->count()}}</small>
                                                  </div>
                                              </div>
                                              <div class="watch trailer">
                                                  <a href="{{url('Course',$course->slug)}}">
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
         <!-- end section 4 courses -->

@endsection
