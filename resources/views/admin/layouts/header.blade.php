<!--begin::Header-->
<!--begin::Header-->
<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container-xxl sabi d-flex flex-grow-1 flex-stack">
        <!--begin::Header Logo-->
        <div class="d-flex align-items-center me-5">
            <!--begin::Heaeder menu toggle-->
            <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                 id="kt_header_menu_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                              fill="black"/>
                        <path opacity="0.3"
                              d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                              fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Heaeder menu toggle-->
            <!--begin::Logo-->
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{asset('admin/logo2.png')}}" class="h-25px h-lg-60px"/>
            </a>
            <!--end::Logo-->

        </div>
        <!--end::Header Logo-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-center">
            <!--begin::Toolbar wrapper-->
            <div class="topbar d-flex align-items-stretch flex-shrink-0" id="kt_topbar">

                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                            @if(session('lang') == 'en')
                                <a href="{{url('lang/ar')}}" class="navi-link">
                                    <img class="h-20px w-20px rounded-sm"
                                         src="{{asset('/admin/assets/media/flags/egypt.svg')}}"
                                         alt=""/>
                                </a>
                            @else
                                <a href="{{url('lang/en')}}" class="navi-link">

                                    <img class="h-20px w-20px rounded-sm"
                                         src="{{asset('/admin/assets/media/flags/uk.svg')}}"
                                         alt=""/>
                                </a>
                            @endif

                        </div>
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Dropdown-->
                    <div
                        class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Nav-->
                        <ul class="navi navi-hover py-4">

                            <li class="navi-item">
                                @if(session('lang') == 'en')
                                    <a href="{{url('lang/ar')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">

                                                    <img
                                                        src="{{asset('/dashboard/assets/media/flags/egypt.svg')}}"
                                                        alt=""/>

                                            </span>
                                        العربية

                                    </a>
                                @elseif(session('lang') == 'ar')
                                    <a href="{{url('lang/en')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                 <img
                                                     src="{{asset('/dashboard/assets/media/flags/uk    .svg')}}"
                                                     alt=""/>

                                            </span>

                                        English
                                    </a>

                                @else
                                    <a href="{{url('lang/ar')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">

                                                    <img
                                                        src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}"
                                                        alt=""/>

                                            </span>


                                    </a>

                                @endif
                            </li>

                        </ul>
                        <!--end::Nav-->
                    </div>
                    <!--end::Dropdown-->
                </div>

                <!--begin::Notifications-->
                <div class="d-flex align-items-center ms-2 ms-lg-3">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-color-warning position-relative w-30px h-30px w-md-40px h-md-40px"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                    fill="black"/>
                                <path
                                    d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                    fill="black"/>
                                <path opacity="0.3"
                                      d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                      fill="black"/>
                                <path opacity="0.3"
                                      d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                             style="background-image:url('{{asset('admin/assets/media/misc/pattern-1.jpg')}}')">
                            <!--begin::Title-->
                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">اشعارات العملاء الجدد
                                <span
                                    class="fs-8 opacity-75 ps-3"></span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active"
                                       data-bs-toggle="tab" href="#kt_topbar_notifications_1">طلبات العملاء الجديده</a>
                                </li>

                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                <!--begin::Items-->
                                <div class="scroll-y mh-325px my-5 px-8">
                                </div>
                                <!--end::Items-->
                                <!--begin::View more-->
                                <div class="py-3 text-center border-top">
                                    <a href="/Requests"
                                       class="btn btn-color-gray-600 btn-active-color-primary">عرض الكل
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                  transform="rotate(-180 18 13)" fill="black"/>
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon--></a>
                                </div>
                                <!--end::View more-->
                            </div>
                            <!--end::Tab panel-->

                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Notifications-->

                <!--begin::inbox-->
                <div class="d-flex align-items-center ms-2 ms-lg-3">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-color-success position-relative w-30px h-30px w-md-40px h-md-40px"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.3"
                                      d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                      fill="black"/>
                                <rect x="6" y="12" width="7" height="2" rx="1" fill="black"/>
                                <rect x="6" y="7" width="12" height="2" rx="1" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    <!--end::Svg Icon-->
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                             style="background-image:url('{{asset('admin/assets/media/misc/pattern-1.jpg')}}')">
                            <!--begin::Title-->
                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">اشعارات البريد
                            </h3>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">

                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active"
                                       data-bs-toggle="tab" href="#kt_topbar_notifications_3">جديد البريد</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">

                            <!--begin::Tab panel-->
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_3" role="tabpanel">
                                <!--begin::Items-->
                                <div class="scroll-y mh-325px my-5 px-8">

                                <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                <!--begin::View more-->
                                <div class="py-3 text-center border-top">
                                    <a href="../../demo16/dist/pages/profile/activity.html"
                                       class="btn btn-color-gray-600 btn-active-color-primary">عرض الكل
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                  transform="rotate(-180 18 13)" fill="black"/>
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon--></a>
                                </div>
                                <!--end::View more-->
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::inbox-->

                <!--begin::Quick links-->
                <div class="d-flex align-items-center ms-2 ms-lg-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-color-danger w-30px h-30px w-md-40px h-md-40px"
                         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"/>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
                             style="background-image:url('{{asset('admin/assets/media/misc/pattern-1.jpg')}}')">
                            <!--begin::Title-->
                            <h3 class="text-white fw-bold mb-3">الوصول السريع</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin:Nav-->
                        <div class="row g-0">
                            <!--begin:Item-->
                            <div class="col-6">
                                <a href="/Contracts"
                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M15.8 11.4H6C5.4 11.4 5 11 5 10.4C5 9.80002 5.4 9.40002 6 9.40002H15.8C16.4 9.40002 16.8 9.80002 16.8 10.4C16.8 11 16.3 11.4 15.8 11.4ZM15.7 13.7999C15.7 13.1999 15.3 12.7999 14.7 12.7999H6C5.4 12.7999 5 13.1999 5 13.7999C5 14.3999 5.4 14.7999 6 14.7999H14.8C15.3 14.7999 15.7 14.2999 15.7 13.7999Z"
                                                  fill="black"/>
                                            <path
                                                d="M18.8 15.5C18.9 15.7 19 15.9 19.1 16.1C19.2 16.7 18.7 17.2 18.4 17.6C17.9 18.1 17.3 18.4999 16.6 18.7999C15.9 19.0999 15 19.2999 14.1 19.2999C13.4 19.2999 12.7 19.2 12.1 19.1C11.5 19 11 18.7 10.5 18.5C10 18.2 9.60001 17.7999 9.20001 17.2999C8.80001 16.8999 8.49999 16.3999 8.29999 15.7999C8.09999 15.1999 7.80001 14.7 7.70001 14.1C7.60001 13.5 7.5 12.8 7.5 12.2C7.5 11.1 7.7 10.1 8 9.19995C8.3 8.29995 8.79999 7.60002 9.39999 6.90002C9.99999 6.30002 10.7 5.8 11.5 5.5C12.3 5.2 13.2 5 14.1 5C15.2 5 16.2 5.19995 17.1 5.69995C17.8 6.09995 18.7 6.6 18.8 7.5C18.8 7.9 18.6 8.29998 18.3 8.59998C18.2 8.69998 18.1 8.69993 18 8.79993C17.7 8.89993 17.4 8.79995 17.2 8.69995C16.7 8.49995 16.5 7.99995 16 7.69995C15.5 7.39995 14.9 7.19995 14.2 7.19995C13.1 7.19995 12.1 7.6 11.5 8.5C10.9 9.4 10.5 10.6 10.5 12.2C10.5 13.3 10.7 14.2 11 14.9C11.3 15.6 11.7 16.1 12.3 16.5C12.9 16.9 13.5 17 14.2 17C15 17 15.7 16.8 16.2 16.4C16.8 16 17.2 15.2 17.9 15.1C18 15 18.5 15.2 18.8 15.5Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">التعاقدات</span>
                                    <span class="fs-7 text-gray-400"></span>
                                </a>
                            </div>
                            <!--end:Item-->
                            <!--begin:Item-->
                            <div class="col-6">
                                <a href="/inbox2"
                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">البريد الوارد</span>
                                    <span class="fs-7 text-gray-400"></span>
                                </a>
                            </div>
                            <!--end:Item-->
                            <!--begin:Item-->
                            <div class="col-6">
                                <a href="/projects"
                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">قائمة الرحلات</span>
                                    <span class="fs-7 text-gray-400"></span>
                                </a>
                            </div>
                            <!--end:Item-->
                            <!--begin:Item-->
                            <div class="col-6">
                                <a href="/Requests"
                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                  fill="black"/>
                                            <path
                                                d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fs-5 fw-bold text-gray-800 mb-0">العملاء الجدد</span>
                                    <span class="fs-7 text-gray-400"></span>
                                </a>
                            </div>
                            <!--end:Item-->
                        </div>
                        <!--end:Nav-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Quick links-->
                <!--begin::User-->
                <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                         data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{asset('admin/assets/media/avatars/150-26.jpg')}}" alt="@if(Auth::guard('admin')->check()){{Auth::guard('admin')->user()->name}} @elseif(Auth::guard('instructor')->check()) {{Auth::guard('instructor')->user()->name}} @endif"/>
                    </div>
                    <!--begin::Menu-->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{asset('admin/assets/media/avatars/150-26.jpg')}}"/>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div
                                        class="fw-bolder d-flex align-items-center fs-5">
                                        @if(Auth::guard('admin')->check())
                                            {{Auth::guard('admin')->user() ? Auth::guard('admin')->user()->name : ""}}
                                        @elseif(Auth::guard('instructor')->check())
                                            {{Auth::guard('instructor')->user() ? Auth::guard('instructor')->user()->name : ""}}
                                        @endif
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                    </div>
                                    <a href="#"
                                       class="fw-bold text-muted text-hover-primary fs-7">
                                        @if(Auth::guard('admin')->check())
                                            {{Auth::guard('admin')->user() ? Auth::guard('admin')->user()->phone : ""}}
                                        @elseif(Auth::guard('instructor')->check())
                                            {{Auth::guard('instructor')->user() ? Auth::guard('instructor')->user()->phone : ""}}
                                        @endif
                                    </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo16/dist/account/overview.html" class="menu-link px-5">الصفحة الشخصية</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo16/dist/pages/projects/list.html" class="menu-link px-5">
                                <span class="menu-text">مشاريعي</span>
                                <span class="menu-badge">
                                    <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                                </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <!--end::Menu item-->
                        <!--begin::Menu item-->

                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <!--end::Menu item-->
                        <!--begin::Menu item-->

                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="{{url('logout')}}" class="menu-link px-5">تسجيل الخروج</a>

                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User -->
                <!--begin::Heaeder menu toggle-->
                <!--end::Heaeder menu toggle-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
    <!--begin::Container-->
    <div class="header-menu-container d-flex align-items-stretch flex-stack h-lg-75px w-100" id="kt_header_nav">
        <!--begin::Menu wrapper-->
        <div class="header-menu container-xxl sabi flex-column align-items-stretch flex-lg-row" data-kt-drawer="true"
             data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
             data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
             data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle" data-kt-swapper="true"
             data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
            <!--begin::Menu-->

            @if(Auth::guard('admin')->check())
            <div
                class="menu menu-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch flex-grow-1"
                id="#kt_header_menu" data-kt-menu="true">
                <div class="menu-item  @if(Request::segment(1) == '') here show @endif  menu-lg-down-accordion me-lg-1">
                    <a class="menu-link  py-3"
                       href="{{url('Dashboard')}}">
                        <span class="menu-title ">{{__('lang.control_panel')}}</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>
                <div
                    class="menu-item   @if(Request::segment(1) == 'Clients') here show @endif menu-lg-down-accordion me-lg-1">
                    <a class="menu-link py-3" href="{{url('Students')}}">
                        <span class="menu-title">{{__('lang.students')}} </span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>
                <div
                    class="menu-item   @if(Request::segment(1) == 'Instructors') here show @endif menu-lg-down-accordion me-lg-1">
                    <a class="menu-link py-3" href="{{url('Instructors')}}">
                        <span class="menu-title">{{__('lang.Instructors')}} </span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>


                <div
                    class="menu-item @if(Request::segment(1) == 'Courses') here show @endif menu-lg-down-accordion me-lg-1">
                    <a class="menu-link py-3" href="{{url('Courses')}}">
                        <span class="menu-title">{{__('lang.Courses')}}</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>
                <div
                    class="menu-item   @if(Request::segment(1) == 'Packages') here show @endif menu-lg-down-accordion me-lg-1">
                    <a class="menu-link py-3" href="{{url('Packages')}}">
                        <span class="menu-title">{{__('lang.Packages')}} </span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>
{{--                <div--}}
{{--                    class="menu-item   @if(Request::segment(1) == 'Pages') here show @endif menu-lg-down-accordion me-lg-1">--}}
{{--                    <a class="menu-link py-3" href="{{url('Pages')}}">--}}
{{--                        <span class="menu-title">الصفحات التعريفة </span>--}}
{{--                        <span class="menu-arrow d-lg-none"></span>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                     class="menu-item menu-lg-down-accordion me-lg-1">
                    <span
                        class="menu-link @if(Request::segment(1) == "CompanyPayments-Setting" ||
                        Request::segment(1) == "CompanyPayments--edit" ||
                        Request::segment(1) == "Payments-edit" ||
                         Request::segment(1) == "Payments-Setting"

                                              ) active @endif py-3">
                        <span class="menu-title">عمليات الدفع</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Payments-Setting')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "Payments-Setting" || Request::segment(1) == "Payments-Setting-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Payments-Setting"|| Request::segment(1) == "Payments-edit") text-active-primary active @endif ">

                                    عمليات الدفع العملاء
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('CompanyPayments-Setting')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "CompanyPayments-Setting" || Request::segment(1) == "CompanyPayments-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == ""|| Request::segment(1) == "CompanyPayments-edit") text-active-primary active @endif ">

                                        عمليات دفع المدربين
                                      </span>
                            </span>
                            </a>
                        </div>

                    </div>
                </div>

                <div
                    class="menu-item   @if(Request::segment(1) == "Questions_setting" ||
                        Request::segment(1) == "Questions-edit" ||
                     Request::segment(1) == "Questions-Answers" ||
                      Request::segment(1) == "Answers-edit"
  ) here show @endif menu-lg-down-accordion me-lg-1">
                    <a class="menu-link py-3" href="{{url('Questions_setting')}}">
                        <span class="menu-title">{{__('lang.Questions')}} </span>
                        <span class="menu-arrow d-lg-none"></span>
                    </a>
                </div>
                >
                <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                     class="menu-item menu-lg-down-accordion me-lg-1">
                    <span
                        class="menu-link @if(Request::segment(1) == "CareersCategories" ||
                        Request::segment(1) == "CareersCategories-edit" ||
                     Request::segment(1) == "CareersCities" ||
                      Request::segment(1) == "CareersCities-edit" ||
                       Request::segment(1) == "Careers-edit"  ||
                     Request::segment(1) == "Careers_setting"||
                                            Request::segment(1) == "Internship-edit"  ||
                     Request::segment(1) == "Internship_setting"


                                              ) active @endif py-3">
                        <span class="menu-title">{{__('lang.CareersSetting')}}</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Careers_setting')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "Careers_setting" || Request::segment(1) == "Careers_setting-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Careers_setting"|| Request::segment(1) == "Careers-edit") text-active-primary active @endif ">

                                        {{__('lang.Careers')}}
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Internship_setting')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "Internship_setting" || Request::segment(1) == "Internship-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Internship_setting"|| Request::segment(1) == "Internship-edit") text-active-primary active @endif ">

                                        {{__('lang.Internships')}}
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('CareersCities')}}">
                            <span
                                class="menu-link @if( Request::segment(1) == "CareersCities" || Request::segment(1) == "CareersCities-edit"  ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "CareersCities"|| Request::segment(1) == "CareersCities-edit") text-active-primary active @endif ">

                                        {{__('lang.CareersCities')}}
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('CareersCategories')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "CareersCategories" || Request::segment(1) == "CareersCategories-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "CareersCategories"|| Request::segment(1) == "CareersCategories-edit") text-active-primary active @endif ">

                                        {{__('lang.CareersCategories')}}
                                      </span>
                            </span>
                            </a>
                        </div>


                    </div>
                </div>


                <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                     class="menu-item menu-lg-down-accordion me-lg-1">
                    <span
                        class="menu-link @if(Request::segment(1) == "Admins" ||
                        Request::segment(1) == "Admin-edit" ||
                     Request::segment(1) == "Categories" ||
                     Request::segment(1) == "SubCategories" ||
                      Request::segment(1) == "SubCategory-edit" ||
                       Request::segment(1) == "Category-edit"  ||
                     Request::segment(1) == "Pages" ||
                     Request::segment(1) == "edit-Pages"  ||
                                          Request::segment(1) == "Faq_settings" ||
                                          Request::segment(1) == "Setting" ||
                     Request::segment(1) == "Faq-edit"||
                     Request::segment(1) == 'HowToUse'
                                              ) active @endif py-3">
                        <span class="menu-title">{{__('lang.Setting')}}</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">

                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Pages')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "Pages" || Request::segment(1) == "Pages-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Pages"|| Request::segment(1) == "Pages-edit") text-active-primary active @endif ">

                                        {{__('lang.Pages')}}
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Categories')}}">
                            <span
                                class="menu-link @if( Request::segment(1) == "Categories" || Request::segment(1) == "SubCategories" || Request::segment(1) == "SubCategory-edit" || Request::segment(1) == "Category-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Categories"|| Request::segment(1) == "Category-edit") text-active-primary active @endif ">

                                        {{__('lang.Categories')}}
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('Faq_settings')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "Faq_settings" || Request::segment(1) == "Faq-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Faq"|| Request::segment(1) == "Faq-edit") text-active-primary active @endif ">

                                        {{__('lang.Faq')}}
                                      </span>
                            </span>
                            </a>
                        </div>

                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="/Admins">
                            <span
                                class="menu-link @if(Request::segment(1) == "Admins" || Request::segment(1) == "employee-edit" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Admins"|| Request::segment(1) == "employee-edit") text-active-primary active @endif ">

                                        الموظفين
                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('HowToUse','instructor')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "HowToUse" && Request::segment(2) == "instructor")  active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "HowToUse" && Request::segment(2) == "instructor") text-active-primary active @endif ">

                                        {{__('lang.HowToUseInstructor')}}

                                      </span>
                            </span>
                            </a>
                        </div>
                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="{{url('HowToUse','student')}}">
                            <span
                                class="menu-link @if(Request::segment(1) == "HowToUse" && Request::segment(2) == "student" ) active @endif py-3">
                                <span class="menu-icon ">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>

                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "HowToUse" && Request::segment(2) == "student" ) text-active-primary active @endif ">

                                        {{__('lang.HowToUseStudent')}}

                                      </span>
                            </span>
                            </a>
                        </div>

                        <div data-kt-menu-placement="right-start"
                             class="menu-item menu-lg-down-accordion">
                            <a href="/Setting">
                            <span class="menu-link @if(Request::segment(1) == "Setting") active @endif py-3">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                fill="black"/>
                                            <path
                                                d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                  fill="black"/>
                                            <path opacity="0.3"
                                                  d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                  fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title  @if(Request::segment(1) == "Setting") text-active-primary active @endif">{{__('lang.Setting')}} </span>
                            </span>
                            </a>
                        </div>

                    </div>
                </div>



            </div>
            @elseif(Auth::guard('instructor')->check())
                <div
                    class="menu menu-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch flex-grow-1"
                    id="#kt_header_menu" data-kt-menu="true">
                    <div class="menu-item  @if(Request::segment(1) == '') here show @endif  menu-lg-down-accordion me-lg-1">
                        <a class="menu-link  py-3"
                           href="{{route('InstractorDashboard')}}">
                            <span class="menu-title ">{{__('lang.control_panel')}}</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>


                    <div
                        class="menu-item @if(Request::segment(1) == 'Courses') here show @endif menu-lg-down-accordion me-lg-1">
                        <a class="menu-link py-3" href="{{route('InstractorCourses')}}">
                            <span class="menu-title">{{__('lang.Courses')}}</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>

                    <div
                        class="menu-item @if(Request::segment(1) == 'media') here show @endif menu-lg-down-accordion me-lg-1">
                        <a class="menu-link py-3" href="{{route('media.index')}}">
                            <span class="menu-title">{{__('lang.MediaManger')}}</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>
                    <div
                        class="menu-item   @if(Request::segment(1) == 'Students') here show @endif menu-lg-down-accordion me-lg-1">
                        <a class="menu-link py-3" href="{{url('Students')}}">
                            <span class="menu-title">{{__('lang.students')}} </span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>
                    <div
                        class="menu-item   @if(Request::segment(1) == 'HowToUseInstuctor') here show @endif menu-lg-down-accordion me-lg-1">
                        <a class="menu-link py-3" href="{{url('HowToUseInstuctor')}}">
                            <span class="menu-title">{{__('lang.HowToUse')}} </span>
                            <span class="menu-arrow d-lg-none"></span>
                        </a>
                    </div>
                    {{--                <div--}}
                    {{--                    class="menu-item   @if(Request::segment(1) == 'Pages') here show @endif menu-lg-down-accordion me-lg-1">--}}
                    {{--                    <a class="menu-link py-3" href="{{url('Pages')}}">--}}
                    {{--                        <span class="menu-title">الصفحات التعريفة </span>--}}
                    {{--                        <span class="menu-arrow d-lg-none"></span>--}}
                    {{--                    </a>--}}
                    {{--                </div>--}}

                </div>
                @endif
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
