@extends('layouts.masterUser2')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div id="alert">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
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
                        <form action="{{ route('client-avater-update') }}" method="POST"
                            class="d-flex flex-column flex-wrap justify-content-center align-content-center"
                            enctype="multipart/form-data" class="d-flex flex-row">
                            @csrf
                            @method('put')
                            <label for="avater">
                                <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt="user-avatar"
                                    class="d-block rounded" height="150" width="150" id="uploadedAvatar" />
                                <input type="file" name="avater" id="avater" class="account-file-input" hidden />
                            </label>

                            <div class="button-wrapper mt-2">
                                <button type="submit" class=" btn btn-submit mb-4 .text-white " tabindex="0">
                                    <span class="d-none d-sm-block ">تغيير صورة البروفايل </span>

                                </button>
                            </div>
                        </form>
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
                        class="form-control rounded @error('dob') border-danger @enderror" />
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


                <button type="submit" class="btn btn-submit btn-hover  me-2  ">حفظ التغيرات</button>
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

        @error('modal')
            $("#{{ $message }}").toggleClass('show');
            $("#{{ $message }}").attr('style', "padding-left: 15px; display: block;");
            $("#{{ $message }}").attr('aria-modal', "true");
            $("#{{ $message }}").attr('role', "dialog");
        @enderror

        $("#avater").change(function(e) {
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                $(this).val("");
                $('#alert').html("<div class='alert alert-danger' role='alert'>نوع الصورة غير مقبول</div>");
            }

        });

        $(document).ready(function() {
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
