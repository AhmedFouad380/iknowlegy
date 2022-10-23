@extends('front.layout')
@section('title')
    {{__('lang.Discuss')}}
@endsection
@section('content')


    <div class="bg-discuss">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>{{__('lang.Welcome to')}} </h1>
            <div>
                <a href="{{url('Page','About Us')}}" class="btn btn1">{{\App\Models\Page::where('slug','About Us')->first()->title}}</a>
                <button type="button" class="btn">join now</button>
            </div>
        </div>
    </div>

    <!--********************************* end header idiscuss******************************** -->

    <!--*********************************** start section 1********************************** -->
    <div class="bg55">
        <div class="container">
            <div class="row overflow-hidden">
                <div class="col-12 col-md-12 col-lg-12 sec-1-disscuss mt-4 overflow-hidden " data-aos="fade-right">
                    <form  method="get" >
                    <input type="search " name="search" class="form-control" placeholder="{{__('lang.search here')}}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <button class="btn btn3 mb-5">{{__('lang.search')}}</button>
                    </form>
                </div>
                <div class="col-12 col-md-12 col-lg-9 mt-5 mb-4 overflow-hidden">
                    <div class="tab-content" id="myTabContent" data-aos="fade-right">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="recent-tab">
                            @foreach($data as $question)
                            <div class="box-discuss mt-4">
                                <div class="row">
                                    <div class="col-12 col-lg-1 col-md-1">
                                        <div class="w-100">
                                            <div class="image-box-discuss rounded-circle">
                                                <img src="{{$question->User->image}}" class="w-100 rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-10 me-md-4 me-xl-0">
                                        <div class="d-sm-block d-md-flex justify-content-between ">
                                            <h2 class="mt-2 text-center">
                                                <i class="fa-solid fa-thumbtack fa-fw fa-shake"></i>
                                                <a href="{{url('QuestionDetails',$question->id)}}">{{$question->title}} </a>
                                            </h2>
                                            <div class="btn-report text-center">
                                                <button><a>report</a></button>
                                            </div>
                                        </div>
                                        <div class="w-100 line-discuss"></div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center w-75 icons-discuss">
{{--                                            <div>--}}
{{--                                                <i class="fa-solid fa-star fa-fw"></i>--}}
{{--                                                {{$question->likes}}--}}
{{--                                            </div>--}}
                                            <div>
                                                <i class="fa-solid fa-calendar fa-fw"></i>
                                                {{\Carbon\Carbon::parse($question->created_at)->diffForHumans()}}
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-comments fa-fw"></i>
                                                {{$question->Answers->count()}} {{__('lang.Answers')}}
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-eye fa-fw"></i>
                                                {{$question->view}} {{__('lang.views')}}
                                            </div>
                                            <div class="explainer rounded-3 text-center">
                                                By {{$question->User->name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3 mt-5 overflow-hidden">
                    <button class="btn btn4 form-control mb-4" data-aos="fade-left"  data-bs-toggle="modal"
                            data-bs-target="#kt_modal_askQuestion">
                        {{__('lang.ask a question')}}
                    </button>
                    <div class="box-discuss2 mb-4" data-aos="fade-left">
{{--                        <h3><s></s>tats</h3>--}}
                        <ul>
                            <li>
                                <i class="fa-solid fa-circle-question"></i>
                                {{__('lang.Questions')}} ( {{\App\Models\Questions::count()}} )
                            </li>
                            <li>
                                <i class="fa-solid fa-comment"></i>
                                {{__('lang.Answers')}} ( {{\App\Models\Answer::count()}} )
                            </li>
                            <li>
                                <i class="fa-solid fa-asterisk"></i>
                                {{__('lang.Best Answers')}} ( {{\App\Models\Answer::where('best_answer',1)->count()}} )
                            </li>
                            <li>
                                <i class="fa-solid fa-user"></i>
                                {{__('lang.Users')}} ( {{\App\Models\User::count()}} )
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="kt_modal_askQuestion"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="" class="form" enctype="multipart/form-data" method="post" action="{{url('store-Question')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.Title')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder=""  required/>

                                <!--end::Input-->
                            </div>



                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.description')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="description" id="editor1"
                                          rows="5" class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder=""  required></textarea>


                                <!--end::Input-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">{{__('lang.cancel')}}
                                </button>
                                <button type="submit" class="btn btn-primary"
                                        data-kt-users-modal-action="submit">
                                    <span >{{__('lang.save')}}</span>
                                </button>
                            </div>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>


@endsection


@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
