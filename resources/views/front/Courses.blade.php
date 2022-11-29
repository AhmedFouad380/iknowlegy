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
                       <form method="get" action="search">
                           <div class="col-md-9 col-lg-9">
                               <div class="row">
                                   <div class=" col-6 col-md-2 col-lg-2">
                                       <select  id="maincat" class="form-control serachSelect" name="category_id"  style="font-size:15px;background-color: #51be78">
                                           <option disabled selected value="0">{{__('lang.MainCategory')}}</option>
                                           @foreach(\App\Models\Category::where('is_active','active')->get() as $MainCat)
                                               <option value="{{$MainCat->id}}">{{$MainCat->title}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class=" col-6 col-md-2 col-lg-2">
                                       <select  id="subcat" class="form-control serachSelect" name="subcategory_id"  style="color:#FFF;font-size:15px;background-color: #51be78">
                                           <option disabled selected value="0">{{__('lang.SubCategory')}}</option>
                                       </select>
                                   </div>
                                   <div class=" col-6 col-md-2 col-lg-2">
                                       <select   class="form-control serachSelect" name="sort"  style="color:#FFF;font-size:15px;background-color: #51be78">
                                           <option disabled selected value="0">{{__('lang.Sort')}}</option>
                                           <option value="low_price">{{__('lang.lowprice')}}</option>
                                           <option value="high_price">{{__('lang.highprice')}}</option>
                                       </select>
                                   </div>
                                   <div class=" col-2 col-md-2 col-lg-2">
                                       <button type="submit" class="btn btn-success">{{__('lang.search')}}</button>
                                   </div>

                               </div>
                           </div>
                       </form>
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
