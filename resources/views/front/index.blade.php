@extends('layouts.masterFront')


    @section('content')
  <!-- ads section start -->
      @include('includes.FrontAdsShow')
    <!-- ads section ends -->

    <!-- Search Pharmacy section start -->
     @include('includes.FrontSearch')
    <!-- Search Pharmacy section ends -->
        <!-- pharmacies section starts  -->
        <section class="pharmacies" id="pharmacies">

            <!-- <h2 class="heading"><span> الصيدليات</span>المشتركة لدينا </h2> -->
            <h2 class="heading">our <span>pharmacies</span></h2>

            <div class="box-container">

            @foreach ($pharmacies as $pharmacy)
                <div class="box">
                    <img src="{{ asset('uploads/pharmacy/avater/').'/'.$pharmacy->avater }}" alt="">
                    <h3>{{ $pharmacy->name }}</h3>
                    <span><i class="fa-solid fa-location-dot"></i> almesbah district</span>
                    <p><i class="fa-solid fa-circle-info"></i> Lorem ipsum dolor</p>

                    <div class="share">
                        <a href="{{ $pharmacy->phone }}" class="fas fa-phone"></a>
                        <a href="#" class="fa-solid fa-comments"></a>
                        <a href="mailTo:{{ $pharmacy->email }}" class="fas fa-user-circle"></a>
                    </div>
                </div>
            @endforeach
                
            </div>
        </section>
        <!-- pharmacies section ends -->

    @stop
