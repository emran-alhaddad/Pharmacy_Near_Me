@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:105px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">انشاء <span> حساب</span></h3>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
                            {!! session('error') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                            {!! session('status') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input value="{{ old('name') }}" type="text" placeholder="اسم المستخدم" name="name"
                                    class="form-control rounded @error('name') border-danger @enderror">
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input type="email" value="{{ old('email') }}" placeholder="example@gmail.com"
                                    name="email" class="form-control rounded @error('email') border-danger @enderror">
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

                            <div class="input-group mb-3 rounded" id="show_hide_password">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class=" rounded form-control" placeholder="تأكيد كلمة المرور "
                                    name="confirmed">
                                @error('confirmed')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="input-group mb-3 rounded">
                                <div class="dropdown col-12">
                                    <select name="user_type" id="user_type" class="col-12 rounded form-control">
                                        <option value="client">مستخدم</option>
                                        <option value="pharmacy">صيدلي</option>
                                    </select>
                                </div>
                            </div>



                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                                دخول
                            </button>
                            <p class="text-center mt-5"> لديك حساب؟

                                <span class="text-primary"> <a href="{{ route('login') }}">الدخول للحساب</a></span>
                            </p>

                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="footer-widget about">
                                    <ul class="social text-center d-flex justify-content-center">
                                        <p class="text-center ml-1">أو يمكنك التسجيل عبر </p>
                                        <li class="m-1 btn-hover"><a href="{{ route('facebook-client') }}"
                                                id="facebook"><i
                                                    class="lni lni-facebook-filled btn-submit p-1 btn-hover"></i></a></li>
                                        <li class="m-1 btn-hover"><a href="{{ route('google-client') }}" id="google"><i
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#user_type').on('change', function(event) {

                switch ($(this).val()) {
                    case "client":
                        $("#facebook").attr('href', "{{ route('facebook-client') }}");
                        $("#google").attr('href', "{{ route('google-client') }}");
                        break;
                    case "pharmacy":
                        $("#facebook").attr('href', "{{ route('facebook-pharmacy') }}");
                        $("#google").attr('href', "{{ route('google-pharmacy') }}");
                        break;
                }
            });
        });
    </script>
@stop
