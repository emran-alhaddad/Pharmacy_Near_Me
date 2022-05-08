<div class="row">
    <!-- Dashboard Nav Section -->
    <div class="row">
                    @error('avater')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    <div class="col-lg-4 col-md-4 col-12 mb-3">
        <div class="card shadow p-3 pt-0 bg-opacity-0">
            <!-- user avater -->
            <div class="col-12 d-flex justify-content-center align-items-center p-4 position-relative">
                <img src="{{ asset('uploads/avaters/client/' . $user->avater) }}"
                    class="user-avatar img-fluid rounded-circle" alt="user avatar" style="width: 70%;" />
                <a role="button" data-toggle="modal" data-target="#avater-edit-model"
                    class="position-absolute bg-white border rounded d-flex justify-content-center align-items-lg-center rounded-circle"
                    style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
                    <i class="fas fa-edit"></i>
                </a>
                
            </div>

            <!-- name -->
            <div class="text-center">
                <p class="text-prof fs-5 fw-bold"> {{ $user->name }} </p>
                <p>{{ $user->email }} </p>
            </div>

            <!-- dashboard nav -->
            <nav class="card px-3 py-4 mt-3 d-flex gap-3">

                <!-- info -->
                <a href="{{ route('client-dashboard') }}"
                    class="text-secondary  d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user">
                    <i class="fas fa-user-circle"></i>
                    <span class="fs-6 fw-bold px-1"> البروفايل الشخصي </span>
                </a>

                <!-- order -->
                <a href="{{ route('client-orders') }}" id="order"
                    class="text-prof d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span class="fs-6 fw-bold px-1"> طلبيـــــاتي </span>
                </a>
                <!-- sended Orders -->
                <a href="#" id="sended"
                    class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="fs-6 fw-bold px-1">الشكـــــاوي </span>
                </a>


                <!-- sended Orders -->
                <a href="{{ route('logout') }}"
                    class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2 color-user">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="fs-6 fw-bold px-1">تسجيل الخروج </span>
                </a>



            </nav>
        </div>
    </div>
