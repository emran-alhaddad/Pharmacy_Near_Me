@extends('layouts.masterUser')

@section('content')

    <!-- order Section -->
    <section class="col-lg-9 col-md-8 col-12" id="ord">
        {{-- <div id="alert_msg" class="alert alert-danger hide" role="alert">

        </div>
        <div id="success_msg" class="alert alert-success hide" role="alert">

        </div> --}}
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
        <form action="{{ route('client-orders-store') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="pharmacy_id" value="20">
            <input type="hidden" name="data" id="data" value="">
            <div class="card shadow p-3">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold text-prof">ارسال طلب </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">اسم العلاج </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="drug_title">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="drug_image" />
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">الكمية</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" min=1 id="quantity" value="1">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">أقبل البدائل </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="checkbox" id="accept_alternative">
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="row">
                        <div class="col-sm-3">
                             <a class=" btn btn-outline-primary" role="button " data-toggle="modal" data-target="#rep">
                            تكرار الطلبية
                        </a>
                        </div>

                    </div>
                    <hr> --}}
                    <div class="row">
                        <button type="button" onclick="addRequestDetail()" class="col-12 p-2 m-2 log-btn ">اضافة</button>
                    </div>

                </div>
            </div>
            <!-- detelis section -->
            <div class=" col-12 align-content-center" id="detelis">
                <div class="card p-3">
                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold text-prof">التفاصيل</h3>
                    </div>

                    <div class="card-body">
                        <div class="col-12" id="order_details_table">
                            <div class="row">
                                <div class="col-3">اسم العلاج </div>
                                <div class="col-3">صورة العلاج </div>
                                <div class="col-2">الكمية </div>
                                <div class="col-2">أقبل البدائل </div>
                                {{-- <div class="col-2">التكرار كل </div> --}}

                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <button id="send_request_btn" disabled type="submit" class="col-12 p-2 m-2 log-btn">ارسال
                                الطلبية </button>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section>


    <!-- Repeate modal -->
    <div class="modal fade" id="rep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-body fw-bold d-flex justify-content-lg-center align-items-center flex-column">
                    <h3 class="fs-4">تكرار الطلبية كل </h3>
                    <div class="col">
                        <div class="d-inline-block p-2">
                            <input type="number" min=0 max=30 id="day" placeholder="0">
                            <h3 class="text-center">يوم</h3>
                        </div>
                        <div class="d-inline-block  p-2">
                            <input type="number" min=0 max=12 id="month" placeholder="0">
                            <h3 class="text-center">شهر</h3>
                        </div>
                        <div class="d-inline-block  p-2">
                            <input type="number" min=0 max=12 id="year" placeholder="0">
                            <h3 class="text-center">سنه</h3>
                        </div>
                    </div>

                    <div class="row">
                        <h3 class="fs-4 col-6"> حتى تاريخ </h3>
                        <div class="input-group col-6">
                            <input type="date" id="repeat_until" aria-describedby="addon-wrapping" required value="" />
                        </div>

                    </div>

                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        تم
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var drugs = {
            'data': []
        };

        function addRequestDetail() {

            var data = $("#data");
            var drug_image = $("#drug_image");
            var drug_title = $("#drug_title");
            var quantity = $("#quantity");
            var accept_alternative = $("#accept_alternative");
            var day = $("#day");
            var month = $("#month");
            var year = $("#year");
            var repeat_until = $("#repeat_until");
            var order_details_table = $("#order_details_table");

            var drug = {};
            var repeat_every = 0;

            if (drug_image.val() != "") drug.drug_image = drug_image.val();
            else {
                if (drug_title.val() == "") {
                    $("#alert_msg").html("يجب عليك إدخال اسم العلاج أو صورة الروشتة");
                    $("#alert_msg").removeClass("hide");
                    $("#success_msg").addClass("hide");
                    return;
                }
                drug.drug_title = drug_title.val();
            }

            if (quantity.val() < 1) {
                $("#alert_msg").html(" كمية العلاج مرفوضة");
                $("#alert_msg").removeClass("hide");
                $("#success_msg").addClass("hide");
                return;
            }

            drug.quantity = quantity.val();

            if (accept_alternative.is(":checked")) drug.accept_alternative = 1;
            else drug.accept_alternative = 0;
            if (year.val()) repeat_every += parseInt(year.val()) * 360;
            if (month.val()) repeat_every += parseInt(month.val()) * 30;
            if (day.val()) repeat_every += parseInt(day.val());

            if (repeat_every > 0) drug.repeat_every = repeat_every;

            if (Date.parse(repeat_until.val())) drug.repeat_until = repeat_until.val();
            console.log(drug);
            if (!drug) {
                $("#alert_msg").html("يجب عليك إدخال البيانات قبل إدخالها ");
                $("#alert_msg").removeClass("hide");
                $("#success_msg").addClass("hide");

                return;
            }

            if (data.val() != "") drugs = JSON.parse(data.val());

            drugs.data.push({
                ...drug
            });

            data.val(JSON.stringify(drugs));

            $("#success_msg").html("تم إضافة العلاج بنجاح");
            $("#success_msg").removeClass("hide");
            $("#alert_msg").addClass("hide");

            accept_alt = drug.accept_alternative == 1 ? "نعم" : "لا";
            order_details_table.html(order_details_table.html() +
                "<div class='row'>" +
                "<div class='col-3'>" + drug_title.val() + "</div>" +
                "<div class='col-3'>" + drug_image.val() + "</div>" +
                "<div class='col-2'>" + quantity.val() + "</div>" +
                "<div class='col-2'>" + accept_alt + " </div>" +
                "<div class='col-2'>" + repeat_every + " يوم</div>" +
                "</div>" +
                "<hr>");

            if ($("#data").val())
                $("#send_request_btn").removeAttr("disabled");
            else
                $("#send_request_btn").addAttr("disabled");


        }

        var file = document.getElementById('someId');
        $("#drug_image").on('change', function(e) {
                var ext = this.value.match(/\.([^\.]+)$/)[1];
                switch (ext) {
                    case 'jpg':
                    case 'png':
                        break;
                    default:
                        $("#alert_msg").html("يجب أن تكون صورة الروشتة بأحد الصيغ التالية png او jpg فقط");
                        $("#alert_msg").removeClass("hide");
                        $("#success_msg").addClass("hide");
                        this.value = '';
                }});
    </script>


@stop
