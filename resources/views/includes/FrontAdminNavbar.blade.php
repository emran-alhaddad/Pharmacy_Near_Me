<!doctype html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/leaf.svg') }}">
    <title>Admin Dashboard</title> {{ asset('admin/') }}
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/main2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="overlay-scrollbar">

    <div class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item ps-3"><a class="nav-link"> <i
					class="fas fa-bars" onclick="collapseSidebar()"></i>
			</a></li>
			<li class="nav-item"><img src="{{ asset('admin/img/leaf.svg') }}" alt="logo"
				class="logo logo-light"> <img src="{{ asset('admin/img/leaf.svg') }}"
				alt="logo" class="logo logo-dark"></li>
		</ul>
		<h2>
			<a href="index.html" class="text-success no-decor">ابولو</a>
		</h2>
		<form class="navbar-search" autocomplete="off">
        <i class="fas fa-search"></i>
			<input type="text" name="Search" class="navbar-search-input"
                placeholder="">
		</form>
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode"><a class="nav-link" href="#"
				onclick="switchTheme()"> <i class="fas fa-moon dark-icon"></i> <i
					class="fas fa-sun light-icon"></i>
            </a></li>

			<li class="nav-item dropdown"><a class="nav-link"> <i
					class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
					<span class="navbar-badge">15</span>
            </a>



				<ul id="notification-menu" class="dropdown-menu notification-menu">
					<div class="dropdown-menu-header">
						<span> Notifications </span>
					</div>
					<div
						class="dropdown-menu-content overlay-scrollbar scrollbar-hover">
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-gift"></i>
								</div> <span> Lorem ipsum dolor sit amet, consectetuer
									adipiscing elit. <br> <span> 15/07/2020 </span>
							</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-tasks"></i>
								</div> <span> Lorem ipsum dolor sit amet, consectetuer
									adipiscing elit. <br> <span> 15/07/2020 </span>
							</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-gift"></i>
								</div> <span> Lorem ipsum dolor sit amet, consectetuer
									adipiscing elit. <br> <span> 15/07/2020 </span>
							</span>
						</a></li>
					</div>
					<div class="dropdown-menu-footer">
						<span> View all notifications </span>
					</div>
                </ul></li>




			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					<img src="{{asset('admin/img/user.svg')}}" alt="User image"
						class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li class="dropdown-menu-item"><a class="dropdown-menu-link">
								<div>
									<i class="fas fa-user-tie"></i>
								</div> <span>Profile</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-cog"></i>
								</div> <span>Settings</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="far fa-credit-card"></i>
								</div> <span>Payments</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-spinner"></i>
								</div> <span>Projects</span>
						</a></li>
						<li class="dropdown-menu-item"><a href="#"
							class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div> <span>Logout</span>
						</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>




