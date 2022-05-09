<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme " style="height:auto;">
    <div class="app-brand demo">
    <a href="{{ route('pharmacy-dashboard') }}" class="app-brand-link">

        <span class="app-brand-text demo menu-text fw-bolder ms-2">علاجي</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <li class="menu-item">
    <a href="{{ route('chat') }}" class="menu-link">
        <div data-i18n="Account">الرسائل</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="{{ route('myorder') }}" class="menu-link">
        <div data-i18n="Account"> طلبياتي</div>
    </a>
    </li>

    <li class="menu-item">
    <a href="{{ route('problems') }}" class="menu-link">
        <div data-i18n="Account">الشكاوي</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="{{ route('client') }}" class="menu-link">
        <div data-i18n="Account">البروفايل</div>
    </a>
    </li>

    <li class="menu-item">
    <a href="{{ route('index') }}" class="menu-link">
        <div data-i18n="Account">خروج</div>
    </a>
    </li>
    </ul>
</aside>
