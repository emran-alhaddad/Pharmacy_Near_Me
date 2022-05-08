@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:105px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">تسجيل<span>دخول</span></h3>
                    </div>
                     @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {!! session('error') !!}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif
                    <form  action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="p-4">

                             {{-- <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control rounded" placeholder="اسم المستخدم" name="name" required>
                            </div> --}}

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input type="email" value="{{ old('email') }}" placeholder="الايميل"  name="email" class="form-control rounded @error('email') border-danger @enderror">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3 rounded">
                                <span class="input-group-text rounded"style="background-color: var(--main-color)"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password"  placeholder="كلمة المرور" name="password" class="form-control rounded @error('password') border-danger @enderror">
                                 @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                دخول
                            </button>
                            <p class="text-center mt-5">ليس لديك حساب؟

                                <span class="text-primary"> <a href="{{ route('register') }}">تسجيل حساب</a></span>
                            </p>
                          <p class="text-center text-primary"> <a href="{{ route('forget-password') }}">نسيت كلمة المرور؟</a></p>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="footer-widget about">
                                    <ul class="social text-center d-flex justify-content-center">
                                    <p class="text-center ml-1">أو يمكنك الدخول عبر  </p>
                                        <li class="m-1"><a href="{{ route('facebook-client') }}"><i class="lni lni-facebook-filled btn-submit p-1"></i></a></li>
                                        <li class="m-1"><a href="{{ route('google-client') }}"><i class="lni lni-google btn-submit p-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @stop























{{-- <!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>تسجيل الدخول</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/style.css') }}">


</head> --}}
{{--
<body style="direction: rtl;">
	<!--====== HEADER PART START ======-->

	@include('includes.FrontHeader') --}}

	{{-- <!--====== HEADER PART ENDS ======-->
    <section class="h-100 gradient-form div-center">
        <div class="container py-5 h-100" style="height: 2em; ">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}

            {{-- <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -3em;">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 x">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">


                                        <h2 class="heading" style=" letter-spacing: 0;"> <span>تسجيل
                                                الدخول</span></h2>
                                    </div>

                                    <form action="{{ route('login') }}" method="POST"
                                        class="contact3-form validate-form">
                                        @csrf

                                        <div class="row">
                                            <div class="input-group input-3">
                                                <input type="email" placeholder="الايميل" class="input-control"
                                                    name="email" required>
                                            </div>
                                            <div class="input-group input-3">
                                                <input type="password" placeholder="كلمة المرور" class="input-control"
                                                    name="password" required>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="input-group">
                                                <button type="submit" class="submit-btn2">دخول</button>
                                            </div>
                                        </div>

                                        <div class="container">

                                            <p class="small  pb-lg-2" style="margin-top: 1em;"><a class="text-muted"
                                                    href="{{ route('forget-password') }}" style="color: var(--black);
                        text-decoration: none; font-size: 1.6rem;">هل نسيت كلمة المرور؟</a><br>
                                            </p>
                                            <p>ليس لديك حساب سابق؟ <a href="{{ route('register') }}"
                                                    style="color: #0a58ca;"> سجل الان</a></p>
                                        </div>
                                        <p class="small"
                                            style="margin-bottom: -1em;color: var(--black);font-size: 1.6rem;">او يمكتك
                                            الدخول عبر </p>
                                        <div class="share2" style="padding-top: 2rem;">

                                            <a href="{{ route('facebook-client') }}"
                                                class="fa-brands fa-facebook"></a>
                                            <a href="{{ route('google-client') }}" class="fa-brands fa-google"></a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html> --}}
