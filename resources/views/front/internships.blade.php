@extends('front.layout')
@section('title')
    {{__('lang.Careers')}}
@endsection
@section('content')

<div class="bg-discuss2">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-0">    {{__('lang.Internships')}}
        </h1>
        <div class="d-flex mt-0">
            <a class="{{url('/')}}">{{__('lang.Home')}}</a>
            <span>/</span>
            <a class="{{url('internships')}}">    {{__('lang.Internships')}}
            </a>
        </div>
    </div>
</div>

<!--********************************* end header idiscuss******************************** -->

<!--*********************************** start section 1********************************** -->
<div class="bg55 py-4">
    <div class="container overflow-hidden">
        <div class="row overflow-hidden">
            <div class="col-12 col-md-12 col-lg-12 sec-1-disscuss mt-4 overflow-hidden " data-aos="fade-right">
                <input type="search " class="form-control" placeholder="search here">
                <i class="fa-solid fa-magnifying-glass"></i>
                <button class="btn btn3 mb-5">search</button>
            </div>
            <div class="col-12 col-md-12 col-lg-12 mt-5 mb-4 overflow-hidden">
                <div class="d-flex justify-content-center border-navs-tabs mb-4">
                    <ul class="nav nav-discuss nav-tabs nav-tabs4 justify-content-center " id="myTab" role="tablist" data-aos="fade-right">
                        @php
                            $active= 'active';
                        @endphp
                        @foreach(\App\Models\CareersCategory::where('is_active','active')->get() as $Categories)
                        <li class="nav-item nav-item4" role="presentation">
                            <button class="nav-link  {{$active}}" id="marketing-tab{{$Categories->id}}" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="marketing{{$Categories->id}}" aria-selected="true">
                                {{$Categories->title}}</button>
                        </li>
                            @php
                                $active= '';
                            @endphp
                        @endforeach


                    </ul>
                </div>
                <div class="tab-content" id="myTabContent" data-aos="fade-right">
                    @php
                        $active= 'show active';
                    @endphp

                @foreach(\App\Models\CareersCategory::where('is_active','active')->get() as $Categories)
                    <div class="tab-pane fade show active" id="marketing{{$Categories->id}}" role="tabpanel" aria-labelledby="marketing-tab{{$Categories->id}}">
                        <div class="container">
                            <div class="row">
                                @foreach(\App\Models\Internship::where('category_id',$Categories->id)->where('is_active','active')->OrderBy('id','desc')->get()  as $Careers)
                                <div class=" mt-4 col-12 col-md-6 col-lg-6">
                                    <div class=" box-discuss3">
                                        <div class="row ">
                                            <div class="col-12 col-lg-2 col-md-2 d-flex align-items-center">
                                                <div class="w-100">
                                                    <div class="image-box-discuss2 rounded-circle ">
                                                        <img src="{{$Careers->image}}" class="w-100 rounded-circle">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-10 col-lg-10 d-flex">
                                                <div class="job-infooo w-75">
                                                    <h5 class="mt-2">{{$Careers->title}}</h5>
                                                    <ul class="mt-4">
                                                        <li>
                                                            <i class="fa-solid fa-building"></i>
                                                            Publisher : {{$Careers->company}}
                                                        </li>

                                                        <li>
                                                            <i class="fa-solid fa-calendar"></i>
                                                            Date : {{\Carbon\Carbon::parse($Careers->created_at)->format('Y-m-d')}}
                                                        </li>
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            Location : {{$Careers->City->title}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="d-flex jus align-items-end justify-content-end" >
                                                    <div class="btn-jobs">
                                                        <button class="apply-btn">
                                                            <span>apply now</span>
                                                            <div class="btn-layer"></div>
                                                        </button>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        @php
                            $active= '';
                        @endphp

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--*********************************** end section 1********************************** -->
@endsection

