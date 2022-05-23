@extends('layouts.masterFront')
<script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
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
                        <div class="alert alert-danger alert-dismissible mt-2 me-3 text-center" role="alert">
                            {!! session('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible mt-2 me-3 text-center" role="alert">
                            {!! session('status') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card " id="bill">
                        <div class="card-header">
                            <p class="" style="font-size: 30px;">فاتورة دفع </p>
                            <button class="btn btn-primary" id="print_bill">
                                طباعة الفاتورة
                            </button>
                        </div>
                        <div class="card-body mx-4">
                            <div class="container">

                                <div class="row">
                                    <ul class="list-unstyled d-flec flex-row">
                                        <li class="text-var(--main-color)">{{ $client['name'] }}</li>
                                        <li class="text-muted mt-1"><span class="text-var(--main-color)">رقم الفاتورة</span>
                                            #{{ $order_reference }}</li>
                                        <li class="text-var(--main-color) mt-1"> {{ $created_at }}</li>
                                    </ul>
                                    <hr>
                                </div>
                                @foreach ($products as $product)
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <p>{{ $product['product_name'] }}</p>
                                        </div>
                                        <div class="col-xl-2">
                                            <p>{{ $product['quantity'] }}</p>
                                        </div>
                                        <div class="col-xl-2">
                                            <p class="float-end">${{ $product['unit_amount'] }}
                                            </p>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach


                                <div class="row text-var(--main-color)">

                                    <div class="col-xl-12">
                                        <p class="float-end fw-bold">الاجمالي : {{ $paid_amount }}$
                                        </p>
                                    </div>
                                    <hr style="border: 2px solid var(--main-color);">
                                </div>

                                <div class="text-center p-4" role="button">
                                    <a><u class="text-info">العودة للبروفايل </u></a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#print_bill', function() {

            let pdf = new jsPDF();
            let section = $('#bill');
            let page = function() {
                pdf.save('bill.pdf');
            };
            pdf.addHTML(section, page);
        });
    </script>
@stop
