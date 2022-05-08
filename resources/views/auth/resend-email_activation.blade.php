@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:145px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">لم يصلك  <span>رابط تفعيل الحساب ؟</span></h3>
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
                    <form  action="{{ route('resend-email-activation') }}" method="POST">
                        @csrf
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input type="email" class="form-control rounded" placeholder="example@gmail.com"  name="email" required>
                            </div>


                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                ارسال رابط التفعيل 
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

 @stop























{{--
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>تذكر كلمة المرور </title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/contact.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/style.css') }}">


</head>

<body style="direction: rtl;">



  <section class="h-100 gradient-form div-center" >
    <div class="container py-5 h-100" style="height: 2em; ">
    @if (session('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('status') }}
                </div>
            @endif

      <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -3em;">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0" >
              <div class="col-lg-6 x" >
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                  <img src="{{ asset('auth/images/1553191-673ab7.svg') }}"
                    style="width: 4empx;height: 6em;" alt="logo">

                    <h2 class="heading" style=" letter-spacing: 0;font-size: 3em;">  <span>هل نسيت كلمة المرور؟ </span></h2>
                  </div>

                  <form action="{{ route('forget-password') }}" method="POST">
                  @csrf
                    <div class="row">
                      <div class="input-group input-3">
                        <input type="email" placeholder="الايميل" class="input-control" name="email" required>
                     </div>


                      </div>


                      <div class="row">
                        <div class="input-group" >
                          <button type="submit" class="submit-btn2" >تغيير كلمة  المرور</button>
                        </div>
                      </div>

                 <div class="container">

                      <p class="small mb-5 pb-lg-2" style="margin-top: 2em;"><a class="text-muted" href="#!" style="color: var(--black);
                        text-decoration: none; font-size: 1.6rem;" >هل تذكرت؟</a></p>
                      <p> <a href="{{ route('login') }}" style="color: #0a58ca;" > سجل الدخول الان</a></p>
                    </div>
                    <p class="small" style="margin-bottom: -2em;color: var(--black);font-size: 1.6rem;"></p>

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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html> --}}
