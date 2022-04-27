<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('auth/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">


</head>

<body>

    <!-- header section starts  -->
    @include('includes.FrontHeader')
    <!-- header section ends -->


    @yield('content')


    <!-- footer section starts  -->
    @include('includes.FrontFooter')
    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="{{ asset('auth/js/script.js') }}"></script>

</body>

</html>
