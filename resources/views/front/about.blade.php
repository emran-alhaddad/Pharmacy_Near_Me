@extends('layouts.masterFront')

@section('content')


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


    <!-- Start About Us Area -->
    <section class="about-us section p-4 mt-4" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="section-title align-left">
                            <span class="wow fadeInDown heading" data-wow-delay=".2s">ماذا نقدم </span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">موقع يلبي تطلعاتك </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">علاجي هو موقع وسيط يربط بين الصيدلية ك مقدم خدمة
                                وبين المستخدم اللذي يتطلع للحصول على خدمة من الصيدلية يمكنك الاطلاع على التفاصيل ضمن الفئة
                                التي تنمتمي اليها في الأسفل ا </p>
                        </div>
                        <div class="about-tab wow fadeInUp" data-wow-delay=".4s">
                            <!-- Nav Tab  -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab1"
                                        role="tab">الزائر </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab2"
                                        role="tab">الصيدلية </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab3"
                                        role="tab">المستخدم </a></li>
                            </ul>
                            <!--/ End Nav Tab -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active shadow  p-3" id="t-tab1" role="tabpanel">
                                    <div class="tab-content">
                                        <p>أهلا بك معنا , عزيزي المستخدم بصفتك زائر لنا في الموقع بامكانك تصفح الصيدليات
                                            المشتركة لدينا في الموقع وتصفح الصفحات المتاحه , كما يمكنك اضافة اعلان أو
                                            التواصل معنا وللمزيد من الصلاحيات قم بالتسجيل الان و ابدأ بلا بل بلا</p>
                                        <ul>
                                            <li><i class="lni lni-checkmark-circle"></i>البحث عن تصفح الصيدليات في الموقع
                                            </li>
                                            <li><i class="lni lni-checkmark-circle"></i> اضافة اعلان</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التواصل معنا </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Tab 1 -->
                                <!-- Tab 2 -->
                                <div class="tab-pane fade shadow  p-3" id="t-tab2" role="tabpanel">
                                    <div class="tab-content">
                                        <p>هل أنت صاحب صيدلية ؟! ماذا تنتظر انضم لنا وكن من الرواد في عملك بامكانك تحقيق ربح
                                            أكبر و بلا بلا بلا</p>

                                    </div>
                                </div>
                                <!--/ End Tab 2 -->
                                <!-- Tab 3 -->
                                <div class="tab-pane fade shadow p-3" id="t-tab3" role="tabpanel">
                                    <div class="tab-content">
                                        <p>أهلا بك معنا , عزيزي المستخدم بصفتك زائر لنا في الموقع بامكانك تصفح الصيدليات
                                            المشتركة لدينا في الموقع وتصفح الصفحات المتاحه , كما يمكنك اضافة اعلان أو
                                            التواصل معنا وللمزيد من الصلاحيات قم بالتسجيل الان و ابدأ بلا بل بلا</p>

                                        <ul>
                                            <li><i class="lni lni-checkmark-circle"></i>البحث عن تصفح الصيدليات في الموقع
                                            </li>
                                            <li><i class="lni lni-checkmark-circle"></i> اضافة اعلان</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التواصل معنا </li>
                                            <li><i class="lni lni-checkmark-circle"></i>التواصل والطلب من الصيدليات في
                                                الموقع</li>
                                            <li><i class="lni lni-checkmark-circle"></i> التوصيل </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Tab 3 -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 pt-5 mt-5 ">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->


@stop
