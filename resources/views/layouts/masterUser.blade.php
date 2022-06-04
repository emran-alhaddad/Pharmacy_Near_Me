<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>لوحة تحكم العميل</title>
    <meta name="description" content="" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/fonts/boxicons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/chat.css') }}" />
    <script src="{{ asset('pharmacy/assets/js/config.js') }}"></script>
    <script src="{{ asset('pharmacy/assets/vendor/js/helpers.js') }}"></script>


    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="{{ asset('shared/js/main.js') }}"></script>
    <style>
        @import url('http://fonts.cdnfonts.com/css/tajawal?styles=19782,19779,19780,19781,19777,19778,19776');

        html {
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            width: 1rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: linear-gradient(60deg, var(--main-color) 0%, var(--secondary-color) 100%);
        }

        body {
            font-family: "Tajawal", sans-serif;
            font-weight: normal;
            font-style: normal;
            /* color: #7C869A; */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #333;
            --light-black: #777;
            --main-color: #2B547A;
            --hover-main: #4688C7;
            --secondary-color: #57ABFA;
            --hover-secondary: #A3D0FB;
            --bg-sec: #f6f4fa;
            --border: .2rem solid var(--main-color);
            --radius: .5rem;
            --font-type: 'Tajawal', sans-serif;
            --fs-p: 1.7rem;
            --fs-span: 1rem;
        }

        .navbar-brand {
            padding: 0;
            width: 100%;
            max-width: 155px;
        }

        a {
            text-decoration: none;
        }

        .heading {
            text-align: center;
            padding-bottom: 2rem;
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
            background-color: #ffffff;
            color: var(--main-color);
        }

        .btn-submit :hover {
            color: var(--secondary-color);
            /* background-color: var(--secondary-color); */
        }

        .back-to-top.btn-hover {
            position: fixed;
            z-index: 99999;
        }

        .back-to-top:hover {
            color: #fff;
        }

        *:focus {
            outline: none;
        }


        /*===== All Button Style =====*/

        .main-btn {
            display: inline-block;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 0;
            padding: 16px 38px;
            font-weight: 600;
            font-size: 18px;
            border-radius: var(--radius);
            color: #fff;
            cursor: pointer;
            z-index: 5;
            background: var(--main-color);
            transition: all 0.4s ease-out 0s;
        }

        .main-btn:hover {
            color: #fff;
        }

        .btn-hover {
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .btn-hover::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            top: 0;
            left: 0;
            z-index: -1;
            transition: all 0.3s ease-out 0s;
        }

        .btn-hover:hover::after {
            width: 100%;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('shared/css/main.css') }}" />
        
        
</head>

<body style="direction: rtl;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container mx-sm-3">
            <!-- Menu -->
            @include('includes.user.UserAside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('includes.user.UserNav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('content')


                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>




    <!-- Core JS -->
    <script src="{{ asset('pharmacy/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pharmacy/assets/vendor/js/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Main JS -->

    <script src="{{ asset('pharmacy/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('pharmacy/assets/js/pages-account-settings-account.js') }}"></script>
    @include('shared.image-view')

    <!-- Edit user avater image model -->
        <div class="modal fade" id="avater-edit-model" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <!-- model header -->
                    <div class="modal-headerd-flex justify-content-between align-items-center">
                        <h4 class="modal-title fw-bold text-center" id="exampleModalLabel">
                            تعديل صورة البروفايل
                        </h4>

                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- model body -->
                    <div class="modal-body">
                        <form action="{{ route('client-avater-update') }}" method="POST" class="g-3"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="input-group mb-3">
                                <input type="file" name='avater' class="form-control" id="inputGroupFile02" />
                            </div>
                            <button type="submit" class="btn bg-primary text-white">
                                تعديل
                            </button>
                        </form>
                    </div>

                    <!-- model footer -->
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <!-- show compliant reply model -->
        <div class="modal fade" id="compliant-reply" tabindex="-1" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <!-- model header -->
                    <div class="modal-headerd-flex justify-content-between align-items-center">
                        <h4 class="modal-title fw-bold text-center" id="exampleModalLabel2">
                            الرد على الشكوى
                        </h4>
                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>

                    <!-- model body -->
                    <div class="modal-body">

                        <p id="reply-text"></p>
                    </div>

                    <!-- model footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary text-light" data-dismiss="modal">تـــم</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('error'))
            <script>
                swal("عملية غير مكتملة", "{!! session('error') !!}", "error")
            </script>
        @endif
        @if (session('status'))
            <script>
                swal("أكتملت العملية", "{!! session('status') !!}", "success")
            </script>
        @endif


</body>

</html>
