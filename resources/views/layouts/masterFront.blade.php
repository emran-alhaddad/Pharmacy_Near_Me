<!doctype html>
<html class="no-js" lang="ar">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Pharmacy Near Me</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

        body {
            font-family: "Tajawal", sans-serif;
            font-weight: normal;
            font-style: normal;
            background: #f4f5f6;
            text-justify: justify;
        }

        a {
            text-decoration: none;
        }

        .heading {
            text-align: center;
            padding-bottom: 1.5rem;
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

        .tns-controls {
            display: none;
        }

        @media (max-width: 991px) {
            input::placeholder {
                font-size: .7rem;
            }
        }

        html ::selection {
            background-color: var(--main-color);
            color: #ffffff;
        }

    </style>
</head>

<body>
    <!--====== HEADER PART START ======-->

    @include('includes.FrontHeader')

    <!--====== HEADER PART ENDS ======-->



    @yield('content')


    <!--====== FOOTER PART START ======-->
    @include('includes.FrontFooter')
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->
    <a href="#" class="back-to-top btn-hover shadow"><i class="lni lni-chevron-up"></i></a>
    <!--====== BACK TOP TOP PART ENDS ======-->


    <!--====== Bootstrap js ======-->
    <script src="{{ asset('Front/assets/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>

    <!--====== Tiny slider js ======-->
    <script src="{{ asset('Front/assets/js/tiny-slider.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('Front/assets/js/wow.min.js') }}"></script>

    <!--====== glightbox js ======-->
    <script src="{{ asset('Front/assets/js/glightbox.min.js') }}"></script>

    <!--====== Selectr js ======-->
    <script src="{{ asset('Front/assets/js/selectr.min.js') }}"></script>

    <!--====== Nouislider js ======-->
    <script src="{{ asset('Front/assets/js/nouislider.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('Front/assets/js/main.js') }}"></script>
    <script>
        //======== tiny slider for feature-pharmacy-carousel
        tns({
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 20,
            nav: false,
            controls: true,
            controlsPosition: 'bottom',
            controlsText: [
                '<span class="prev"><i class="lni lni-chevron-left"></i></span>',
                '<span class="next"><i class="lni lni-chevron-right"></i></span>'
            ],
            container: ".feature-pharmacy-carousel",
            items: 1,
            center: false,
            autoplayTimeout: 500,
            swipeAngle: false,
            speed: 400,
            responsive: {
                768: {
                    items: 2,
                },

                992: {
                    items: 2,
                },

                1200: {
                    items: 3,
                }
            }
        });

        //======== tiny slider for testimonial
        tns({
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 20,
            nav: true,
            controls: false,
            container: ".testimonial-carousel",
            items: 1,
            center: false,
            autoplayTimeout: 500,
            swipeAngle: false,
            speed: 400,
            responsive: {
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
    </script>


</body>

</html>
