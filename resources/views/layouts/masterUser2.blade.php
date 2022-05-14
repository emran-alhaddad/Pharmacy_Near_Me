<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> Pharmacy- Dashboard</title>
    <meta name="description" content="" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/fonts/boxicons.css')}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/vendor/css/theme-default.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('pharmacy/assets/css/chat.css')}}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('pharmacy/assets/js/config.js')}}"></script>

    {{-- Front Style start --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <style>



 .switch {
  display: block;
  margin: 22px auto;
}

.switch {
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 74px;
  height: 36px;
  padding: 1px;
  border-radius: 3px;
  cursor: pointer;
}

.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.switch-label {
  width:60px;
  position: relative;
  display: block;
  height: inherit;
  font-size: 10px;
  text-transform: uppercase;
  background: var(--main-color);
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: opacity background;
  -moz-transition-property: opacity background;
  -o-transition-property: opacity background;
  transition-property: opacity background;
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 9px;
  color: #aaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background: #fff;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}

.switch-handle {
  position: absolute;
  top: 1px;
  left: -5px;
  width: 36px;
  height: 36px;
  background: white;
  border-radius: 3px;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
  background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-handle:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: #f9f9f9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #eeeeee, white);
  background-image: -moz-linear-gradient(top, #eeeeee, white);
  background-image: -o-linear-gradient(top, #eeeeee, white);
  background-image: linear-gradient(to bottom, #eeeeee, white);
}
.switch-input:checked ~ .switch-handle {
  left: 70px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

.switch-green > .switch-input:checked ~ .switch-label {
  background: #4fb845;
}
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
            color: #ffffff;
            background-color: var(--main-color);
            
        }

        .btn-submit:hover {
            color: #fff;
            /* background-color: #ffffff; */
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



/**notifiaction style */

.icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  color: #333333;
  background: #dddddd;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
}

.icon-button:active {
  background: #cccccc;
}


.icon-button__badge {
    position: absolute;
    top: -5px;
    right: -4px;
    width: 20px;
    height: 20px;
    background: var(--main-color);
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}


    </style>
    {{-- Front Style end --}}
  </head>

  <body style="direction: rtl;">
  
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container mx-sm-3">
            <!-- Menu -->
                @include('includes.UserAside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                    @include('includes.UserNav')
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
    <script src="{{ asset('pharmacy/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('pharmacy/assets/vendor/js/menu.js')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('pharmacy/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('pharmacy/assets/js/pages-account-settings-account.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  </body>
</html>
