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
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/theme-default.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/chat.css')}}" />
    <script src="{{ asset('pharmacy/assets/js/config.js')}}"></script>

    {{-- Front Style start --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <style>
        @import url('http://fonts.cdnfonts.com/css/tajawal?styles=19782,19779,19780,19781,19777,19778,19776');

        html {
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            width: 1rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: linear-gradient(60deg, var(--main-color) 0%, var(--secondary-color) 100%);
        }
                body {
            font-family: "Tajawal", sans-serif;
            font-weight: normal;
            font-style: normal;
            /* color: #7C869A; */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #333;
            --light-black: #777;
            --main-color: #2B547A;
            --hover-main: #4688C7;
            --secondary-color: #57ABFA;
            --hover-secondary: #A3D0FB;
            --bg-sec: #f6f4fa;
            --border: .2rem solid var(--main-color);
            --radius: .5rem;
            --font-type: 'Tajawal', sans-serif;
            --fs-p: 1.7rem;
            --fs-span: 1rem;
        }
      .navbar-brand {
            padding: 0;
            width: 100%;
            max-width: 155px;
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
            /* background-color: #ffffff; */
        }
        .back-to-top.btn-hover {
    position: fixed;
    z-index: 99999;
}

.back-to-top:hover {
    color: #fff;
}

*:focus {
    outline: none;
}


/*===== All Button Style =====*/

.main-btn {
    display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 0;
    padding: 16px 38px;
    font-weight: 600;
    font-size: 18px;
    border-radius: var(--radius);
    color: #fff;
    cursor: pointer;
    z-index: 5;
    background: var(--main-color);
    transition: all 0.4s ease-out 0s;
}

.main-btn:hover {
    color: #fff;
}

.btn-hover {
    position: relative;
    z-index: 1;
    overflow: hidden;
}

.btn-hover::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    top: 0;
    left: 0;
    z-index: -1;
    transition: all 0.3s ease-out 0s;
}

.btn-hover:hover::after {
    width: 100%;
}



    </style>
    {{-- Front Style end --}}
  </head>

  <body style="direction: rtl;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container mx-sm-3">
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
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
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
