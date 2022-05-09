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

                            <!-- Style Cards -->
                            <div class=" box-style col-md-12">
                                <div class="right-wrapper">

                                    <ul class="nav pharmacy-view-btnsd-flex justify-content-between" id="myTab"
                                        role="tablist">
                                        <li class="product-view-item" role="presentation">
                                            <h3>طريقة العرض</h3>
                                        </li>
                                        <li class="product-view-item" role="presentation">
                                            <a class="pharmacy-view-btns" id="list-tab" data-toggle="tab" href="#list"
                                                role="tab" aria-controls="list" aria-selected="true"><i
                                                    class="lni lni-list"></i></a>
                                        </li>
                                        <li class="product-view-item" role="presentation">
                                            <a class="pharmacy-view-btns active" id="grid-tab" data-toggle="tab"
                                                href="#grid" role="tab" aria-controls="grid" aria-selected="false"><i
                                                    class="lni lni-grid-alt"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <!-- sidebar pharmacy  -->
                            <div class="box-style sidebar-pharmacy">
                                <h3 class="mb-30"> <i class="lni lni-hourglass"></i> فلترة البحث</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        اسم الصيدليه
                                    </li>
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        المديرية
                                    </li>
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        المربع السكني
                                    </li>


                                </ul>
                            </div>

                            <!-- add box -->
                            <div class="box-style add-box">
                                <h3 class="mb-30">اعلانات</h3>
                                <div class="image">
                                    <a href="javascript:void(0)" class="d-block">
                                        <img src="Front/assets/images/pharmacy/ad-img.jpg" alt="" class="w-100">
                                    </a>
                                </div>
                            </div>

                            <!-- social box -->
                            <!-- <div class="box-style social-box">
            <h3 class="mb-30">Follow Us</h3>

            <ul class="social">
             <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
             <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
             <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
             <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
            </ul>
           </div> -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--====== PHARMACIES PART END ======-->




@stop
