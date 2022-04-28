
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
      <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -3em;">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0" >
              <div class="col-lg-6 x" >
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="../assets/img/1553191-673ab7.svg"
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

</html>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('auth/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>


    <div class="blob">

        <svg width="900" height="700" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1280.000000pt"
            height="1247.000000pt" viewBox="0 0 1280.000000 1247.000000" preserveAspectRatio="xMidYMid meet">

            <g transform="translate(0.000000,1247.000000) scale(0.100000,-0.100000)" fill="#2196f3" stroke="none">
                <path
                    d="M9555 12464 c-461 -45 -793 -138 -1158 -320 -294 -148 -536 -323 -812 -585 -135 -129 -2468 -2359 -3670 -3509 -2487 -2378 -3078 -2946 -3138 -3009 -320 -341 -565 -789 -683 -1249 -213 -831 -55 -1718 434 -2432 197 -289 505 -603 788 -806 410 -293 851 -464 1384 -536 125 -17 555 -17 680 0 389 53 702 147 1023 308 294 148 536 323 812 585 135 129 2468 2359 3670 3509 2487 2378 3078 2946 3138 3009 320 341 565 789 683 1249 213 831 55 1718 -434 2432 -197 289 -505 603 -788 806 -401 286 -838 459 -1344 530 -100 14 -501 26 -585 18z m380 -1064 c354 -34 674 -157 956 -366 122 -91 306 -268 403 -388 420 -518 552 -1202 351 -1813 -74 -226 -175 -410 -326 -598 -37 -46 -634 -624 -1429 -1385 -750 -718 -1653 -1581 -2005 -1917 l-640 -613 -296 298 c-874 879 -2469 2497 -2467 2502 2 4 476 458 1053 1010 578 553 1451 1387 1940 1855 490 468 919 878 955 910 328 294 730 465 1190 509 80 7 212 5 315 -4z" />
                <path
                    d="M8135 9461 c-16 -10 -78 -68 -137 -128 -103 -105 -108 -112 -108 -152 0 -23 6 -54 14 -69 8 -15 134 -146 280 -292 l266 -265 -264 -265 c-145 -146 -271 -276 -280 -290 -9 -13 -16 -45 -16 -69 0 -44 2 -47 128 -173 124 -124 129 -128 170 -128 24 0 55 6 70 14 15 8 146 134 292 280 l265 266 265 -264 c146 -145 276 -271 290 -280 13 -9 45 -16 69 -16 44 0 47 2 173 128 l128 128 0 49 0 49 -282 283 -283 283 272 273 c149 149 276 282 282 294 15 30 14 79 -3 111 -16 29 -195 209 -236 236 -31 21 -89 21 -120 0 -14 -9 -145 -136 -293 -283 l-267 -266 -273 272 c-149 149 -282 276 -294 282 -32 16 -74 13 -108 -8z" />
            </g>
        </svg>
    </div>


    <div class="bg-contact3">
        <div class="container-contact3">
            <div class="wrap-contact3 " style="height: 485px;">
                <form action="{{ route('forget-password') }}" method="POST" class="contact3-form validate-form"
                    style="direction: rtl;">
                    @csrf
                    <span class="contact3-form-title" style="margin-top: 1em;">
                        هل نسيت كلمة المرور؟
                    </span>

                    <span style="color: rgb(246, 244, 244);font-size: 16x;">لا تقلق فقط ادخل بريدك الالكتروني وسنقوم
                        بارسال رابط كلمة المرور الجديدة</span>
                    <br>
                    <br>
                    <div class="wrap-input3 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input3" type="text" name="email" placeholder=" الايميل ">
                        <span class="focus-input3"></span>
                    </div>


                    <div class="container-contact3-form-btn">
                        <button type="submit" class="contact3-form-btn">
                            تغيير كلمة السر
                        </button>
                    </div>

                    <div class="container-contact3-form-btn1" style="position: relative;top: 1em;right: 10em;">
                        <a href="#"> تذكرت؟</a>
                        <br>
                        <a href="{{ route('login') }}">سجل الدخول</a>

                    </div>

                    <!--<img src="images/undraw_medicine_b-1-ol.svg" style="width: 10em;height: 10em;" >-->

                    <!--<img src="{{ asset('auth/images/undraw_medicine_b-1-ol.svg') }}" style="width: 10em;height: 10em;" >-->

                </form>

            </div>
            <img src="{{ asset('auth/images/undraw_fireworks_re_2xi7.svg') }}" width="110em" height="110em"
                style="right: 19em;">
        </div>
    </div>

</body>

</html>
