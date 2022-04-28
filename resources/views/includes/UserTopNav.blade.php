<div class="row mx-1 bg-white my-3 col-12 d-flex justify-content-lg-between shadow">
        <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
        <ol class="breadcrumb ms-3" >
            <li class="fs-6 fw-bold"><a class="color-user" href="{{ route('index') }}"> الرئيسية   /  </a></li>
            <li class="fs-6 px-2 fw-bold" aria-current="page">   البروفايل   </li>
        </ol>
        </nav>
        <div class="nav-item dropdown col-6  p-2 d-flex justify-content-end">
            <a class="nav-link dropdown-toggle fs-6 fw-bold color-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            هديل جميل
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item fs-6 fw-bold " href="{{ route('pharmacies') }}">الصيدليات</a></li>
            <li><a class="dropdown-item fs-6 fw-bold" href="{{ route('logout') }}">تسجيل خروج </a></li>
            </ul>
        </div>

</div>
