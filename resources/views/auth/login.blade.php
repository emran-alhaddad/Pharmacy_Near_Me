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
                        <div class="alert alert-danger alert-dismissible mt-2 me-3 text-center" role="alert">
                            {!! session('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible mt-2 me-3 text-center" role="alert">
                            {!! session('status') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input type="email" value="{{ old('email') }}" placeholder="الايميل" name="email"
                                    class="form-control rounded @error('email') border-danger @enderror">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3 rounded">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" placeholder="كلمة المرور" name="password"
                                    class="form-control rounded @error('password') border-danger @enderror">
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                                دخول
                            </button>
                            <p class="text-center mt-5">ليس لديك حساب؟

                                <span class="text-primary"> <a href="{{ route('register') }}">تسجيل حساب</a></span>
                            </p>
                            <p class="text-center text-primary"> <a href="{{ route('forget-password') }}">نسيت كلمة
                                    المرور؟</a></p>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="footer-widget about">
                                    <ul class="social text-center d-flex justify-content-center">
                                        <p class="text-center ml-1">أو يمكنك الدخول عبر </p>
                                        <li class="m-1 btn-hover"><a href="{{ route('facebook-client') }}"><i
                                                    class="lni lni-facebook-filled btn-submit p-1 btn-hover"></i></a></li>
                                        <li class="m-1 btn-hover"><a href="{{ route('google-client') }}"><i
                                                    class="lni lni-google btn-submit p-1 btn-hover"></i></a></li>
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
