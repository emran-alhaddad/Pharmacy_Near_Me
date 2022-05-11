@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:145px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">تغيير <span>كلمة المرور</span></h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {!! session('error') !!}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif
                    <form  action="{{ route('reset-password', $token) }}" method="POST">
                        @csrf
                         <input type="hidden" name="token" value="{{ $token }}">

                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input value="{{ old('email') }}"  type="email"  placeholder="example@gmail.com"  name="email" class="form-control rounded @error('email') border-danger @enderror">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group mb-3 rounded">
                                <span class="input-group-text rounded"style="background-color: var(--main-color)"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password"  placeholder="كلمة المرور" name="password"
                                class="form-control rounded @error('password') border-danger @enderror">
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="input-group mb-3 rounded" id="show_hide_password">
                                <span class="input-group-text rounded"style="background-color: var(--main-color)"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" placeholder="تأكيد كلمة المرور "  name="password_confirmation"
                                class="form-control rounded @error('password_confirmation') border-danger @enderror">
                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                              حفظ
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

 @stop


