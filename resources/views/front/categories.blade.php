@extends('front.layout')

@section('content')
             <!-- this is the first section filter  -->
            <section class="container">
                <div class="category-title">
                    <div  class="row margin-bottom">
                        <div class="col-md-6">
<!--                            <h6 data-aos="fade-right" class="title-1"></h6>-->
                            <h2 data-aos="fade-right"class="title-1">{{$Cat->title}}</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="gatogries-link" data-aos="fade-left">
<!--                                <a href="categories.html" target="_blank">browse all <i class="fa fa-arrow-right" aria-hidden="true"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-margin">
                    <div class="row">
                        @foreach($subCat as $data)
                        <div class="col-md-3">
                            <a href="{{url('Category',$data->slug)}}">
                            <div class="category-box" data-aos="fade-right">
                                <div class="category-icon">
                                    <svg width="116" height="82" viewBox="0 0 116 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9238 65.8391C11.9238 65.8391 20.4749 72.4177 35.0465 70.036C49.6182 67.6542 75.9897 78.4406 75.9897 78.4406C75.9897 78.4406 90.002 85.8843 104.047 79.2427C118.093 72.6012 115.872 58.8253 115.872 58.8253C115.743 56.8104 115.606 46.9466 97.5579 22.0066C91.0438 13.0024 84.1597 6.97958 75.9458 3.74641C58.8245 -2.99096 37.7881 -0.447684 22.9067 9.81852C15.5647 14.8832 7.65514 22.0695 3.0465 31.5007C-7.27017 52.6135 11.9238 65.8391 11.9238 65.8391Z" fill="currentColor"></path>
                                    </svg>
                                    <div class="category-icon-box">
                                        <img src="{{$data->image}}" style="width:70px">
                                    </div>
                                </div>
                                <div class="category-text">
                                    <h5>{{$data->title}}</h5>
                                    <h6>over {{\App\Models\Course::where('main_category_id',$data->id)->count()}} course</h6>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

             <!-- ender-filtter section -->

             <!-- this is section 2 courses -->
              <!-- end section 2 courses -->
              <!-- end section 2 courses -->

            <!-- this is footer -->
@endsection
