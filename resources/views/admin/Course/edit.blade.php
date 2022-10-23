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
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/Pages') }}" class="text-gray-600 text-hover-primary">{{__('lang.Pages')}}</a>
        </li>

        <!--end::Item-->
        <!--begin::Item-->
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
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-Course')}}" class="form"
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
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.ar_title')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ar_title"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم" value="{{$employee->ar_title}}"  required/>
                                <input type="hidden" value="{{$employee->id}}" name="id">
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.en_title')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="en_title"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم" value="{{$employee->en_title}}"  required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.slug')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="slug" value="{{$employee->slug}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم"  required/>

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.price')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="price" value="{{$employee->price}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم"  required/>

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">{{__('lang.is_discount')}}
                                        ؟</label>
                                    <input class="form-check-input" name="is_discount" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_discount" type="checkbox"  @if($employee->is_discount == 'active')  checked @endif
                                           value="active" id="flexSwitchDefault"
                                    />
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.discount_price')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="discount_price" value="{{$employee->discount_price}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="0"  />

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.course_time')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="time" value="{{$employee->time}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder=""  />

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.MainCategory')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control " required id="maincat" name="main_category_id">
                                    @inject('MainCategory','App\Models\Category')
                                    @foreach($MainCategory->where('is_active','active')->get() as $cat)
                                        <option @if($cat->id == $employee->main_category_id) selected @endif value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.SubCategory')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                @inject('subCategroy','App\Models\SubCategory')
                                <select class="form-control"  required id="subcat" name="sub_category_id">
                                    <option value="{{$employee->sub_category_id}}">{{$subCategroy->findOrFail($employee->sub_category_id)->title}}</option>
                                </select>
                                <!--end::Input-->
                            </div>


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.ar_description')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="ar_description" id="editor1"
                                          rows="5" class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder=""  required>{{$employee->ar_description}}</textarea>


                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.en_description')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="en_description" id="editor2"
                                          rows="5" class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder=""  required>{{$employee->en_description}}</textarea>


                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.ar_long_description')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="ar_long_description" id="editor3"
                                          rows="5" class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder=""  required>{{$employee->ar_long_description}}</textarea>


                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.en_long_description')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="en_long_description" id="editor4"
                                          rows="5" class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder=""  required>{{$employee->en_long_description}}</textarea>


                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
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
                                           @if($employee->is_active == 'active')  checked @endif/>
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">{{__('lang.is_popular')}}
                                        ؟</label>
                                    <input class="form-check-input" name="is_popular" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_popular" type="checkbox"
                                           value="active" id="flexSwitchDefault"
                                           @if($employee->is_popular == 'active')  checked @endif/>
                                </div>
                            </div>
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
    <script src="https://cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>

    <script>
        $('.dropify').dropify();
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );

    </script>
    <script>
        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>



@endsection


