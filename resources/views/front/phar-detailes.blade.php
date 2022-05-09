@extends('layouts.masterFront')

    @section('content')

<style>
    .card {
        margin-top: 12em;
        position: relative;
        right: 50%;
        left: 30%;
        padding: 1.5em 0.5em 0.5em;
        border-radius: 2em;
        text-align: center;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);


        }
        @media  (max-width: 991px){
            .card {
            position: relative;
                right: 1rem;
                left: 1rem;
        padding: .5em 0 0;


            }
        }
        .card img {
        width: 50%;
        height:  60%;
        border-radius: 50%;
        margin: .5rem auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .card .card-title {
        font-weight: 700;
        font-size: 1.5em;
        }
        .card .btn {
        border-radius: var(--radius);
        background-color: var(--main-color);
        color: #ffffff;
        padding: 0.5em 1.5em;
        }
        .card .btn:hover {
        background-color:var(--main-color);
        color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .banner-area{
            height: 50%;
        }
</style>

<div>
    <div class="card" style="width: 55rem; max-width: 100%;">
        <div class="banner-area rounded-3 ">
            <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" class="card-img-top" alt="">
        </div>
    <div class="card-body">
        <h5 class="card-title">صيدلية الحياة </h5>
        <p class="card-text"> أهلا بك في صيدلية الحياة, نوفر جميع مستلزماتك الطبية والحياتية</p>
        <ul class="social text-center d-flex align-content-center justify-content-center align-self-center col-12">
                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled pr-3"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled pr-3"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled pr-3"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original pr-3"></i></a></li>
                </ul>
        <a href="#" class="btn">تقديم طلب</a>
    </div>
    </div>
</div>

@stop

 <!--====== BANNER PART START ======-->

    {{-- <section class="align-content-center"  style="width: 100%; margin-inline-start: ;">

            <div class="col-lg-12 d-flex justify-center">
                <div class="single-pharmacylist-view px-5">
                    <div class="pharmacy-img banner-area bg_cover">
                        <img src="Front/assets/images/pharmacy/pharma.jpg" alt="" class="rounded-circle px-5">
                    </div>

                  <div class="pharmacy-content p-5">
                    <ul class="address">
                        <h3 class="name py-2" style="text-align: right;">
                        <a href="">صيدلية الحياة
                            <i class="lni lni-user  p-2"></i>  </a></h3>
                        <li style="text-align: right;" class="">
                            <a href="javascript:void(0)" > تعز المسبح
                                <i class="lni lni-map-marker p-2"></i>
                            </a>
                        </li>
                        <li>
                            <p class="p-2">  أهلا بك في صيدلية الحياة, نوفر جميع مستلزماتك الطبية والحياتية </p>
                        </li>
                    </ul>
                    <ul class="social text-center d-flex align-content-center justify-content-center align-self-center col-6">
                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled pr-2"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled pr-2"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled pr-2"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original pr-2"></i></a></li>
                    </ul>
                    <div class="pharmacy-bottom">
                        <a href="javascript:void(0)" class="main-btn col-12 p-2"><i class="lni lni-checkmark-circle"></i> تقديم طلب</a>
                    </div>
                </div>
                </div>
            </div>

	</section> --}}
