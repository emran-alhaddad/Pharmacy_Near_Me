@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:145px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">نسيت <span>كلمة المرور؟</span></h3>
                    </div>

                    <form action="{{ route('forget-password') }}" method="POST">
                        @csrf
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input value="{{ old('email') }}" type="email" placeholder="example@gmail.com"
                                    name="email" class="form-control rounded @error('email') border-danger @enderror">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                                تغير كلمة المرور
                            </button>
                            <p class="text-center mt-5">هل تذكرت ؟

                                <span class="text-primary"> <a href="{{ route('login') }}"> الدخول للحساب</a></span>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
