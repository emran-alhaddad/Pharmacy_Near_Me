


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


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown " style="direction: rtl;">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('uploads/avaters/pharmacy/' . Auth::user()->avater) }}" alt
                                class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 ms-1">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('uploads/avaters/pharmacy/' . Auth::user()->avater) }}" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">صيدلية</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('pharmacy-account') }}">
                                <i class="bx bx-user ms-1"></i>
                                <span class="align-middle">حسابي</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('pharmacy-settings') }}">
                                <i class="bx bx-cog ms-1"></i>
                                <span class="align-middle">الاعدادات</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="bx bx-power-off ms-2"></i>
                                <span class="align-middle">تسجيل خروج </span>
                            </a>
                        </li>
                    </ul>



<li class=" dropdown dropdown-notifications">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <i class="bi bi-bell-fill"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">5</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0 me-5" >
            <li class="dropdown-menu-header border-bottom" >
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notification</h5>
                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container" id="notifications_list">
            <ul class=" list-group list-group-flush">


            </ul>
            </li>
        </ul>
</li>



                </li>
                <!--/ User -->
            </ul>
        </div>
        @if (session('error'))
            <div class="alert alert-danger mt-2 mb-2" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success mt-2 mb-2" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </nav>


<script>
    var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
        cluster: '{{env("PUSHER_APP_CLUSTER")}}',
        encrypted: true
    });

    var channel = pusher.subscribe('new_notification');

    channel.bind('App\\Events\\Notify', function(data) {
        var node = document.createElement('li');
            node.innerHTML =`

            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                <div class="d-flex">
                    <div class="flex-grow-1">
                    <h6 class="mb-1">اشعار بطلبية جديدة</h6>
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
    if( data.pharmacy_id.toString() =="{ Auth::id() }") {
        // alert("{!! Auth::id() !!}");
        var list = document.getElementById('notifications_list');
        alert("hi pinky");
        // var list =   document.getElementById('notifictions_list');
        document.getElementById('notifications_list').append(node);
        // insertAfter(node, list )
        // )
        // document.getElementById('notification').insertAfter(node);
    }
    });

</script>
