@extends('layouts.masterPharmacy')

@section('content')



    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div id="alert">
        </div>

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">

                        <button type="submit" class="btn btn-submit me-2"> <a href="{{ route('pharmacy-account') }}"
                                style="color:#fff;"><i class="bx bx-user me-1"></i> البروفايل</a></button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pharmacy-settings') }}"><i class="bx bx-cog me-1"></i>
                            الاعدادات</a>
                    </li>

                </ul>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">تفاصيل البروفايل</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="d-flex flex-column h-100 justify-content-evenly">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#edit-password">
                                                تغيير كلمة المرور
                                            </button>

                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#edit-email">
                                                تغيير البريد
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <form action="{{ route('pharmacy-avater-update') }}" method="POST"
                                            class="d-flex flex-column flex-wrap justify-content-center align-content-center"
                                            enctype="multipart/form-data" class="d-flex flex-row">
                                            @csrf
                                            @method('put')
                                            <label for="avater">
                                                <img src="{{ asset('uploads/avaters/pharmacy/' . Auth::user()->avater) }}"
                                                    alt="user-avatar" class="d-block rounded" height="150" width="150"
                                                    id="uploadedAvatar" />
                                                <input type="file" name="avater" id="avater" class="account-file-input"
                                                    hidden />
                                            </label>

                                            <div class="button-wrapper mt-2">
                                                <button type="submit" class=" btn btn-submit mb-4 .text-white "
                                                    tabindex="0">
                                                    <span class="d-none d-sm-block ">تغيير صورة البروفايل </span>

                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">تفاصيل البروفايل</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{ route('pharmacy-license-update') }}" method="POST"
                                            class="d-flex flex-column flex-wrap justify-content-center align-content-center"
                                            enctype="multipart/form-data" class="d-flex flex-row">
                                            @csrf
                                            @method('put')
                                            <label for="license">
                                                <img src="{{ asset('uploads/license/' . $pharmacy->license) }}"
                                                     class="d-block rounded" height="150" width="150"
                                                    id="uploadedLicense" />
                                                <input type="file" onchange="editImage(this,'uploadedLicense')" name="license" id="license"
                                                    hidden />
                                            </label>

                                            <div class="button-wrapper mt-2">
                                                <button type="submit" class=" btn btn-submit mb-4 .text-white "
                                                    tabindex="0">
                                                    <span class="d-none d-sm-block ">تغيير صورة الرخصة </span>

                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <form action="{{ route('pharmacy-dashboard-update') }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3 col">
                        <label for="firstName" class="form-label">اسم الصيدلية </label>
                        <input class="form-control rounded @error('name') border-danger @enderror"
                            value="{{ $pharmacy->user->name }}" type="text" placeholder="اسم المستخدم" name="name"
                            autofocus />
                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-3 col-lg-6 col-sm-12">

                            <div class="input-group mb-3 rounded">
                                <label for="city" class="form-label">المدينة</label>
                                <div class="dropdown col-12">
                                    <select name="city_id" class="col-12 rounded form-control">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                @if ($pharmacy->zone->city_id == $city->id) selected @endif>
                                                {{ $city->name }}
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6 col-sm-12">
                            <div class="input-group mb-3 rounded">
                                <label for="zone_id" class="form-label">الحي السكني</label>
                                <div class="dropdown col-12">
                                    <select name="zone_id" class="col-12 rounded form-control">
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if ($pharmacy->zone_id == $zone->id) selected @endif>
                                                {{ $zone->name }}
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="phone" class="form-label">رقم الهاتف </label>
                                <input class="form-control rounded @error('phone') border-danger @enderror"
                                    value="{{ $pharmacy->user->phone }}" type="text" placeholder="رقم الهاتف" name="phone"
                                    autofocus />
                                @error('phone')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label for="whatsup" class="form-label">واتساب</label>
                                <input class="form-control rounded @error('whatsup') border-danger @enderror"
                                    value="{{ $pharmacy->whatsup }}" type="tel" placeholder="واتساب" name="whatsup"
                                    autofocus />
                                @error('whatsup')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="facebook" class="form-label">فيسبوك </label>
                            <input class="form-control rounded @error('facebook') border-danger @enderror"
                                value="{{ $pharmacy->facebook }}" type="url" placeholder="فيسبوك" name="facebook"
                                autofocus />
                            @error('facebook')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="twitter" class="form-label">تويتر </label>
                            <input class="form-control rounded @error('twitter') border-danger @enderror"
                                value="{{ $pharmacy->twitter }}" type="url" placeholder="تويتر" name="twitter"
                                autofocus />
                            @error('twitter')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="google" class="form-label">الموقع الإلكتروني </label>
                            <input class="form-control rounded @error('google') border-danger @enderror"
                                value="{{ $pharmacy->google }}" type="url" placeholder="الموقع الإلكتروني" name="google"
                                autofocus />
                            @error('google')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <button type="submit" class="btn btn-submit btn-hover  me-2  ">حفظ التغيرات</button>
                <button type="reset" class="btn btn-outline-secondary">الغاء</button>
            </div>
=======
                <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                    <div class="row mb-3">
                        <label for="address" class="form-label">وصف عنوان الصيدلية</label>
                        <textarea rows=3 class="form-control rounded @error('address') border-danger @enderror"
                            name="address">{{ $pharmacy->address }}</textarea>
                        @error('address')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
>>>>>>> 011fce7a284e7d09b4fe09516873b48b352bd7be

                    <div class="row mb-3">
                        <label for="description" class="form-label">وصف الصيدلية </label>
                        <textarea rows=7 class="form-control rounded @error('description') border-danger @enderror"
                            name="description">{{ $pharmacy->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="mt-2">

        <button type="submit" class="btn btn btn-submit me-2 ">حفظ التغيرات</button>
        <button type="reset" class="btn btn-outline-secondary">الغاء</button>
    </div>

    </form>
    </div>

    <!-- /Account -->
    <!-- / Content -->

    <div class="content-backdrop fade"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- Modal -->
    <div class="modal fade" id="edit-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">


                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تغيير كلمة المرور
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @error('error')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('status')
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <form action="{{ route('pharmacy-password-update') }}" method="POST" class="g-3">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">كلمة المرور القديمة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input value="{{ old('password') }}" type="password"
                                        placeholder="كلمة المرور القديمة" name="password"
                                        class="form-control rounded @error('password') border-danger @enderror">
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">كلمة المرور الجديدة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="كلمة المرور الجديدة" name="new_password"
                                        class="form-control rounded @error('new_password') border-danger @enderror">
                                    @error('new_password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">تأكيد كلمة المرور الجديدة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="تأكيد كلمة المرور الجديدة"
                                        name="new_password_confirmed"
                                        class="form-control rounded @error('new_password_confirmed') border-danger @enderror">
                                    @error('new_password_confirmed')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="edit-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تبديل البريد الالكتروني
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="sendEmailCode" action="{{ route('pharmacy-email-code') }}" method="POST"
                        class="row">
                        <div id="sendEmailCodeMessage" role='alert'>
                        </div>
                        @csrf
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">البريد الإلكتروني</h6>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text rounded"
                                            style="background-color: var(--main-color)"><i
                                                class="bi bi-person-plus-fill text-white"></i></span>
                                        <input value="{{ $pharmacy->user->email }}" id='currentEmail' type="email"
                                            placeholder="البريد الإلكتروني" name="email"
                                            class="form-control rounded @error('email') border-danger @enderror">
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-4">
                                    <button id="send_email_code_btn" class="btn-submit radius text-center p-2 col-12 mt-2">
                                        ارسال رمز التحقق
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <hr>
                    <form action="{{ route('pharmacy-email-update') }}" method="POST" class="g-3">

                        @csrf
                        @method('put')

                        <input id="hiddenEmail" type="hidden" name="email">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">رمز التحقق</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" placeholder="رمز التحقق" name="code"
                                        class="form-control rounded @error('code') border-danger @enderror">
                                    @error('code')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="row">
                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script>
        $("#sendEmailCode").on('submit', function(e) {
            e.preventDefault();
            var token = $($("#sendEmailCode [name='_token']")[0]).val();
            var email = $("#currentEmail").val();
            $('#send_email_code_btn').text('جاري ارسال الكود ...');

            $.ajax({
                method: 'post',
                data: {
                    _token: token,
                    email: email
                },
                url: "{{ route('pharmacy-email-code') }}",
                success: function(data) {
                    if (data['type'] != 'danger') {
                        $("#currentEmail").attr('disabled', 'disabled');
                        $('#send_email_code_btn').text('تم ارسال الكود');
                    } else
                        $('#send_email_code_btn').text('حدث خطأ في ارسال الكود');
                    $("#sendEmailCodeMessage").html(
                        "<div class='alert alert-" + data['type'] + "' role='alert'>" +
                        data['data'] +
                        "</div>"
                    );
                    $("#currentEmail").val(email);
                    $("#hiddenEmail").val(email);

                }

            });

        })

        function editImage(event,target)
        {
            
            var file = event.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                $(event).val("");
                $('#alert').html("<div class='alert alert-danger' role='alert'>نوع الصورة غير مقبول</div>");
            }
            else
            {
                let img = document.getElementById(target);
                img.src = window.URL.createObjectURL(event.files[0]);
            }
        }

        $("#avater").change(function(e) {
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                $(this).val("");
                $('#alert').html("<div class='alert alert-danger' role='alert'>نوع الصورة غير مقبول</div>");
            }

        });

$(document).ready(function(){
        @error('modal')
   $("#{{ $message }}").modal('show');
   @enderror
   @error('email')
   $("#edit-email").modal('show');
   @enderror
   @error('new_password')
   $("#edit-password").modal('show');
   @enderror
   @error('new_password_confirmed')
   $("#edit-password").modal('show');
   @enderror
});
        
        
    </script>

@stop
