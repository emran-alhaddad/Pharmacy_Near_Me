<!--====== HEADER PART START ======-->

<header class="header_area shadow" style="direction: rtl;">
    <div id="header_navbar" class="header_navbar " style="background-color: white; ">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-lg dir">
                        <a class="navbar-brand " href="{{ route('index') }}">
                            <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" id="logo"
                                clasd="btn-hover" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav">
                                <li class="nav-item">
                                    <a class="page-scroll active" href="{{ route('index') }}">الرئيسية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll active" href="{{ route('pharmacies') }}">الصيدليات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll active" href="{{ route('about') }}"> من نحن</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll active" href="{{ route('contact') }}">تواصل معنا</a>
                                </li>
                            </ul>

                        </div>
                        <ul class="header-btn d-md-flex">

                            <!-- In LogIn Case  -->
                            @if (auth()->user())

                                <li class="justify-center">
                                    <a href="#" class="main-btn account-btn">
                                        <span class=""><i class="fas fa-user"></i></span>
                                        {{-- <span class="d-none d-md-block">البروفايل</span> --}}
                                    </a>
                                    <ul class="dropdown-nav dir rounded p-3" style="height: auto;">
                                        @if (auth()->user()->hasRole('admin'))
                                            <li class="btn-hover"><a href="{{ route('admin-dashboard') }}"> <i
                                                        class="fas fa-user me-2"></i>لوحة التحكم</a></li>
                                        @elseif (auth()->user()->hasRole('pharmacy'))
                                            <li class="btn-hover"><a href="{{ route('pharmacy-dashboard') }}"> <i
                                                        class="fas fa-user me-2"></i>لوحة التحكم</a></li>
                                        @else
                                            <li class="btn-hover"><a href="{{ route('client-dashboard') }}"> <i
                                                        class="fas fa-user me-2"></i>لوحة التحكم</a></li>
                                        @endif

                                        <li class="btn-hover"><a href="{{ route('logout') }}"> <i
                                                    class="fas fa-sign-out-alt me-2"></i>
                                                تسجيل خروج</a></li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="main-btn  d-none mr-sm-2 d-md-block btn-hover">دخول</a>
                                </li>
                            @endif

                        </ul>
                        <button class="navbar-toggler " type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header navbar -->
</header>



<!--====== HEADER PART ENDS ======-->
