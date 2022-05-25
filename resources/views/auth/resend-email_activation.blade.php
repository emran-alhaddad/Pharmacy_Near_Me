@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:145px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">لم يصلك <span>رابط تفعيل الحساب ؟</span></h3>
                    </div>

                    <form action="{{ route('resend-email-activation') }}" method="POST">
                        @csrf
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                        class="bi bi-envelope-fill text-white"></i></span>
                                <input type="email" class="form-control rounded" placeholder="example@gmail.com"
                                    name="email" required>
                            </div>


                            <button class="btn-submit radius text-center p-2 col-12 mt-2 btn-hover" type="submit">
                                ارسال رابط التفعيل
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
