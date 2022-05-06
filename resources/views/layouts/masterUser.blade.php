<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="{{ asset('auth/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        :root {
            --black: #444;
            --light-color: #777;
            --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
            --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
            --border: .2rem solid var(--main-color);

            --main-color: #543ab7;
            --secondary-color: #00acc1;
            --hover-main: #817ecd;
            --hover-secondary: #9bb0dd;
            --bg-sec: #f2f2fa;

            --radius: .5rem;
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-transform: capitalize;
            transition: all .2s ease-out;
            text-decoration: none;
        }

        html {
            font-size: 95%;
            overflow-x: hidden;
            scroll-padding-top: 7rem;
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            width: 1rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
        }

        .btn,
        .bg-primary {

            border: var(--border);
            border-radius: var(--radius);
            box-shadow: var(--box-shadow);
            color: rgba(84, 58, 183, 1);
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background: var(--main-color);
            color: #fff;
            cursor: pointer;
        }

        .color-user {
            color: var(--black);
            padding: .2rem;
            text-decoration: none;
        }

        .color-user:hover {
            color: var(--main-color);
            ;
        }

        i {
            color: var(--main-color);
        }

        .log-btn {
            display: inline-block;
            margin-top: 1rem;
            padding: .7rem;
            border: var(--border);
            border-radius: var(--radius);
            color: var(--main-color);
            cursor: pointer;
        }

        .log-btn:hover {
            /* background-color: var(--hover-main); */
            cursor: pointer;
            /* color: #ffffff; */
        }

        .s-btn {
            width: 100%;
            padding: 1rem 1.2rem;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--black);
            border: solid 1px var(--main-color);
            margin: 1rem 0;
            text-transform: none;
            border-radius: var(--radius);
        }

        input[type="number"] {
            width: 49px;
            border: var(--border);
            text-align: center;
        }

    </style>
</head>

<body class="bg-light" style="color: rgb(102, 62, 96);">
    <main class="container">
        <!-- top nav start -->
        @include('includes.UserTopNav')
        <!-- top nav end -->

        <!-- side Nav Start -->
        @include('includes.UserSideNav')
        <!-- side Nav end -->

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

        @yield('content')



        <script src="{{ asset('auth/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
        <script>
            // $('personal').click($('pp').hide());
            $(document).ready(function() {

                $("#perso,#wrk,#skil,#Edu,#expe,#curs,#Edpers").hide();


            });

            $("#personal").click(function() {
                $("#ord").hide();
                $("#perso").show();



            });
            //
            $("#order").click(function() {
                $("#perso").hide();
                $("#ord").show();
            });
            //
            $("#order-repate").click(function() {
                // $("#repe").hide();
                //  $("#wrk,#skil,#Edu,#expe,#curs,#Edpers,#perso").hide();
                $("#rep").show();
            });



            $("#Edit").click(function() {
                $("#wrk,#skil,#Edu,#expe,#curs,#Edpers,#perso").hide();
                $("#Edpers").show();
            });

            $("#saveEd").click(function() {
                $("#wrk,#skil,#Edu,#expe,#curs,#Edpers,#Edpers").hide();
                $("#perso").show();
            });

            // $("#detelis").click(function(){
            // $("#wrk,#perso,#Edu,#skil,#curs,#Edpers").hide();
            // // $("#deteli").show();
            // });
        </script>


</body>

</html>
