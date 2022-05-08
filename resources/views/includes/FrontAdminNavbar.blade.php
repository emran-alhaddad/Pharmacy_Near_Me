<!doctype html>

<!-- <html lang="en" class="h-100"> -->
<html lang="ar" dir="rtl" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/leaf.svg') }}">
    <title>Admin Dashboard</title> {{ asset('admin/') }}
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/main2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css"> -->
</head>
<body class="overlay-scrollbar">

    <div class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item ps-3"><a class="nav-link"> <i
					class="fas fa-bars" onclick="collapseSidebar()"></i>
			</a></li>
			<!-- <li class="nav-item"><img src="{{ asset('admin/img/leaf.svg') }}" alt="logo"
				class="logo logo-light "> <img src="{{ asset('admin/img/leaf.svg') }}"
				alt="logo" class="logo logo-dark"></li> -->
		</ul>
		<h2>
			<a href="index.html" class="no-decor mx-5" style = "color:#2B547A; ">علاجي</a>
		</h2>
		<form class="navbar-search" autocomplete="off">
            <i class="fas fa-search"></i>
			<input type="text" name="Search" class="navbar-search-input"
                placeholder="">
        </form>

        <a href="/_admin/profile">
            <img src="{{ asset('uploads/avaters/admin/'.Auth::user()->avater) }}" alt="avatar"
            class="rounded-circle img-fluid" style="width: 60px; margin-left:50px;" >
        </a>

	</div>




