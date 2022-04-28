<div class="row">
<!-- Dashboard Nav Section -->
<div class="col-lg-4 col-md-4 col-12 mb-3">
<div class="card shadow p-3 pt-0 bg-opacity-0">
    <!-- user avatar -->
    <div class="col-12 d-flex justify-content-center align-items-center p-4 position-relative">
    <img src="{{ asset('auth/images/avatar.png')}}"
        class="user-avatar img-fluid rounded-circle"
        alt="user avatar"style="width: 70%;"/>
    <a role="button" data-bs-toggle="modal"data-bs-target="#avatar-edit-model"
            class="position-absolute bg-white border rounded d-flex justify-content-center align-items-lg-center rounded-circle"
            style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
            <i class="fas fa-edit"></i>
    </a>
    </div>

    <!-- name -->
    <div class="text-center">
    <p class="text-prof fs-5 fw-bold" href=""> اسم المستخدم  </p>
    <p>سيرة ذاتية </p>
    </div>

    <!-- dashboard nav -->
    <nav class="card px-3 py-4 mt-3 d-flex gap-3">

        <!-- order -->
        <a
            href="#" id="order"
            class="text-prof d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user"
        >
        <i class="fa-solid fa-cart-plus"></i>
            <span class="fs-6 fw-bold px-1"> ارسال طلبية </span>
        </a>
        <!-- sended Orders -->
        <a
            href="#" id="sended"
            class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user"
        >
            <i class="fa-solid fa-address-card"></i>
            <span class="fs-6 fw-bold px-1">الطلبات المرسلة </span>
        </a>

            <!-- info -->
        <a
            href="#" id="personal"
            class="text-secondary  d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user"
        >
            <i class="fas fa-user-circle"></i>
            <span class="fs-6 fw-bold px-1"> المعلومات الشخصية </span>
        </a>

    </nav>
</div>
</div>
