@extends('layouts.masterUser2')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
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

                        <button type="submit" class="btn btn-submit me-2"> <a href="{{ route('client-dashboard') }}"
                                style="color:#fff;"><i class="bx bx-user me-1"></i> البروفايل</a></button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}"><i class="bx bx-cog me-1"></i>
                            الاعدادات</a>
                    </li>
                    <!-- <li class="nav-item">
                                                    <a class="nav-link" href="pages-account-settings-connections.html"
                                                    ><i class="bx bx-link-alt me-1"></i> Connections</a
                                                    >
                                                </li> -->
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">تفاصيل البروفايل</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('uploads/avaters/client/'.Auth::user()->avater) }}" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
                            
                            <form action="{{ route('client-avater-update') }}" method="POST" class="g-3" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="button-wrapper">
                                <label for="upload" class=" btn btn-submit mb-4 .text-white " tabindex="0">
                                    <span class="d-none d-sm-block ">تغيير صورة البروفايل </span>

                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="avater" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">اعادة تعيين</span>
                                                        </button> -->

                                <p class="text-muted mb-0">مسموح فقط ب JPG, GIF or PNG. أكبر حجم هو 800K</p>
                            </div>
                        </form>
                            
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('client-password-update') }}" class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                تغيير كلمة المرور
                            </button>

                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2">
                                تغيير البريد
                            </button>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('client-dashboard-update') }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">اسم العميل </label>
                    <input class="form-control rounded @error('name') border-danger @enderror" value="{{ $user->name }}"
                        type="text" placeholder="اسم المستخدم" name="name" autofocus />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">تاريخ الميلاد</label>
                    <input value="{{ $user->client->dob }}" type="date" placeholder="تاريخ الميلاد" name="dob"
                        class="form-control rounded @error('phone') border-danger @enderror" />
                    @error('dob')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="Australia" class="form-label"> الجنس</label>
                    <select name="gender" id="gender" class="select2 form-select">
                        <option value="male" @if ($user->client->gender == 'male') selected @endif>ذكر</option>
                        <option value="female" @if ($user->client->gender == 'female') selected @endif>انثى</option>

                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">ye(+697)</span>
                        <input value="{{ $user->phone }}" type="tel" name="phone"
                            class="form-control rounded @error('phone') border-danger @enderror"
                            placeholder="777 777 777" />
                        @error('phone')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
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

    <script>
        $("#sendEmailCode").on('submit', function(e) {
            e.preventDefault();
            var token = $($("[name='_token']")[0]).val();
            var email = $("#currentEmail").val();
            var sendCodeBtn = $(".sendEmailCodeBtn");

            sendCodeBtn.text('جاري ارسال الرمز ...');
            console.log(sendCodeBtn);

            $.ajax({
                method: 'post',
                data: {
                    _token: token,
                    email: email
                },
                url: "{{ route('client-email-code') }}",
                success: function(data) {

                    if (data['type'] != 'danger')

                        $("#sendEmailCode").html(
                            "<div class='alert alert-" + data['type'] + "' role='alert'>" +
                            data['data'] +
                            "</div>" +
                            $("#sendEmailCode").html()
                        );
                    $("#currentEmail").attr('disabled', 'disabled');
                    $("#hiddenEmail").val(email);
                    $("#currentEmail").val(email);

                    sendCodeBtn.text('تم أرسال الرمز بنجاح');


                }
                error: function(error) {
                    sendCodeBtn.text('ارسل رمز التحقق مرة اخرى');
                }
            })
        })

        @error('modal')
            $("#{{ $message }}").toggleClass('show');
            $("#{{ $message }}").attr('style', "padding-left: 15px; display: block;");
            $("#{{ $message }}").attr('aria-modal', "true");
            $("#{{ $message }}").attr('role', "dialog");
        @enderror
    </script>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                    <form action="{{ route('client-password-update') }}" method="POST" class="g-3">
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

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تبديل البريد الالكتروني
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="sendEmailCode" action="{{ route('client-email-code') }}" method="POST"
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
                                        <input value="{{ $user->email }}" id='currentEmail' type="email"
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
                    <form action="{{ route('client-email-update') }}" method="POST" class="g-3">

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
                url: "{{ route('client-email-code') }}",
                success: function(data) {
                    if (data['type'] != 'danger')
                        {
                            $("#currentEmail").attr('disabled', 'disabled');
                            $('#send_email_code_btn').text('تم ارسال الكود');
                        }
                        else
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

        @error('modal')
            $("#{{ $message }}").toggleClass('show');
            $("#{{ $message }}").attr('style', "padding-left: 15px; display: block;");
            $("#{{ $message }}").attr('aria-modal', "true");
            $("#{{ $message }}").attr('role', "dialog");
        @enderror
    </script>

@stop
