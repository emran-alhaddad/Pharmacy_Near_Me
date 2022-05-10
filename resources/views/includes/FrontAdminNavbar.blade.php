<!doctype html>

<!-- <html lang="en" class="h-100"> -->
<html lang="ar" dir="rtl" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/logo.jpg') }}">
    <title>Admin Dashboard</title>
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/main2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- <script src = "//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script> -->
</head>
<body class="overlay-scrollbar">

    <div class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item ps-3"><a class="nav-link">
                <i class="fas fa-bars" onclick="collapseSidebar()"></i>
			</a></li>
			<li class="nav-item"><img src="{{ asset('admin/img/logo.jpg') }}" alt="logo"
				class="logo logo-light " id="logo"> <img src="{{ asset('admin/img/logo.jpg') }}"
				alt="logo" class="logo logo-dark" id="logo"></li>
		</ul>
		<!-- <h2>
			<a href="index.html" class="no-decor mx-5" style = "color:#2B547A; ">ابولو</a>
		</h2> -->
		<form class="navbar-search" autocomplete="off">
            <i class="fas fa-search"></i>
			<input type="text" name="Search" class="navbar-search-input"
                placeholder="">
        </form>

        <a href="/_admin/profile">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
            class="rounded-circle img-fluid" style="width: 60px;" >
        </a>

	</div>




