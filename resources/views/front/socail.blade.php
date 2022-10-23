@inject('Setting','App\Models\Setting')

<div class="col-lg-12 col-md-12 col-12">
    <ul class="menu-social" data-aos="fade-down-left">
        <li class="social-color"><a href="{{$Setting->find(1)->facebook}}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
        <li class="social-color"><a href="{{$Setting->find(1)->instagram}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
        <li class="social-color"><a href="{{$Setting->find(1)->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
        <li class="social-color"><a href="{{$Setting->find(1)->twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
    </ul>
</div>
