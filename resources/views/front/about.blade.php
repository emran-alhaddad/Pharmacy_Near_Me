@extends('layouts.masterFront')

@section('content')

    <style>
        body {
            margin-top: 20px;
            /* background-color: #f0f6ff; */
            direction: rtl;
            text-align: justify;
        }


        /*timeline About Us*/

        .main-timeline2 {
            overflow: hidden;
            position: relative
        }

        .main-timeline2:before {
            content: "";
            width: 5px;
            height: 70%;
            background: var(--main-color);
            position: absolute;
            top: 70px;
            left: 50%;
            transform: translateX(-50%)
        }

        .main-timeline2 .timeline-content:before,
        .main-timeline2 .timeline:before {
            top: 50%;
            transform: translateY(-50%);
            content: ""
        }

        .main-timeline2 .timeline {
            width: 50%;
            padding-left: 100px;
            float: right;
            position: relative
        }

        .main-timeline2 .timeline:before {
            width: 20px;
            height: 20px;
            border-radius: var(--radius);
            background: #fff;
            border: 5px solid var(--main-color);
            position: absolute;
            left: -10px
        }

        .main-timeline2 .timeline-content {
            display: block;
            padding-left: 150px;
            position: relative
        }

        .main-timeline2 .timeline-content:before {
            width: 90px;
            height: 10px;
            border-top: 7px dotted var(--main-color);
            position: absolute;
            left: -92px
        }

        .main-timeline2 .year {
            display: inline-block;
            width: 120px;
            height: 120px;
            line-height: 100px;
            border-radius: var(--radius);
            border: 10px solid var(--hover-main);
            font-size: 30px;
            color: var(--hover-main);
            text-align: center;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, .4);
            position: absolute;
            top: 0;
            left: 0
        }

        .main-timeline2 .year:before {
            content: "";
            /* border-left: 20px solid var(--hover-main);
                        border-top: 10px solid transparent;
                        border-bottom: 10px solid transparent; */
            position: absolute;
            bottom: -13px;
            right: 0;
            transform: rotate(45deg)
        }

        .main-timeline2 .inner-content {
            padding: 20px 0
        }

        .main-timeline2 .title {
            font-size: 24px;
            color: var(--hover-main);
            text-transform: uppercase;
            margin: 0 0 5px
        }

        .main-timeline2 .description {
            font-size: 14px;
            color: #6f6f6f;
            margin: 0 0 5px
        }

        .main-timeline2 .timeline:nth-child(2n) {
            padding: 0 100px 0 0
        }

        .main-timeline2 .timeline:nth-child(2n) .timeline-content:before,
        .main-timeline2 .timeline:nth-child(2n) .year,
        .main-timeline2 .timeline:nth-child(2n):before {
            left: auto;
            right: -10px
        }

        .main-timeline2 .timeline:nth-child(2n) .timeline-content {
            padding: 0 150px 0 0
        }

        .main-timeline2 .timeline:nth-child(2n) .timeline-content:before {
            right: -92px
        }

        .main-timeline2 .timeline:nth-child(2n) .year {
            right: 0
        }

        .main-timeline2 .timeline:nth-child(2n) .year:before {
            right: auto;
            left: 0;
            border-left: none;
            border-right: 20px solid var(--hover-main);
            transform: rotate(-45deg)
        }

        .main-timeline2 .timeline:nth-child(2) {
            margin-top: 110px
        }

        .main-timeline2 .timeline:nth-child(odd) {
            margin: -110px 0 0
        }

        .main-timeline2 .timeline:nth-child(even) {
            margin-bottom: 80px
        }

        .main-timeline2 .timeline:first-child,
        .main-timeline2 .timeline:last-child:nth-child(even) {
            margin: 0
        }

        .main-timeline2 .timeline:nth-child(2n) .year {
            border-color: var(--hover-main);
            color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(2) .year:before {
            border-right-color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(2n) .title {
            color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(3n) .year {
            border-color: var(--hover-main);
            color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(3) .year:before {
            border-left-color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(3n) .title {
            color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(4n) .year {
            border-color: var(--hover-main);
            color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(4) .year:before {
            border-right-color: var(--hover-main)
        }

        .main-timeline2 .timeline:nth-child(4n) .title {
            color: var(--hover-main)
        }

        @media only screen and (max-width:1200px) {
            .main-timeline2 .year {
                top: 50%;
                transform: translateY(-50%)
            }
        }

        @media only screen and (max-width:990px) {
            .main-timeline2 .timeline {
                padding-left: 75px
            }

            .main-timeline2 .timeline:nth-child(2n) {
                padding: 0 75px 0 0
            }

            .main-timeline2 .timeline-content {
                padding-left: 130px
            }

            .main-timeline2 .timeline:nth-child(2n) .timeline-content {
                padding: 0 130px 0 0
            }

            .main-timeline2 .timeline-content:before {
                width: 68px;
                left: -68px
            }

            .main-timeline2 .timeline:nth-child(2n) .timeline-content:before {
                right: -68px
            }
        }

        @media only screen and (max-width:767px) {
            .main-timeline2 {
                overflow: visible
            }

            .main-timeline2:before {
                height: 100%;
                top: 0;
                left: 0;
                transform: translateX(0)
            }

            .main-timeline2 .timeline:before,
            .main-timeline2 .timeline:nth-child(2n):before {
                top: 60px;
                left: -9px;
                transform: translateX(0)
            }

            .main-timeline2 .timeline,
            .main-timeline2 .timeline:nth-child(even),
            .main-timeline2 .timeline:nth-child(odd) {
                width: 100%;
                float: none;
                text-align: center;
                padding: 0;
                margin: 0 0 10px
            }

            .main-timeline2 .timeline-content,
            .main-timeline2 .timeline:nth-child(2n) .timeline-content {
                padding: 0
            }

            .main-timeline2 .timeline-content:before,
            .main-timeline2 .timeline:nth-child(2n) .timeline-content:before {
                display: none
            }

            .main-timeline2 .timeline:nth-child(2n) .year,
            .main-timeline2 .year {
                position: relative;
                transform: translateY(0)
            }

            .main-timeline2 .timeline:nth-child(2n) .year:before,
            .main-timeline2 .year:before {
                border: none;
                border-right: 20px solid var(--hover-main);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                top: 50%;
                left: -23px;
                bottom: auto;
                right: auto;
                transform: rotate(0)
            }

            .main-timeline2 .timeline:nth-child(2n) .year:before {
                border-right-color: var(--hover-main)
            }

            .main-timeline2 .timeline:nth-child(3n) .year:before {
                border-right-color: var(--hover-main)
            }

            .main-timeline2 .timeline:nth-child(4n) .year:before {
                border-right-color: var(--hover-main)
            }

            .main-timeline2 .inner-content {
                padding: 10px
            }
        }

    </style>


    <!--====== HERO PART START ======-->
    <section class="banner-area bg_cover shadow" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="text-white">انضم لنا وانقل عملك لمستوى اخر</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}"> الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> عن الموقع </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== HERO PART END ======-->


    <!--====== SEARCH PART START ======-->
    @include('includes.FrontSearch')
    <!--====== SEARCH PART END ======-->

    <main class="about-us py-4 mt-5">

        <div class="container  about-left">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline2">
                        <div class="timeline">
                            <a href="#" class="timeline-content">
                                <span class="year about-right wow fadeInRight px-2 shadow" data-wow-delay=".4s"><img
                                        src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" id="logo"
                                        clasd="btn-hover" alt="Logo"></span>
                                <div class="inner-content">
                                    <div class="section-title align-left">
                                        <span class="wow fadeInDown" data-wow-delay=".2s">ماذا نقدم؟ </span>
                                        <h2 class="wow fadeInUp title" data-wow-delay=".4s">موقع يلبي تطلعاتك </h2>
                                        <p class="wow fadeInUp description" data-wow-delay=".6s">علاجي هو موقع وسيط يربط بين
                                            الصيدلية
                                            ك مقدم خدمة وبين
                                            المستخدم اللذي يتطلع للحصول على خدمة من الصيدلية يمكنك الاطلاع على التفاصيل ضمن
                                            الفئة التي تنمتمي اليها
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="timeline-content">
                                <span class="year about-right wow fadeInRight shadow"><i class="lni lni-user"></i></span>
                                <div class="inner-content">
                                    <span class="wow fadeInDown" data-wow-delay=".2s">ليس لديك حساب في موقعنا بعد؟</span>
                                    <h3 class="title">زائر للموقع</h3>
                                    <p class="description fade show">
                                        أهلا بك معنا , عزيزي المستخدم بصفتك زائر لنا في التصفح الصيدليات المشتركة لدينا في
                                        الموقع وتصفح الصفحات المتاحة , كما يمكنك اضافة اعلان أو التواصل معنا وللمزيد من
                                        الصلاحيات قم بالتسجيل الان وابدأ
                                    </p>
                                </div>
                                <a href="{{ route('register') }}" class="border p-2 px-3 radius float-end">
                                    انضم الان
                                </a>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="timeline-content">
                                <span class="year about-right wow fadeInRight  shadow"><i
                                        class="lni lni-money-location"></i></span>
                                <div class="inner-content">
                                    <span class="wow fadeInDown" data-wow-delay=".2s"> هل أنت صاحب صيدلية؟ </span>
                                    <h3 class="title">صيدلية</h3>
                                    <p class="description">
                                        ماذا تنتظر انضم لنا وكن من الرواد في عملك لتحقيق ربح
                                        أكبر
                                    </p>

                                </div>
                                <a href="{{ route('register') }}" class="border p-2 px-3 radius account-btn btn-hover">
                                    انضم الان
                                </a>
                            </a>
                        </div>
                        <div class="timeline">
                            <a href="#" class="timeline-content">
                                <span class="year about-right wow fadeInRight shadow"><i
                                        class="lni lni-customer"></i></span>
                                <div class="inner-content">
                                    <span class="wow fadeInDown" data-wow-delay=".2s"> لديك حساب في موقعنا؟</span>
                                    <h3 class="title">مستخدم</h3>
                                    <p class="description">
                                        عزيزي العميل أهلا بك معنا, بصفتك عميل في موقعنا فهذا يعني أن
                                        بامكانك
                                        تصفح الصيدليات
                                        المشتركة لدينا في الموقع وتصفح الصفحات , كما يمكنك اضافة اعلان أو التواصل
                                        معنا وتقديم طلب مباشر لأي صيدلية لدينا , لست مضطرا للخروخ من منزلك للحصول على
                                        احتياجاتك من الصيدلية لدينا خدمة توصيل ودفع الكتروني.
                                    </p>
                                    <ul>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i>البحث عن تصفح الصيدليات في الموقع
                                        </li>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i> اضافة اعلان</li>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i> التواصل معنا </li>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i>التواصل والطلب من الصيدليات في
                                            الموقع</li>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i>الدفع الإلكتروني </li>
                                        <li><i class="lni lni-checkmark-circle pe-2"></i> التوصيل </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>





@stop
