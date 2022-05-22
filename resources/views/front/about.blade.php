@extends('layouts.masterFront')

@section('content')




    <!--====== HERO PART START ======-->
    <section class="banner-area bg_cover shadow" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="text-white">انضم لنا وانقل عملك لمستوى اخر</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}"> الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> عن الموقع </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== HERO PART END ======-->

    {{-- payment --}}
    <section id="pay" class="radius" style="direction: rtl; z-index: 0; ">
        <div class="container">
            <div class="contact-head wow fadeInUp p-2 shadow radius" data-wow-delay=".4s">
                <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                    تهانينا تمت عملية الدفع بنجاح
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
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

                <!-- <div class="card shadow col-12 p-3">
                    <div class="container">
                        <div class="d-flex justify-content-between">
                            <a class="navbar-brand col-6 my-3" href="{{ route('index') }}">
                                <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" alt="Logo">
                            </a>
                            <p class="my-3 col-6 " style="font-size: 1.5rem;"><span>فاتورة دفع </span>
                            </p>

                        </div>
                        <div class="row">
                            <div class=" d-flex justify-content-between">
                                <ul class="list-unstyled  p-2 g-1 col-sm-5 text-center">
                                    <li class="text-center">هديل جميل </li>
                                    <li class="text-muted mt-1"><span class="text-var(--main-color)">رقم
                                            الفاتورة</span>
                                        #12345</li>
                                    <li class="text-var(--main-color) mt-1"> 17 ابريل 2021</li>
                                </ul>
                                <ul class="list-unstyled  p-2 g-1 col-sm-5 text-center">
                                    <li class="text-center">هديل جميل </li>
                                    <li class="text-muted mt-1"><span class="text-var(--main-color)">رقم
                                            الفاتورة</span>
                                        #12345</li>
                                    <li class="text-var(--main-color) mt-1"> 17 ابريل 2021</li>
                                </ul>
                            </div>

                            <hr>
                            <div class="row  p-3">
                                <div class="col-xl-9">
                                    <p>بنادول</p>
                                </div>
                                <div class="col-xl-3 ">
                                    <p class="float-end">$50.00
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="row  p-3">
                                <div class="col-xl-10">
                                    <p>بنادول</p>
                                </div>
                                <div class="col-xl-2 ">
                                    <p class="float-end">$50.00
                                    </p>
                                </div>
                                <hr>
                            </div>

                            <div class="row text-var(--main-color)">

                                <div class="col-xl-12 p-3">
                                    <p class="float-start fw-bold">الاجمالي : 100$
                                    </p>
                                </div>
                                <hr style="border: 2px solid var(--main-color);">
                            </div>

                            {{-- <div class="text-center p-4" role="button">
                                <a><u class="text-info">العودة للبروفايل </u></a>
                            </div> --}}

                        </div>
                    </div>
                </div> -->
            </div>
    </section>


    <!--====== SEARCH PART START ======-->
    @include('includes.FrontSearch')
    <!--====== SEARCH PART END ======-->


    <!-- Start About Us Area -->
    <section class="about-us section p-4 mt-4" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="section-title align-left">
                        @foreach($infoSite as $infoSites)
                            <span class="wow fadeInDown heading" data-wow-delay=".2s">ماذا نقدم </span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">{{$infoSites->title_about}} </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"> {!! $infoSites->descripe_about !!}  </p>
                        </div>
                        <div class="about-tab wow fadeInUp" data-wow-delay=".4s">
                            <!-- Nav Tab  -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab1"
                                        role="tab">الزائر </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab2"
                                        role="tab">الصيدلية </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab3"
                                        role="tab">المستخدم </a></li>
                            </ul>
                            <!--/ End Nav Tab -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active shadow  p-3" id="t-tab1" role="tabpanel">
                                    <div class="tab-content">
                                        <p>{!! $infoSites->descripe_ser_client !!}</p>
                                        <ul>
                                            <li><i class="lni lni-checkmark-circle"></i>البحث عن تصفح الصيدليات في الموقع
                                            </li>
                                            <li><i class="lni lni-checkmark-circle"></i> اضافة اعلان</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التواصل معنا </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Tab 1 -->
                                <!-- Tab 2 -->
                                <div class="tab-pane fade shadow  p-3" id="t-tab2" role="tabpanel">
                                    <div class="tab-content">
                                        <p>{!! $infoSites->descripe_ser_phar !!}  </p>

                                    </div>
                                </div>
                                <!--/ End Tab 2 -->
                                <!-- Tab 3 -->
                                <div class="tab-pane fade shadow p-3" id="t-tab3" role="tabpanel">
                                    <div class="tab-content">
                                        <p>{!! $infoSites->descripe_ser_user !!} </p>
                                        <ul>
                                            <li><i class="lni lni-checkmark-circle"></i>البحث عن تصفح الصيدليات في الموقع
                                            </li>
                                            <li><i class="lni lni-checkmark-circle"></i> اضافة اعلان</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التواصل معنا </li>
                                            <li><i class="lni lni-checkmark-circle"></i>التواصل والطلب من الصيدليات في
                                                الموقع</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التوصيل </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Tab 3 -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-6 col-12 pt-5 mt-5 ">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->


@stop
