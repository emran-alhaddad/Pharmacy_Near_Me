@extends('layouts.masterFront')


@section('content')
    <!--====== BANNER PART START ======-->
    <section class="banner-area bg_cover" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="text-white">جميع صيدليات علاجي</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}"> الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> الصيدليات </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== BANNER PART END ======-->

    <!-- Search Pharmacy section start -->
    @include('includes.FrontSearch')
    <!-- Search Pharmacy section ends -->


    <!--====== PHARMACIES PART START ======-->
    <section class="pharmacy-area mt-5" style="direction: rtl;">
        <div class="container">
            <!-- <div class="pharmacy-top box-style">
        <div class="row align-items-center">
        </div>
       </div> -->

            <!-- pharmacy wrapper -->
            <div class="pharmacy-wrapper">
                <div class="row">

                    <!-- left-wrapper  -->
                    <div class="col-lg-8">
                        <div class="left-wrapper">


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">

                                    <div class="row">

                                        @foreach ($pharmacies as $pharmacy)
                                            <div class="col-lg-12">
                                                <div class="single-pharmacylist-view">
                                                    <div class="pharmacy-img ">
                                                        <a href="{{ route('detailes', $pharmacy->id) }}">
                                                            <img src="{{ asset('uploads/avaters/pharmacy/'.$pharmacy->avater)}}"
                                                                alt="{{ $pharmacy->name }}">
                                                        </a>
                                                    </div>

                                                    <div class="pharmacy-content p-5">
                                                        <h3 class="name p-5"><a href="product-details.html">
                                                                <i class="lni lni-user"></i> {{ $pharmacy->name }} </a>
                                                        </h3>
                                                        <ul class="address ">
                                                            <li>
                                                                <a href="javascript:void(0)"><i
                                                                        class="lni lni-map-marker"></i>{{ $pharmacy->Cname }}
                                                                    -
                                                                    {{ $pharmacy->Zname }}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="pharmacy-bottom">
                                                            <a href="javascript:void(0)" class="main-btn col-12"><i
                                                                    class="lni lni-checkmark-circle"></i> تقديم طلب</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>

                                </div>

                                <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">

                                    <div class="row">

                            @foreach ($pharmacies as $pharmacy)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-pharmacy">
                                        <div class="pharmacy-img">
                                                <a href="{{ route('detailes', $pharmacy->id) }}">
                                                    <img src="{{ asset('uploads/avaters/pharmacy/'.$pharmacy->avater)}}"
                                                        alt="{{ $pharmacy->name }}">
                                                </a>
                                        </div>

                                        <div class="pharmacy-content">
                                            <h3 class="name"><a href="product-details.html">
                                                    <i class="lni lni-user"></i>{{ $pharmacy->name }} </a></h3>
                                            <ul class="address">
                                                <li>
                                                    <a href="javascript:void(0)"><i
                                                                class="lni lni-map-marker"></i>{{ $pharmacy->Cname }}
                                                            -
                                                            {{ $pharmacy->Zname }}</a>
                                                </li>
                                            </ul>
                                            <div class="pharmacy-bottom">
                                                <a href="javascript:void(0)" class="main-btn col-12"><i
                                                        class="lni lni-checkmark-circle"></i> تقديم طلب</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                    </div>

                                </div>



                            </div>



                        </div>
                    </div>

                    <!-- sidebar wrapper  -->
                    <div class="col-lg-4">
                        <div class="sidebar-wrapper">
                         <!-- adds box -->
                            <div class="box-style add-box">
                                <h3 class="mb-30">اعلانات</h3>
                                <div class="image">
                                    <a href="javascript:void(0)" class="d-block">
                                        <img src="Front/assets/images/pharmacy/ad-img.jpg" alt="" class="w-100">
                                    </a>
                                </div>
                            </div>
                               <!-- Style Cards -->
                            {{-- <div class=" col-md-12">
                                <div class="right-wrapper">


                                </div>
                            </div> --}}

                              <div class="box-style social-box">
                                <h3 class="mb-30">عرض المزيد </h3>

                                <ul class="">
                                 <div class="demo-inline-spacing col-md-12">
                                        <!-- Basic Pagination -->
                                        <nav aria-label="Page navigation">
                                        <ul class="pagination ">
                                            <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"
                                                ><i class="lni lni-arrow-right"></i
                                            ></a>
                                            </li>

                                            <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                            </li>
                                            <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                            </li>
                                            <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                            </li>
                                            <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                            </li>
                                            <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                            </li>
                                            <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"
                                                > <i class="lni lni-arrow-left"></i
                                            ></a>
                                            </li>
                                        </ul>
                                        </nav>
                                        <!--/ Basic Pagination -->
                                    </div></ul>
                            </div>

                            <!-- social box -->
                            {{-- <div class="box-style social-box">
                                <h3 class="mb-30">Follow Us</h3>

                                <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div> --}}

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--====== PHARMACIES PART END ======-->




@stop
