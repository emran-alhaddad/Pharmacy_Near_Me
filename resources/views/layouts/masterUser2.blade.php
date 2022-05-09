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
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/demo.css')}}" />
    <script src="{{ asset('pharmacy/assets/js/config.js')}}"></script>
    lt.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/chat.css')}}" />
    

  </head>

  <body style="direction: rtl;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
                @include('includes.UserAside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                    @include('includes.UserNav')
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




















{{-- <html>

<head>

</head>
<body>
@include('includes.UserHeader')

@yield('phar_profile_content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html> --}}
