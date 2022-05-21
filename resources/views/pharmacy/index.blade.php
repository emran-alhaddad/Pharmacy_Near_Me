@extends ('layouts.masterPharmacy')

@section('phar_profile_content')

    <style>
        .card {
            position: relative;
            text-align: center;
            min-height: 100vh;

        }

        @media (max-width: 991px) {
            .card img {
                min-width: 50%;
                min-height: 50%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }
        }

        .card img {
            width: 20%;
            height: 30%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card .card-title {
            font-weight: 700;
            font-size: 1.5em;
        }

    </style>
    <section class="card">
        <div class="banner-area"></div>
        <div class=" radius search-area">
            <img src="{{ asset('uploads/avaters/pharmacy/' . $pharmacy->avater) }}" class="radius image_show"
                alt="Pharmacy Logo">
        </div>
        <div class="card-body">
            <h5 class="card-title py-2">{{ $pharmacy->name }}</h5>
            <p class="card-text py-2"> أهلا بك في {{ $pharmacy->name }}, نوفر جميع مستلزماتك الطبية والحياتية</p>
            <ul class="social text-center d-flex align-content-center justify-content-center align-self-center col-12 py-3">
                <li class="btn-hover"><a href="javascript:void(0)"><i class="lni lni-facebook-filled pr-3"></i></a></li>
                <li class="btn-hover"><a href="javascript:void(0)"><i class="lni lni-twitter-filled pr-3"></i></a></li>
                <li class="btn-hover"><a href="javascript:void(0)"><i class="lni lni-instagram-filled pr-3"></i></a>
                </li>
                <li class="btn-hover"><a href="javascript:void(0)"><i class="lni lni-linkedin-original pr-3"></i></a>
                </li>
            </ul>

            <a href="{{ route('add-order', $pharmacy->id) }}" class="main-btn btn-hover py-2 col-sm-2">تقديم طلب</a>
        </div>
        <div class="container-sm mt-3">
            @if (session('error'))
                <div class="alert alert-danger" style="direction: rtl;" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" style="direction: rtl;" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </section>


@stop
