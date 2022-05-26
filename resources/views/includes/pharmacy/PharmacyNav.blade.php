<style>
.notification-ui a:after {
    display: none;
}

.notification-ui_icon {
    position: relative;
}

.notification-ui_icon .unread-notification {
    display: inline-block;
    height: 7px;
    width: 7px;
    border-radius: 7px;
    background-color: #66BB6A;
    position: absolute;
    top: 7px;
    left: 12px;
}

@media (min-width: 900px) {
    .notification-ui_icon .unread-notification {
        left: 20px;
    }
}

.notification-ui_dd {
    padding: 0;
    border-radius: 10px;
    -webkit-box-shadow: 0 5px 20px -3px rgba(0, 0, 0, 0.16);
    box-shadow: 0 5px 20px -3px rgba(0, 0, 0, 0.16);
    border: 0;
    max-width: 400px;
}

@media (min-width: 900px) {
    .notification-ui_dd {
        min-width: 400px;
        position: absolute;
        left: -190px;
        top: 50px;
    }
}

.notification-ui_dd:after {
    content: "";
    position: absolute;
    top: -30px;
    left: calc(50% - 7px);
    border-top: 15px solid transparent;
    border-right: 15px solid transparent;
    border-bottom: 15px solid #fff;
    border-left: 15px solid transparent;
}

.notification-ui_dd .notification-ui_dd-header {
    border-bottom: 1px solid #ddd;
    padding: 15px;
}

.notification-ui_dd .notification-ui_dd-header h3 {
    margin-bottom: 0;
}

.notification-ui_dd .notification-ui_dd-content {
    max-height: 500px;
    overflow: auto;
}

.notification-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
  
    padding: 20px 0;
    margin: 0 25px;
    border-bottom: 1px solid #ddd;
}

.notification-list--unread {
    position: relative;
}

.notification-list--unread:before {
    content: "";
    position: absolute;
    top: 0;
    left: -25px;
    height: calc(100% + 1px);
    border-left: 2px solid #29B6F6;
}

.notification-list .notification-list_img img {
    height: 48px;
    width: 48px;
    border-radius: 50px;
    margin-right: 20px;
}

.notification-list .notification-list_detail p {
    margin-bottom: 5px;
    line-height: 1.2;
}

.notification-list .notification-list_feature-img img {
    height: 48px;
    width: 48px;
    border-radius: 5px;
    margin-left: 20px;
}</style>


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

                    <li class="nav-item dropdown notification-ui show">
                            <a class="nav-link dropdown-toggle notification-ui_icon" style="cursor: pointer"  id="show-list-notify" >
                                <i class="fas fa-bell"></i>
                                <span class="badge bg-danger rounded-pill badge-notifications" id="count">
                                    {{ \App\Http\Controllers\Notify\NotificationsController::getCountNotification(Auth::id()) }}
                                </span>
                            </a>
                            <div class="dropdown-menu notification-ui_dd"  id="list-notify" aria-labelledby="navbarDropdown">
                                <div class="notification-ui_dd-header">
                                    <h3 class="text-center">Notification</h3>
                                </div>
                                {{-- <div class="notification-ui_dd-content">
                                    <div class="notification-list notification-list--unread">
                                        <div class="notification-list_img">
                                            <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">
                                        </div>
                                        <div class="notification-list_detail">
                                            <p><b>John Doe</b> reacted to your post</p>
                                            <p><small>10 mins ago</small></p>
                                        </div>
                                        <div class="notification-list_feature-img">
                                            <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">
                                        </div>
                                    </div>
                                </div> --}}
                            {{-- </div>   --}}

    
                           
                          @foreach (\App\Http\Controllers\Notify\NotificationsController::getNotification()['notifications'] as $notification)
                           
                            @if(Auth::id()==$notification->receiver_id) 
                            
                               
                            {{-- <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1" id="parent-notification"> --}}
                                        
                                        @if ($notification->type == 'wait-acceptance')
                                        <div class="notification-ui_dd-content">
                                            <div class="notification-list notification-list--unread">
                                                <div class="notification-list_img">
                                                    <img src={{asset("/uploads/avaters/client/$notification->image")}} alt="user">
                                                </div>
                                                <div class="notification-list_detail">
                                                    <a class="text-decoration-none"
                                                    href={{ route('pharmacy-order-details', ['id' => $notification->request_id]) }}>
                                                    <p><b>{{$notification->nameFrom }}</b>{{$notification->message}} </p></a>
                                                   <p><small>{{$notification->updated_at}}</small></p>
                                                </div>
                                                {{-- <div class="notification-list_feature-img">
                                                    <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">
                                                </div> --}}
                                            </div>
                                        </div> 
                                        @else
                                        <div class="notification-ui_dd-content">
                                            <div class="notification-list notification-list--unread">
                                                <div class="notification-list_img">
                                                    <img src={{asset("/uploads/avaters/client/$notification->image")}} alt="user">
                                                </div>
                                                <div class="notification-list_detail">
                                                    <a class="text-decoration-none"
                                                    {{ route('pharmacy-orders-alert', ['id' => $notification->request_id,'tap'=>$notification->type]) }}>
                                                    <p><b>{{$notification->nameFrom }}</b>{{$notification->message}} </p></a>
                                                   <p><small>{{$notification->updated_at}}</small></p>
                                                </div>
                                             
                                            </div>
                                        </div> 

                                        @endif
                                       
                                           
                                @endif
                                @endforeach
                            
                          
                            </div>
    
    
    
                      
                    </li>
              
        </li>
    </ul>
</li>

</ul>
</div>

</nav>

<script>

$(document).ready(function () {
   
    $("#show-list-notify").click(function (event) {
        event.preventDefault();
       
        $("#list-notify").toggle();
    });
});

    
    var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });


var channel = pusher.subscribe('new_notification');

channel.bind('App\\Events\\Notify', function(data) {
    
     console.log(data);
    if(data.receiver_id=="{{Auth::id()}}")
    { 
        count=(parseInt($('#count').text()))+1;
        $('#count').text(count);
       

        if (data.type == 'wait-acceptance') 
        {
    //    $("#list-notify").append( $('<h6/>',{'class' : 'mb-0'}).append($('<a/>',{
    //                'href': "{{ route('pharmacy-order-details', ['id' =>"+data.request_id+"]) }}",
    //                'class': 'text-decoration-none',
    //                'text':data.message+" "+data.nameFrom})

    //     ))
        $('#alert_Not').text(data.message+" "+data.nameFrom);
        }
        else
        {
        //     $("#parent-notification").append( $('<h6/>',{'class' : 'mb-0'}).append($('<a/>',{
        //            'href': "{{ route('pharmacy-order-details', ['id' =>"+data.request_id+"]) }}",
        //            'class': 'text-decoration-none',
        //            'text':data.message+" "+data.nameFrom})
        // ))
        //   $('<h6/>',{  'class' : 'mb-0', 'html':$('<a/>',{
        //             'href': "{{ route('pharmacy-orders-alert', ['id' =>"+data.request_id+",'tap' =>"+data->type+"]) }}",
        //            'class': 'text-decoration-none',
        //            'text':data.message+" "+data.nameFrom})
        // }).append("#parent-notification");
        $('#alert_Not').text(data.message+" "+data.nameFrom);
        }    
   
    //const audio = new Audio('{{asset("/uploads/aduio/alert.mp3")}}');
    //audio.play();
   
    // $('#alert_Not').text(data.message+" "+data.nameFrom);
    }
});

</script>