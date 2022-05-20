@extends('layouts.masterFront')

@section('content')

    <div class="container-fluid radius " style=" margin-block-end: 50px;direction: rtl">
        <div class="radius" style="margin-top:145px">
            <div class=" d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="heading">لم يصلك <span>رابط تفعيل الحساب ؟</span></h3>
                    </div>
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
