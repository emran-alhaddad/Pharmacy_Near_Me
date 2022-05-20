@extends('layouts.masterUser')

@section('content')

    <style>
        .modal.show .modal-dialog {
            max-width: fit-content
        }

    </style>

    <!-- info Section -->
    <section class="col-lg-9 col-md-8 col-12">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
                {!! session('error') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                {!! session('status') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <div class="card shadow p-3">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-prof">تعديل المعلومات الشخصية</h3>
            </div>

            <form action="{{ route('client-dashboard-update') }}" method="POST" class="card-body">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">الاسم الكامل </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="input-group mb-3">
                            <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                    class="bi bi-person-plus-fill text-white"></i></span>
                            <input value="{{ $user->name }}" type="text" placeholder="اسم المستخدم" name="name"
                                class="form-control rounded @error('name') border-danger @enderror">
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">تاريخ الميلاد </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input value="{{ $user->client->dob }}" type="date" placeholder="تاريخ الميلاد"
                                        name="dob" class="form-control rounded @error('dob') border-danger @enderror">
                                    @error('dob')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الجنس</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3 rounded">
                                    <div class="dropdown col-12">
                                        <select name="gender" id="gender" class="col-12 rounded form-control">
                                            <option value="male" @if ($user->client->gender == 'male') selected @endif>
                                                ذكــر
                                            </option>
                                            <option value="female" @if ($user->client->gender == 'female') selected @endif>
                                                أنثــى
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">رقم الهاتف</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="input-group mb-3">
                            <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                    class="bi bi-person-plus-fill text-white"></i></span>
                            <input value="{{ $user->phone }}" type="tel" placeholder="رقم الهاتف" name="phone"
                                class="form-control rounded @error('phone') border-danger @enderror">
                            @error('phone')
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
                        <h6 class="mb-0">العنــوان</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="input-group mb-3">
                            <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                    class="bi bi-person-plus-fill text-white"></i></span>
                            <input value="{{ $user->client->address }}" type="text" placeholder="العنــوان" name="address"
                                class="form-control rounded @error('address') border-danger @enderror">
                            @error('address')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col">
                        <h6 class="mb-0">
                            <a role="button" id="edit_email_btn" data-toggle="modal" data-target="#edit-email">
                                تبديل البريد الالكتروني
                            </a>
                        </h6>
                    </div>

                    <div class="col">
                        <h6 class="mb-0">
                            <a role="button" id="edit_password_btn" data-toggle="modal" data-target="#edit-password">
                                تغيير كلمة السر
                            </a>
                        </h6>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col">
                        <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                            تحديث البروفايل
                        </button>
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </section>

    <!-- edit password -->
    <div class="modal fade" id="edit-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تغيير كلمة المرور
                    </h4>
                    <button type="button" class="btn-close col-2" data-dismiss="modal" aria-label="Close"></button>
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


    <!-- edit email -->
    <div class="modal fade" id="edit-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تبديل البريد الالكتروني
                    </h4>
                    <button type="button" class="btn-close col-2" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="sendEmailCode" action="{{ route('client-email-code') }}" method="POST"
                        class="row">
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
                                    <button class="btn-submit radius text-center p-2 col-12 mt-2">
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
        $(window).on('load', function() {
            @error('modal')
                $("#{{ $message }}").modal('show');
            @enderror

        });
        $("#sendEmailCode").on('submit', function(e) {
            e.preventDefault();
            var token = $($("#sendEmailCode [name='_token']")[0]).val();
            var email = $("#currentEmail").val();
            $.ajax({
                method: 'post',
                data: {
                    _token: token,
                    email: email
                },
                url: "{{ route('client-email-code') }}",
                success: function(data) {
                    $("#hiddenEmail").val($("#currentEmail").val());
                    if (data['type'] != 'danger')
                        $("#currentEmail").attr('disabled', 'disabled');
                    $("#sendEmailCode").html(
                        "<div class='alert alert-" + data['type'] + "' role='alert'>" +
                        data['data'] +
                        "</div>" +
                        $("#sendEmailCode").html()
                    );

                }


            })
        })
    </script>


@stop
