@extends('front.layout')
@section('title')
    {{$Cat->title}}
@endsection
@section('content')
           <div class="header-img courses-img">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-12 container">
                            <div class="adress-head courses-pb">
                                <div class="typewriter courses-header">
                                    <h1 id="demo" data-value="{{$Cat->title}}"> </h1>
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


             <!-- this is the first section filter  -->
             <section class="container-fluid dropdown-color" data-aos="fade-right"
             data-aos-offset="300"
             data-aos-easing="ease-in-sine">
                <div class="container">
                    <div class="row">
                      <div class="col-md-9 col-lg-9">
                          <div class="row">
                                <div class=" col-2 col-md-2 col-lg-2">
                                    <div class="dropdown dropdown-font ">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Categories
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" col-2 col-md-2 col-lg-2">
                                    <div class="dropdown dropdown-font ">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Level
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" col-2 col-md-2 col-lg-2">
                                    <div class="dropdown dropdown-font ">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Language
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" col-2 col-md-2 col-lg-2">
                                    <div class="dropdown dropdown-font ">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            By Cost
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" col-2 col-md-2 col-lg-2">
                                    <div class="dropdown dropdown-font">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Instructors
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                          </div>
                      </div>
                    </div>
                </div>
             </section>

             <!-- ender-filtter section -->

             <!-- this is section 2 courses -->
             <section class="container">
              <div class="section-2">
                 <div  class="row margin-bottom">
                        <div class="col-md-6">
                            <h6 data-aos="fade-right" class="title-1">{{$Cat->MainCategory->title}}</h6>
                            <h2 data-aos="fade-right" class="title-2">{{$Cat->title}}</h2>
                        </div>

                    </div>
                  <div class="row">
                      @foreach($courses as $course)
                            <div class="col-md-3">
                              <div class="course">
                                  <div class="card" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                    <div class="border-bottom-card">
                                            <div class="img-card">
                                              <img src="{{$course->image}}">
                                            </div>
                                            <div class="data-card">
                                                    <div class="flex-card">
                                                          <h6 title="learn photoshop">{{$course->title}}</h6>
                                                          <div class="icon-card">
                                                              <i class="fa fa-heart red" aria-hidden="true"></i>
                                                          </div>
                                                    </div>
                                                    <div class="teacher-name">
                                                        {{$course->Instructor->name}}
                                                    </div>
                                                    <div class="rating-box">
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
                                            <span>{{$course->time}} {{__('lang.hour')}}</span>
                                        </div>
                                        <div class="lessons">
                                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>

                                            <span> {{$course->Lessons->count()}} {{__('lang.lessons')}}</span>
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
                                                <h5>{{$course->title}}</h5>
                                                <h6> {{$course->Instructor->name}}</h6>
                                            </div>
                                          </div>

                                          <p style="max-height: 150px; overflow: hidden" >{!! $course->description !!}</p>
                                          <div class="trailer">
                                              <div class="last-course-data">
                                                    <div>
                                                        <span class="span">
                                                          <i class="fas fa-clock" aria-hidden="true"></i>
                                                        </span>
                                                        <small>{{__('lang.hour')}}</small>
                                                    </div>
                                                    <div>
                                                        <span class="span">
                                                          <i class="fas fa-play-circle" aria-hidden="true"></i>
                                                        </span>
                                                        <small>{{__('lang.lessons')}}</small>
                                                  </div>
{{--                                                  <div>--}}
{{--                                                      <span class="span">--}}
{{--                                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>--}}
{{--                                                      </span>--}}
{{--                                                      <small>Beginner</small>--}}
{{--                                                </div>--}}
                                              </div>
                                              <div class="watch trailer">
                                                <a href="{{url('Course',$course->slug)}}" target="_blank">
                                                  <button class="btn-watch">
                                                    {{__('lang.detail')}}
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
