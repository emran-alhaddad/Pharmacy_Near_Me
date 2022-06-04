<nav class=" d-flex layout-navbar container-xxl navbar navbar-expand-xl navbar-detached 
  justify-content-between bg-navbar-theme shadow  mt-3 rounded-3 " id="layout-navbar">

    <div class=" mr-auto layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav d-flex align-items-end " id="navbar-collapse">


        <ul class="navbar-nav flex-row align-items-center" >
           <!--notificatio and togel-->
            <!-- <li class="nav-item navbar-dropdown dropdown-user dropdown me-3" style="direction: rtl;">
                <label class="switch">
                <input type="checkbox" class="switch-input">
                <span class="switch-label" data-on="" data-=""></span>
                <span class="switch-handle"></span>
                </label>
            </li> -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown me-2" style="direction: rtl;">
               <button type="button" class="icon-button">
                    <span class="material-icons">notifications</span>
                    <span class="icon-button__badge">2</span>
                </button>
                
            </li>

            <li class=" dropdown dropdown-notifications">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications" id="count">
                        {{ \App\Http\Controllers\Notify\NotificationsController::getCountNotification(Auth::id()) }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                    class="bx fs-4 bx-envelope-open"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container" id="notifications_list">
                        <ul class=" list-group list-group-flush">
    
                            @foreach (\App\Http\Controllers\Notify\NotificationsController::getNotification()['notifications'] as $notification)
                             
                            @if(Auth::id()==$notification->receiver_id) 
                            
                               
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-grow-1" id="parent-notification">
                                            
                                            {{-- @if ($notification->type == 'complaint') --}}
                                                <h6 class="mb-0"><a class="text-decoration-none"
                                                href={{ route('client-orders_notifacation', ['id' => $notification->request_id,'stateTap' =>$notification->type]) }}>{{ $notification->message }}{{$notification->nameFrom}}</a>
                                                </h6>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="bx bx-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                              @endif
                            @endforeach
    
    
    
                        </ul>
                    </li>
                </ul>
           

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown " style="direction: rtl; margin-left:2rem;">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ asset('uploads/avaters/client/'.Auth::user()->avater) }}" alt class="w-px-40 h-auto rounded-circle" />
                </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start">
                <li>
                    <a class="dropdown-item" href="#">
                    <div class="d-flex">
                        <div class="flex-shrink-0 ms-1">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('uploads/avaters/client/'.Auth::user()->avater) }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                        </div>
                        <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                        <small class="text-muted">عميل</small>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('client-dashboard') }}">
                    <i class="bx bx-user ms-1"></i>
                    <span class="align-middle">حسابي</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('settings') }}">
                    <i class="bx bx-cog ms-1"></i>
                    <span class="align-middle">الاعدادات</span>
                    </a>
                </li>

        
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="bx bx-power-off ms-2"></i>
                    <span class="align-middle">تسجيل خروج </span>
                    </a>
                </li>
                </ul>



    
            </li>
        </ul>
    </div>
    



</nav>

<script>
    var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

var channel = pusher.subscribe('new_notification');

channel.bind('App\\Events\\Notify', function(data) {
    console.log(data);
    if(data.receiver_id=="{{Auth::id()}}")
    {   count=(parseInt($('#count').text()))+1;
        $('#count').text(count);
        alert(count);
        $("#parent-notification").append( $('<h6/>',{'class' : 'mb-0'}).append($('<a/>',{
                   'href': "{{ route('client-orders_notifacation', ['id' =>"+data.request_id+",'stateTap' =>"+data.type+"]) }}",
                   'class': 'text-decoration-none',
                   'text':data.message+" "+data.nameFrom})
        ))

    

   const audio = new Audio('{{asset("/uploads/aduio/alert.mp3")}}');
    audio.play(); 
    
  
    }
});

</script>