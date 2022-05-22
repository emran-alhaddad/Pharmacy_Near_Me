@extends('layouts.masterFront')

@section('content')
    <style>
        html {
            direction: rtl;
        }

    </style>

    <section class="my-5 d-flex justify-content-center">
        <div class="wrapper bg-white p-2">
            <div class="row ">
                <div class="col">
                    <div class="card bg-white m-5 p-2">

                        <div class="card-header p-2 d-flex justify-content-between">
                            <h3>اضافة اعلان</h3>
                        </div>
                        <div class="card-content p-2">
                            @if (isset($error))
                                <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
                                    {!! $error !!}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif
                            @if (isset($status))
                                <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                                    {!! $status !!}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif

                            <form class="row g-3 mt-3" action={{ route('store-advertising-request') }} method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}" />
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="mb-3">

                                        <label for="exampleInputName" class="form-label"> وصف الاعلان</label>
                                        <input type="text" class="form-control" id="exampleInputName" name="descripe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputLink" class="form-label">رابط الموقع</label>
                                        <input type="text" class="form-control" id="exampleInputName" name="url">
                                    </div>

                                    <div class="row g-3">
                                        <div class="mb-3 col-6">
                                            <label for="exampleInputDate" class="form-label">تاريخ بداية الاعلان</label>
                                            <input type="date" id="startAt" name="startAt" min=@php echo date('Y-m-d'); @endphp
                                                value=@php echo date('Y-m-d'); @endphp class="form-control" id="exampleInputName">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="exampleInputLink" class="form-label">تاريخ نهاية الاعلان</label>
                                            <input type="date" id="endAt" name="endAt" min=@php echo Date('Y-m-d', strtotime('+1 days')); @endphp
                                                value=@php echo Date('Y-m-d', strtotime('+1 days')); @endphp class="form-control" id="exampleInputName">
                                        </div>
                                    </div>


                                    <div class="mb-3 ">
                                        <label for="exampleInputLink" class="form-label"> مكان الاعلان</label>
                                        <select class="form-select" id="position" aria-label="Default select example"
                                            name="position">
                                            <option selected value="3.2">الصفحة الرئيسية</option>
                                            <option value="1.6">أسفل الصفحة الرئيسية</option>
                                            <option value="0.8">على جانب صفحات اخرى</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">صورة الاعلان</label>
                                        <label for="advertising-image" class="form-label text-center w-100"
                                            style="background-color: #f8f8f8; border: 1px solid #01497c; cursor:pointer">
                                            <img id="advertising-image-preview"
                                                data-src="{{ asset('admin/img/work/plus.jpg') }}"
                                                src="{{ asset('admin/img/work/plus.jpg') }}" class="img-fluid"
                                                style="height: 120px;" title="إضغط لإختيار صورة الإعلان">
                                            <input class="form-control  file-change" name="image" type="file" hidden
                                                id="advertising-image" data-extentions="jpg,png,jpeg"
                                                data-preview="advertising-image-preview" />
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <div class="alert alert-success  text-center mt-2 fade show" role="alert">
                                            يتم إحتساب تكلفة نشر الإعلان بناء على موقع الإعلان داخل المنصة + الفرق بين تاريخ
                                            بداية ونهاية الإعلان
                                            <div id="price" class="fs-3 mt-1">

                                            </div>
                                            <input name="price" value="" type="hidden" />
                                        </div>
                                    </div>

                                </div>
                                <button id="submit_button" type="submit" class="main-btn btn-hover mt-5 mb-1">تقديم الإعلان</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            $('#position').on('change', function() { calcPrice(); });
            $('#startAt').on('change', function() { calcPrice(); });
            $('#endAt').on('change', function() {  calcPrice(); });


            function calcPrice() {
                var position = parseFloat($('#position').find(":selected").val());
                var start = new Date($('#startAt').val());
                var end = new Date($('#endAt').val());
                var diff = new Date(end - start);
                var days = diff / 1000 / 60 / 60 / 24;
                var price = (days * position).toFixed(2);

                $('#price').text('تكلفة إعلانك هي : ' +price+ "$");
                $('input[name="price"]').val(price);

            }

            $('#position').change();

        });
    </script>
@stop
