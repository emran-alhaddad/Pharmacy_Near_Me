<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> Pharmacy- Dashboard</title>
    <meta name="description" content="" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/fonts/boxicons.css')}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/core.css" class="template-customizer-core-css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/theme-default.css" class="template-customizer-theme-css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/demo.css')}}" />
    <script src="{{ asset('pharmacy/assets/js/config.js')}}"></script>

    {{-- Front Style start --}}
     <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('Front/assets/images/favicon.png') }}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/animate.css') }}">

    <!--====== Tiny slider CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/tiny-slider.css') }}">

    <!--====== glightbox CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/glightbox.min.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/LineIcons.2.0.css') }}">

    <!--====== Selectr CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/selectr.css') }}">

    <!--====== Nouislider CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/nouislider.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/bootstrap-5.0.5-alpha.min.css') }}">

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('Front/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <style>
        html {
            /* direction:rtl; */
            font-family: "Droid Arabic Kufi", "Droid Sans", sans-serif;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        .heading {
            text-align: center;
            padding-bottom: 2rem;
            color: var(--black);
            font-size: 3.5rem;
            /* letter-spacing: .4rem; */
        }

        .heading span {
            color: var(--main-color);
        }

        .btn-submit {
            border: var(--border);
            border-radius: var(--radius);
            color: #ffffff;
            background-color: var(--main-color);
        }

        .btn-submit :hover {
            color: var(--main-color);
            background-color: #ffffff;
        }

    </style>
    {{-- Front Style end --}}
  </head>

  <body style="direction: rtl;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
                @include('includes.pharmacy.PharmacyAside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                    @include('includes.pharmacy.PharmacyNav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                     @yield('content')


                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <script src="{{ asset('pharmacy/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('pharmacy/assets/vendor/js/menu.js')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('pharmacy/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('pharmacy/assets/js/pages-account-settings-account.js')}}"></script>

  </body>
</html>
