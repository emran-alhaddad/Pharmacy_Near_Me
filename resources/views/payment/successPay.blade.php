@extends('layouts.masterFront')

@section('content')

    {{-- payment --}}
    <section id="pay" class=" section radius" style="direction: rtl; margin: 120px 0px; z-index: 0; ">
        <div class="container mt-5">
            <div class="contact-head wow fadeInUp " data-wow-delay=".4s">
                <div class="row p-2  shadow radius mt-5">

                    <div class="alert alert-success alert-dismissible mt-2 me-3 text-center" role="alert">
                        تهانينا تمت عملية الدفع بنجاح
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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


                    <div class="card ">
                        <div class="card-body mx-4">
                            <div class="container">
                                <p class="my-5 mx-5" style="font-size: 30px;">فاتورة دفع </p>
                                <div class="row">
                                    <ul class="list-unstyled d-flec flex-row">
                                        <li class="text-var(--main-color)">هديل جميل </li>
                                        <li class="text-muted mt-1"><span class="text-var(--main-color)">رقم الفاتورة</span>
                                            #12345</li>
                                        <li class="text-var(--main-color) mt-1"> 17 ابريل 2021</li>
                                    </ul>
                                    <hr>
                                    <div class="col-xl-10">
                                        <p>مناديل</p>
                                    </div>
                                    <div class="col-xl-2">
                                        <p class="float-end">$50.00
                                        </p>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10">
                                        <p>بنادول</p>
                                    </div>
                                    <div class="col-xl-2">
                                        <p class="float-end">$50.00
                                        </p>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row text-var(--main-color)">

                                    <div class="col-xl-12">
                                        <p class="float-end fw-bold">الاجمالي : 100$
                                        </p>
                                    </div>
                                    <hr style="border: 2px solid var(--main-color);">
                                </div>

                                {{-- <div class="text-center p-4" role="button">
                                <a><u class="text-info">العودة للبروفايل </u></a>
                            </div> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



@stop
