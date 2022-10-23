@extends('front.layout')
@section('title')
    {{$data->title}}
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


    <div class="bg55 py-4">
        <div class="container overflow-hidden">
            <div class="box-discuss border-box-discuss overflow-hidden"  data-aos="fade-right">
                <div class="row">
                    <div class="col-12 col-lg-1 col-md-1">
                        <div class="w-100 mt-2">
                            <div class="image-box-discuss rounded-circle">
                                <img src="{{$data->User->image}}" class="w-100 rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-10 me-md-4 me-xl-0">
                        <div class="d-sm-block d-md-flex justify-content-between">
                            <h2 class="mt-2 text-center">
                                <i class="fa-solid fa-thumbtack fa-fw fa-shake"></i>
                                <a href="#">{{$data->title}}</a>
                            </h2>
                            <div class="btn-report text-center">
                                <button><a>{{__('lang.report')}}</a></button>
                            </div>

                        </div>


                        <div class="w-100 line-discuss"></div>
                        <div class="d-sm-block d-md-flex">
                            <div class="d-flex flex-wrap justify-content-between align-items-center w-50 icons-discuss">
{{--                                <div  data-id="{{$data->id}}" class="like">--}}
{{--                                    <i class="fa-solid fa-thumbs-up fa-fw"></i>--}}
{{--                                    {{$data->likes}}--}}
{{--                                </div>--}}
                                <div>
                                    <i class="fa-solid fa-calendar fa-fw"></i>
                                    {{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}
                                </div>
                                <div>
                                    <i class="fa-solid fa-comments fa-fw"></i>
                                    {{$data->Answers->count()}} {{__('lang.Answers')}}
                                </div>
                                <div>
                                    <i class="fa-solid fa-eye fa-fw"></i>
                                    {{$data->view}} {{__('lang.views')}}
                                </div>
                                <div class="explainer rounded-3 text-center">
                                    By {{$data->User->name}}
                                </div>
                            </div>

                            <div class="add-answer ">
                                <button data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_askQuestion" >{{__('lang.Add Answer')}}</button>
                            </div>
                        </div>
                        <br>
                        <div class="w-100 line-discuss"></div>

                        <p >
                            {!! $data->description !!}
                        </p>
                    </div>
                </div>
            </div>
            @if(isset($Answers))
            <div class="row mt-4 overflow-hidden"  data-aos="fade-left">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="answer-box">
                        <div class="bg-answer">
                            <h2> <span>{{$data->Answers->count()}}</span>{{__('lang.Answers')}}</h2>
                        </div>
                        @foreach($Answers as $key => $answer)
                        <div class="pe-4">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                <div class="person-answer d-flex">
                                    <div class="person-answer-img rounded-circle">
                                        <img src="{{$answer->User->image}}" alt="" class="w-100 rounded-circle">
                                    </div>
                                    <div class="person-name pe-md-4 pt-2">
                                        <h4>{{$answer->User->name}}</h4>
                                        <span>{{\Carbon\Carbon::parse($answer->created_at)->diffForHumans()}} </span>
                                    </div>

                                </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-11   col-10">
                                    {!! $answer->description !!}
                                </p>
                                </div>
                            </div>


                        </div>
                        @if($key+1 != count($Answers))
                        <hr>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
                @endif
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
                    <form id="" class="form" enctype="multipart/form-data" method="post" action="{{url('store-Answer')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">




                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.Answer')}}</label>
                                <input type="hidden" value="{{$data->id}}" name="question_id">
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
    <script>
    $('.like').on('click',function () {
        var id = $(this).data('id');
        $.ajax({
            url: '{{url("Add-like")}}',
            type: "get",
            data: {'id': dataList, _token: CSRF_TOKEN},
            dataType: "JSON",
            success: function (data) {
                if (data.message == "Success") {
                    $('.fa-thumbs-up').css("color", "gold");

                } else {
                    Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                }
            },
            fail: function (xhrerrorThrown) {
                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
            }
        });

    })
    </script>
@endsection

