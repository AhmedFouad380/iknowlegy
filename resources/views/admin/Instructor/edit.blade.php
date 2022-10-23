@extends('admin.layouts.master')

@section('css')
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">{{__('lang.edit')}}</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/Dashboard') }}" class="text-gray-600 text-hover-primary">{{__('lang.control_panel')}}</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">{{__('lang.Instructors')}}</li>
{{--        <li class="breadcrumb-item text-gray-500">{{__('lang.edit')}}</li>--}}

        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{__('lang.edit')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form"  enctype="multipart/form-data" action="{{url('update-Instructor')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.image')}}  </label>

                                <div class="form-group row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title"></h4>
                                                <div class="controls">
                                                    <input type="file" id="input-file-now" class="dropify"  name="image" data-default-file="{{$employee->image}}"   data-validation-required-message="{{trans('word.This field is required')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.name')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم" value="{{$employee->name}}" required/>
                                <!--end::Input-->
                            </div>
                            <input type="hidden" value="{{$employee->id}}" name="id">
                            <!--end::Input group-->  <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.email')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{__('lang.email')}}" value="{{$employee->email}}"
                                       required/>
                                <!--end::Input-->
                            </div>


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.country_code')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="txtPhone" type="text" name="code"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{__('lang.country_code')}}" value="{{$employee->code}}" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" name="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{__('lang.phone')}}" value="{{$employee->phone}}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.password')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="كلمة المرور" value="" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.password_confirmation')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password_confirmation"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="تأكيد كلمة المرور" value="" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.address')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{__('lang.address')}}" value="{{$employee->address}}" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.about')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea rows="4" type="text" name="about"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder="{{__('lang.about')}}" value="" > {{$employee->about}} </textarea>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">linked</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input  type="text" name="linked" value="{{$employee->linked}}"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="" >
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">facebook</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input  type="text" name="facebook" value="{{$employee->facebook}}"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="" >
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">twitter</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input  type="text" name="twitter" value="{{$employee->twitter}}"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="" >
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">skype</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input  type="text" name="skype" value="{{$employee->skype}}"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="" >
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">{{__('lang.status')}}
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_active" type="checkbox"
                                           value="active" id="flexSwitchDefault"
                                           @if($employee->is_active == 'active') checked @endif />
                                </div>
                            </div>
                            <!--end::Input group-->


                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{__('lang.cancel')}}</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{__('lang.save')}}
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/css/dropify.min.css" integrity="sha512-XS4z2x4/njM0ACHTf0QRI/mgWzv2/B4wxD/7JDoUeBvHDhdhFiE7Z3hzevia3pbyr16ufKB6/NUyQ/hBGEAMDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/js/dropify.min.js" integrity="sha512-wxJL2RnxGAn2d92YTYdRLjrgIW5fAlhVnnq35EAU7Mmkg4v93cOiPxX/RpG1CCHpoSr6VNcx++6CgQ3B3FoD9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script>

        $("#city2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state2').html($data);
                });
            }
        });

        $("#country2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city2').html($data);
                });
            }
        });
    </script>



@endsection

