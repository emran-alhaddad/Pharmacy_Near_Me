<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow  my-3 mb-4 rounded-3">
    <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('Front/assets/images/about/علاجي-01-3.svg') }}" id="logo" alt="Logo">
        </a>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <li class="menu-item">
    <a href="#" class="menu-link">
        <div data-i18n="Account">الرسائل</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="{{ route('order') }}" class="menu-link">
        <div data-i18n="Account">ادارة الطلبات</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="{{ route('order') }}" class="menu-link">
        <div data-i18n="Account">الاشعارات</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="#" class="menu-link">
        <div data-i18n="Account">الشكاوي</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="{{ route('profile') }}" class="menu-link">
        <div data-i18n="Account">البروفايل</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="pharmacy-accunt.html" class="menu-link">
        <div data-i18n="Account">تسجيل خروج</div>
    </a>
    </li>


    </ul>
</aside>
