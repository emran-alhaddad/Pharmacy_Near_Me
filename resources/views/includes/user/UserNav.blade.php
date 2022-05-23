{{-- <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached
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
                        <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 ms-1">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt
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
                        <a class="dropdown-item" href="{{ route('client-dashboard') }}">
                            <i class="bx bx-user ms-1"></i>
                            <span class="align-middle">حسابي</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('client-settings') }}">
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
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav> --}}



<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center me-auto">
            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown ms-3 ms-xl-1 ">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-bell bx-sm"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-start py-0 ">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 ms-auto">الاشعارات </h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="تحديد الكل ك مقروء"><i
                                    class="bx fs-4 bx-envelope-open"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container col-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar">
                                            <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}"
                                                alt class="w-px-30 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 col-12 p-2" style="direction:rtl; text-align: right">
                                        <h6 class="col-12 "> صيدلية لحياة</h6>
                                        <p class="col-12 p-1">تم الرد على طلبك</p>
                                        <small class="col-12  text-muted">1h قبل</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                            عرض كل الإشعارات
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('uploads/avaters/client/avater.png') }}" alt
                            class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start" style="direction:rtl; text-align: right">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 ">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt
                                            class="w-px-30 h-auto rounded-circle">

                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted">مستخدم</small>
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
            <!--/ User -->

        </ul>
    </div>

</nav>
