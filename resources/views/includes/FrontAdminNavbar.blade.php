<!doctype html>

<!-- <html lang="en" class="h-100"> -->
<html lang="ar" dir="rtl" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}">
    <title>لوحة تحكم إدارة الموقع</title>
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/main2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
   
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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
			<li class="nav-item">
            <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" id="logo" alt="Logo">
            </li>
		</ul>



<li class=" dropdown dropdown-notifications">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">
            {{\App\Http\Controllers\Notify\NotificationsController::getNotification()['count']}}
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0" >
            <li class="dropdown-menu-header border-bottom" >
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notification</h5>
                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container" id="notifications_list">
            <ul class=" list-group list-group-flush">

            @foreach( \App\Http\Controllers\Notify\NotificationsController::getNotification()['notifications'] as $notification)
       

            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        @if ($notification->type=='complaint')
                        <h6 class="mb-0"><a class="text-decoration-none" href={{route('admin-showalert',['id'=>$notification->receiver_id])}}>{{$notification->message }}</a></h6>
                        @else
                        <h6 class="mb-0"><a class="text-decoration-none" href={{route('admin-showPharsAlert',['id'=>$notification->receiver_id])}}>{{$notification->message }}</a></h6>
                        @endif
                       
                    {{-- <h6 class="mb-0">{{$notification->client_name }}</h6>
                    <h6 class="mb-0">{{$notification->pharmacy_name }}</h6> --}}
                    {{-- <small class="text-muted">5 days ago</small> --}}
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                </div>
            </li>


            @endforeach



            </ul>
            </li>
        </ul>
</li>
         
{{-- <audio class="" style="display: none" id="audio" src= src={{asset("/uploads/audio/alert.mp3")}}  autoplay="false" ></audio> --}}

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




<!-- <li class="dropdown dropdown-notifications">
    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
    <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
    </a>

    <div class="dropdown-container">
    <div class="dropdown-toolbar">
        <div class="dropdown-toolbar-actions">
        <a href="#">Mark all as read</a>
        </div>
        <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
    </div>
    <ul class="dropdown-menu">
    </ul>
    <div class="dropdown-footer text-center">
        <a href="#">View All</a>
    </div>
    </div>
</li> -->

<script>
    var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
        cluster: '{{env("PUSHER_APP_CLUSTER")}}',
        encrypted: true
    });

    var channel = pusher.subscribe('new_notification');
   
    channel.bind('App\\Events\\Notify', function(data) {
        const audio = new Audio('{{asset("/uploads/aduio/alert.mp3")}}');
        audio.play();
        var node = document.createElement('li');
            // <li class="list-group-item list-group-item-action dropdown-notifications-item">
            //         <div class="d-flex">
            //             <div class="flex-grow-1">
            //             <h6 class="mb-1">تم تسجيل مستخدم جديد</h6>
            //             <p class="mb-0">${data.user_name}</p>
            //             <p class="mb-0">${data.email}</p>
            //             <small class="text-muted">5 days ago</small>
            //             </div>
            //             <div class="flex-shrink-0 dropdown-notifications-actions">
            //             <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
            //             <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
            //             </div>
            //         </div>
            //     </li>


            node.innerHTML =`

            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                <div class="d-flex">
                    <div class="flex-grow-1">
                    <h6 class="mb-0">${data.message}</h6>
                    <p class="mb-0">${data.client_name}</p>
                    <p class="mb-0">${data.pharmacy_name}</p>
                    <small class="text-muted">5 days ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                </div>
            </li>
    `;
    // if( data.admin_id.toString() =="{!! Auth::id() !!}") {
        // alert("{!! Auth::id() !!}");
        var list = document.getElementById('notifications_list');
        // alert("hi complaint news");
        // var list =   document.getElementById('notifictions_list');
        document.getElementById('notifications_list').append(node);
        // insertAfter(node, list )
        // )
        // document.getElementById('notification').insertAfter(node);
    // }
    });

</script>








