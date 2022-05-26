


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
       

        <li class=" dropdown dropdown-notifications">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">
                        {{ \App\Http\Controllers\Notify\NotificationsController::getNotification(Auth::id())['count'] }}
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
    
                           
                            @foreach (\App\Http\Controllers\Notify\NotificationsController::getNotification(Auth::id())['notifications'] as $notification)
                           
                            @if(Auth::id()==$notification->receiver_id) 
                            
                               
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1" id="parent-notification">
                                        
                                        @if ($notification->type == 'wait-acceptance') 
                                            <h6 class="mb-0"><a class="text-decoration-none"
                                            href={{ route('pharmacy-order-details', ['id' => $notification->request_id]) }}>{{$notification->message }}</a>
                                            </h6>
                                            
                                             @else
                                                <h6 class="mb-0"><a class="text-decoration-none"
                                                        href={{ route('pharmacy-orders-alert', ['id' => $notification->request_id,'tap'=>$notification->type]) }}>{{ $notification->message }}</a>
                                                </h6>
                                            @endif 
    
                                           
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
        <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('uploads/avaters/pharmacy/avater.png') }}" alt
                            class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start" style="direction:rtl; text-align: right">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 ">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('uploads/avaters/pharmacy/avater.png') }}" alt
                                            class="w-px-30 h-auto rounded-circle">

                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted">صيدلي</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pharmacy-dashboard') }}">
                            <i class="bx bx-user ms-1"></i>
                            <span class="align-middle">حسابي</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pharmacy-account') }}">
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
            <!--/ User -->
</ul>
</div>

</nav>
<div class="alert alert-secondary " id="alert_Not" role="alert"></div>
<script>
    var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

var channel = pusher.subscribe('new_notification');

channel.bind('App\\Events\\Notify', function(data) {
    
     console.log(data);
    if(data.receiver_id=="{{Auth::id()}}")
    {

        if (data.type == 'wait-acceptance') 
        {
        $('<h6>',{'class' : 'mb-0','html':$('<a/>',{
                   href: "{{ route('pharmacy-order-details', ['id' =>"+data.request_id+"]) }}",
                   class: 'text-decoration-none',
                   text:data.message+" "+data.nameFrom})
        }).prepend("parent-notification");
        }
        else
        {
          $('<h6>',{  'class' : 'mb-0', 'html':$('<a/>',{
                    href: "{{ route('pharmacy-orders-alert', ['id' =>"+data.request_id+",'tap' =>"+data->type+"]) }}",
                   class: 'text-decoration-none',
                   text:data.message+" "+data.nameFrom})
        }).prepend("parent-notification");
        }    
   
    const audio = new Audio('{{asset("/uploads/aduio/alert.mp3")}}');
    audio.play();
   
    $('#alert_Not').text(data.message+" "+data.nameFrom);
    }
});

</script>