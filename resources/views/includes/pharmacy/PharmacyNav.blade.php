


    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached
    justify-content-start bg-navbar-theme shadow  mt-3 rounded-3"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav d-flex align-items-center" id="navbar-collapse">


            <ul class="navbar-nav flex-row align-items-center me-auto">

        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="bx bx-power-off ms-2"></i>
                <span class="align-middle">تسجيل خروج </span>
            </a>
        </li>

        <li class=" dropdown dropdown-notifications">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">
                        {{ \App\Http\Controllers\Notify\NotificationsController::getNotification()['count'] }}
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
                           
                              @if(auth()->id()==$notification->user_id)   
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-grow-1"> 
                                            @if ($notification->type == 'complaint')
                                                <h6 class="mb-0"><a class="text-decoration-none"
                                                        href={{ route('admin-showalert', ['id' => $notification->receiver_id]) }}>{{ $notification->message }}</a>
                                                </h6>
                                            @else
                                                <h6 class="mb-0"><a class="text-decoration-none"
                                                        href={{ route('pharmacy-order-details', ['id' => $notification->request_id]) }}>{{ $notification->message }}</a>
                                                </h6>
                                            @endif
    
                                            {{-- <h6 class="mb-0">{{$notification->client_name }}</h6>
                        <h6 class="mb-0">{{$notification->pharmacy_name }}</h6> --}}
                                            {{-- <small class="text-muted">5 days ago</small> --}}
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
        </li>
    </ul>
</li>
<!--/ User -->
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

    if(data.user_id=={{Auth::id()}})
    {
    const audio = new Audio('{{asset("/uploads/aduio/alert.mp3")}}');
    audio.play();
    }
});

</script>