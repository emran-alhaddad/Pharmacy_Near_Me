@extends('layouts.masterFront')


@section('content')

    <!--====== HERO PART START ======-->
    <section id="home" class="hero-area bg_cover shadow" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-9 col-xl-9 col-md-10">
                @foreach($infoSite as $infoSites)
                    <div class="text-center hero-content">
                        <h1 class="mb-30 wow fadeInUp" data-wow-delay=".2s">{{$infoSites->address_main}} </h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s"> {{$infoSites->descripe_main}}  </p><br>
                    </div>
                    {{-- <img class="img-fluid" src="{{ asset('Front/assets/images/1.png') }}"> --}}

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--====== HERO PART END ======-->

    <!--====== SEARCH PART START ======-->
    @include('includes.FrontSearch')
    <!--====== SEARCH PART END ======-->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
            {!! session('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <!--====== PHARMACY SLIDER PART START ======-->
    <section class="feature-pharmacy-area bg_cover mt-5">
        <div class="container">
            <h3 class="heading"><span>علاجي</span> صيدليات </h3>
            <div class="pharmacy-carousel-wrapper">
                <div class="row feature-pharmacy-carousel">
                    @foreach ($pharmacies as $pharmacy)
                        <div class="col-lg-4 col-md-6 col-4">
                            <div class="single-pharmacy col-12 shadow p-3 bg-white radius">
                                <div class="product-img col-12">
                                    <img src="{{ asset('uploads/avaters/pharmacy/' . $pharmacy->avater) }}"
                                        class="radius col-12 " alt="">
                                </div>

                                <div class="pharmacy-content ">
                                    <ul class="address p-2 pr-4">
                                        <h3 class="name p-2" style="text-align: right;">
                                            <a href="{{ route('detailes', $pharmacy->id) }}"> {{ $pharmacy->name }}
                                                </i>
                                            </a>
                                        </h3>
                                        <li style="text-align: right;" class="pr-4">
                                            <a href="javascript:void(0)"> {{ $pharmacy->Cname }} -
                                                {{ $pharmacy->Zname }}
                                                <i class="lni lni-map-marker p-2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="pharmacy-bottom">
                                        <a href="{{ route('add-order', $pharmacy->id) }}"
                                            class="main-btn col-12 p-2 btn-hover shadow">
                                            تقديم طلب
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--====== PHARMACY SLIDER PART ENDS ======-->


    <!--====== SERVICE PART START ======-->
    <section class="service-area pt-5 pb-5" style="direction: rtl;">
        <div class="container">

            <div class="row">
                <div class="mx-auto col-xl-6 col-lg-7 col-md-10">
                    <div class="text-center section-title mb-60">
                        <h1>ماذا سيقدم لك هذا الموقع </h1>

                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

            @foreach($services as $service)

                <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                            <!-- <img src="{{asset("/uploads/service/$service->image")}}"  alt=""> -->
                        </div>
                        <div class="service-content">
                            <h3>{{$service->title}} </h3>
                            <p> {{$service->descripe}}</p>
                        </div>
                    </div>
                </div>

            @endforeach

                <!-- <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="service-content">
                            <h3>الحصول على علاجك بسرعه </h3>
                            <p>من خلال تسهيل عملية البحث عن الصيدليه وتسهيل عملية الطلب بالاضافة الى وجود خدمة التوصيل </p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="service-content">
                            <h3>الحصول على علاجك بسرعه </h3>
                            <p>من خلال تسهيل عملية البحث عن الصيدليه وتسهيل عملية الطلب بالاضافة الى وجود خدمة التوصيل </p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="service-content">
                            <h3>الحصول على علاجك بسرعه </h3>
                            <p>من خلال تسهيل عملية البحث عن الصيدليه وتسهيل عملية الطلب بالاضافة الى وجود خدمة التوصيل </p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="service-content">
                            <h3>الحصول على علاجك بسرعه </h3>
                            <p>من خلال تسهيل عملية البحث عن الصيدليه وتسهيل عملية الطلب بالاضافة الى وجود خدمة التوصيل </p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                    <div class="single-service d-flex justify-content-between shadow">
                        <div class="icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="service-content">
                            <h3>الحصول على علاجك بسرعه </h3>
                            <p>من خلال تسهيل عملية البحث عن الصيدليه وتسهيل عملية الطلب بالاضافة الى وجود خدمة التوصيل </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--====== SERVICE PART ENDS ======-->


    {{-- Forms --}}
    <section>
        <div class="mx-auto col-xl-6 col-lg-7 col-md-10">
            <div class="text-center section-title mb-60">
                <h3 class="heading"><span>الان</span> انضم </h3>
                <p>احرص على متابعة كل جديد على منصتنا للاستفادة من خدماتنا</p>
            </div>
        </div>

        <div class="row container-fluid flex-col d-flex justify-between">

            <div class="radius col-sm-4" style="direction: rtl">
                <div class="col-md-10 col-sm-12 shadow-lg bg-light radius box-style">
                    <div class="text-center">
                        <h5 class="heading p-3" style="font-size: 1.6rem;">قدم طلب لنشر اعلانك في المنصة
                        </h5>
                    </div>
                    <form action="">
                        <div class="p-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control rounded" placeholder="الإسم الرباعي">
                            </div>
                            <div class="input-group mb-3 rounded">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white align-content-end"></i></span>
                                <input type="email" class=" rounded form-control" style="text-align:right"
                                    placeholder="البريدالالكتروني">
                            </div>

                            <div class="input-group mb-3 rounded">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-telephone-fill text-white align-content-end"></i></span>
                                <input type="email" class=" rounded form-control" style="text-align:right"
                                    placeholder="رقم الهاتف ">
                            </div>

                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                                تقديم طلب
                            </button>

                        </div>
                    </form>
                </div>
            </div>

            <div class="radius col-sm-8" style=" direction: rtl; ">
                <div class="col-md-12 col-sm-12 shadow-lg bg-light radius box-style">
                    <img src="Front/assets/images/pharmacy/mainAdds.jpg" style="width: 100%; max-height: 20rem"
                        class="radius">
                </div>
            </div>

        </div>
    </section>


@stop
