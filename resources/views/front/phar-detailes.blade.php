@extends('layouts.masterFront')

    @section('content')

    <!--====== BANNER PART START ======-->
	{{-- <section class="banner-area bg_cover">
		<div class="container">

		</div>
	</section> --}}

	<!--====== BANNER PART END ======-->
<section class="mt-5 shadow" style="direction: rtl">
  <div class="container py-5 mt-5">
    <div class="row d-flex justify-content-center align-items-center mt-5">
      <div class="col col-lg-9 col-xl-7 mt-5">
        <div class="card mt-5">
          <div class="rounded-top search-area text-white d-flex flex-row  banner-area bg_cover" style=" height:470px;">
            <div class="ms-4 d-flex flex-column " style="width: 150px; z-index: 1000000;">
              <img src="{{ asset('uploads/avaters/pharmacy/'.$pharmacy->avater)}}"
                alt="Generic placeholder image" class="img-fluid img-thumbnail  mb-2"
                style="width: 150px; z-index: 100000; background-color: var(--main-color);">
              <button type="button" class="btn btn-outline-light" data-mdb-ripple-color="dark"
                style="z-index: 1000;">
                تقديم طلب
              </button>
            </div>

            <div class="ms-3 text-white" style="margin-top:2px;">
              <h5 style="color: #f8f9fa">{{ $pharmacy->name }}</h5>
              <p style="color: #f8f9fa">
                <i class="lni lni-map-marker"></i>
                  {{ $pharmacy->Cname }} - {{ $pharmacy->Zname }}
              </p>
               <div class="">
                    <div class="d-flex justify-content-end text-center flex-wrap">
                    <div class="social">
                        <!-- <p class="mb-1 h5">253</p> -->
                        <p class="small text-muted mb-0"><a href="javascript:void(0)"><i class="lni lni-facebook-filled pr-2"></i></a></p>
                    </div>
                    <div class="px-3 social">
                    <a href="javascript:void(0)"><i class="lni lni-whatsapp pr-2"></i></a>

                    </div>
                    <div class="social">

                    <a href="javascript:void(0)"><i class="lni lni-phone pr-2"></i></a>
                    </div>
                    </div>
                </div>
            </div>

          </div>

          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1"> أهلا بك في {{ $pharmacy->name }} نوفر جميع مستلزماتك الطبية والحياتية </p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">عن الصيدليـــة </p>
                <p class="font-italic mb-1">{{ $pharmacy->description }}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
