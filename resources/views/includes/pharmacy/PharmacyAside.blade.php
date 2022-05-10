<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow  my-3 mb-4 rounded-3">
    <div class="app-brand demo">
        <a href=" {{ route('index') }}" class="app-brand-link">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" id="logo" alt="Logo">
            </a>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="card-body text-center mt-2">
        <a href="{{ route('pharmacy-account') }}">
            <img src="{{ asset('uploads/avaters/pharmacy/'.Auth::user()->avater)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <span style="margin-top: -50px;">
                    <div class="d-flex justify-content-center mb-2">
                    <i class="fas fa-pen"></i>
                    </div>
                </span>
            </a>
        <h5 class="my-3">{{ Auth::user()->name }}</h5>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item">
        <a href="#" class="menu-link"><i class="bx bx-message-alt me-1"></i>
            <div data-i18n="Account">الرسائل</div>
        </a>
        </li>
        <li class="menu-item">
        <a href="{{ route('pharmacy-orders') }}" class="menu-link"><i class="bx bx-shopping-bag me-1"></i>
            <div data-i18n="Account">ادارة الطلبات</div>
        </a>
        </li>
        <li class="menu-item">
        <a href="#" class="menu-link"><i class="bx bx-notification  me-1"></i>
            <div data-i18n="Account">الاشعارات</div>
        </a>
        </li>
        <li class="menu-item">
        <a href="#" class="menu-link"><i class="bx bx-chat me-1"></i>
            <div data-i18n="Account">الشكاوي</div>
        </a>
        </li>
        <li class="menu-item">
        <a href="{{ route('pharmacy-account') }}" class="menu-link"><i class="bx bx-user me-1"></i>
            <div data-i18n="Account">البروفايل</div>
        </a>
        </li>
        <li class="menu-item">
        <a href="{{ route('logout') }}" class="menu-link"><i class="bx bx-power-off me-1"></i>
            <div data-i18n="Account">تسجيل خروج</div>
        </a>
        </li>


    </ul>
</aside>
