@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:105px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">انشاء<span>حساب</span></h3>
                    </div>
                    
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                                    name="email"  class="form-control rounded @error('email') border-danger @enderror">
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
                                    name="confirmed" >
                                    @error('confirmed')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- hidde / show pass --}}
                                {{-- <div class="input-group-addon align-content-end">
                                    <a href="">
                                     <i class="bi bi-eye-slash" aria-hidden="true"></i>
                                    </a>
                                </div> --}}
                            </div>


                            <div class="input-group mb-3 rounded">
                                <div class="dropdown col-12">
                                    <select name="user_type" onchange="changePharmacy()"
                                        class="col-12 rounded form-control">
                                        <option value="client">مستخدم</option>
                                        <option value="pharmacy">صيدلي</option>
                                    </select>
                                </div>
                            </div>



                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
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
                                        <li class="m-1"><a href="{{ route('facebook-client') }}"><i
                                                    class="lni lni-facebook-filled btn-submit p-1"></i></a></li>
                                        <li class="m-1"><a href="{{ route('google-client') }}"><i
                                                    class="lni lni-google btn-submit p-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- hidde / show pass --}}
    {{-- <script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_password i').removeClass( "bi bi-eye-fill" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_password i').addClass( "bi bi-eye-fill" );
        }
    });
});
</script> --}}
@stop




















{{-- <!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>انشاء حساب </title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/style.css') }}">
</head>

<body style="direction: rtl;">

    <section class="col-xl-10 gradient-form div-center">
        <div class="container py-5 h-100" style="height: 2em; ">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -3em;">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 x">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">

                                        <h2 class="heading" style=" letter-spacing: 0;"> <span>انشاء الحساب
                                            </span></h2>
                                    </div>

                                    <form action="{{ route('register') }}" method="POST"
                                        class="contact3-form validate-form">
                                        @csrf
                                        <div class="row">
                                            <div class="input-group input-3">
                                                <input type="email" placeholder="اسم المستخدم"
                                                    class="input-control" name="name" required>
                                            </div>
                                            <div class="input-group input-3">
                                                <input type="email" name="email" placeholder="الايميل"
                                                    class="input-control" required>
                                            </div>
                                            <div class="input-group input-3">
                                                <input type="password" name="password" placeholder="كلمة المرور"
                                                    class="input-control" required>
                                            </div>
                                            <div class="input-group input-3">
                                                <input type="password" name="password_confirmation"
                                                    placeholder="تاكيد كلمة المرور" class="input-control" required>
                                            </div>

                                            <div class="input-group input-3">
                                                <div class="dropdown">
                                                    <select name="user_type" onchange="changePharmacy()">
                                                        <option value="client">مستخدم</option>
                                                        <option value="pharmacy">صيدلي</option>
                                                    </select>

                                                </div>
                                            </div>




                                        </div>






                                        <div class="row">
                                            <div class="input-group">
                                                <button type="submit" class="submit-btn2"
                                                    style=" margin-top: 1em;">دخول</button>
                                            </div>
                                        </div>
                                        <p class="small2" style="color: var(--black);font-size: 1.6rem;">اذا كان
                                            لديك حساب اضغط <a href="{{ route('login') }}">دخول</a></p>
                                        <p class="small"
                                            style="margin-bottom: -2em;color: var(--black);font-size: 1.6rem;margin-top:.5em;">
                                            او يمكتك الدخول عبر </p>
                                        <div class="share2" style="padding-top: 3rem;">

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
    </section>
    <script>
        function changePharmacy() {
            document.getElementById('facebook').href = "{{ route('facebook-pharmacy') }}";
            document.getElementById('google').href = "{{ route('google-pharmacy') }}";
        }

        function changeClient() {
            document.getElementById('facebook').href = "{{ route('facebook-client') }}";
            document.getElementById('google').href = "{{ route('google-client') }}";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html> --}}
