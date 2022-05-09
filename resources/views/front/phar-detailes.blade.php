@extends('layouts.masterFront')

    @section('content')

    <!--====== BANNER PART START ======-->
	<section class="banner-area bg_cover">
		<div class="container">

		</div>
	</section>

	<!--====== BANNER PART END ======-->

    <!-- Card -->
    <div class="d-flex justify-content-center py-5 w-auto m-5 col-6"style="position: relative; top:1%;margin:5rem; direction:rtl;">
        <img src="{{ asset('uploads/avaters/pharmacy/'.$pharmacy->avater)}}" class="rounded-circle">
        <div class="text col-6">
            <h3>{{ $pharmacy->name }} </h3>
            <p>  أهلا بك في  {{ $pharmacy->name }}, نوفر جميع مستلزماتك الطبية والحياتية </p>
            <ul class="social text-center d-flex align-content-center justify-content-center align-self-center col-6">
                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled pr-2"></i></a></li>
                <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled pr-2"></i></a></li>
                <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled pr-2"></i></a></li>
                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original pr-2"></i></a></li>
            </ul>
            <div class="pharmacy-bottom">
                <a href="javascript:void(0)" class="main-btn col-6"><i class="lni lni-checkmark-circle"></i> تقديم طلب</a>
            </div>

        </div>
    </div>
@stop
