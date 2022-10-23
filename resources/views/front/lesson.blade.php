@extends('front.layout')
@section('title')
    {{$Lesson->Course->title}}
@endsection
@section('content')

<section class="container">
    <div class="row mt-30">
        <div class="videos" id="Videos" data-aos="fade-right">
            <div class="watch-video">
                <video controls>
                    <source src="{{$Lesson->video}}" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="side-btn-list" data-aos="fade-left">

            <button onclick="myFunction()"  class="btn-function opacity-btn" id="btn-function"><i class="fa-solid fa-arrow-left"></i></button>

            <div class="list-function" id="list-bar">
                <div>
                    <div class="close-bar">
                        <h5>course content</h5>
                        <button onclick="myFunction()" class="close-button"><i class="fa-solid fa-xmark" ></i></button>

                    </div>
                    <div class="side-bar">
                        <div class="side-bar-content">
                            @foreach($Lessons as $Les)
                                <a href="{{url('Course-Lessons',$Les->id)}}">
                            <div class="content-side" style="width: 100%;">
                                <div class="content-side none-border-side"  style="width: 100%;">
                                    <h6 class="adress-course" @if($Les->id == $Lesson->id ) style="color:#51b474" @endif > {{$Les->title}}</h6>
                                    <p class="video-timee">{{$Les->Lenght}} </p>
                                </div>
                           </div>
                                </a>
                            @endforeach

                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- **********************this is section 3 in course content ********************-->


<div class="bg-course-content" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills align-items-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active btn-over" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">over view</button>
                    <button class="nav-link btn-over" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">send Messages</button>
                    <button class="nav-link btn-over" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">get certificate</button>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                        <div class="row">
                            <div class="col-md-12">
                                <section class="over-view">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-3 col-lg-3">
                                                <div class="box1-over-view">
                                                    <div class="img-over-view">
                                                        <img src="{{$Lesson->Course->Instructor->image}}">
                                                    </div>
                                                    <h5>{{__('lang.Instructor')}}</h5>
                                                    <p>{{$Lesson->Course->Instructor->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-8 col-lg-8">
                                                <p class="p-over-view">
                                                    {{$Lesson->description  }}
                                                </p>
                                            </div>
                                            <div class="border-div  m-b-border-div"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-3 col-lg-3">
                                                <div class="box1-over-view">
                                                    <h5>by the numbers</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-3 col-lg-3">
                                                <div class="span-over">
                                                    <span class="spanover1">skill level :</span>
                                                    <span class="spanover2">biggners<span>
                                                </div>
                                                <div class="span-over">
                                                    <span class="spanover1">students :</span>
                                                    <span class="spanover2">1<span>
                                                </div>
                                                <div class="span-over">
                                                    <span class="spanover1">languge :</span>
                                                    <span class="spanover2">arabic<span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-3 col-lg-3">
                                                <div class="span-over">
                                                    <span class="spanover1">lectures :</span>
                                                    <span class="spanover2">7<span>
                                                </div>
                                                <div class="span-over">
                                                    <span class="spanover1">video lenght :</span>
                                                    <span class="spanover2">0 : 00 : 0<span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </section>

                            </div>
                        </div>






                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                        >>>>>>>>>>>.

                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
