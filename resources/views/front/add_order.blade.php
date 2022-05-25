@extends('layouts.masterFront')


@section('content')

    <style>
        ..pictures {
            /* background-color: #f7f7f7; */
            border: 1px solid var(--main-color);

        }


        html {
            direction: rtl;
        }

        .form-check-input {
            width: 26px;
            height: 22px;
            border-radius: var(--radius);
            background: #fff;
            font-size: 10px;
            padding: 3px;
            /* margin: 0.5rem; */
            transition: all 0.3s ease-out 0s;
            border: 1px solid var(--main-color);
        }

        .divider::after,
        .divider::before {
            border-bottom: 1px solid var(--main-color);
        }

    </style>

    <section class="my-5 d-flex justify-content-center p-4">

        <div class="card my-5 p-2 d-flex justify-content-center shadow radius">
            <div id="alert-error" class="alert alert-danger mt-2 mb-2" style="display:none" role="alert">

            </div>
            <div id="alert-success" class="alert alert-success mt-2 mb-2" style="display:none" role="alert">

            </div>
           
            <div class="mb-3">
                <h2 class="text-center divider mb-5">
                    لتقديم طلب دواء قم بإضافة
                </h2>
                <h5 class="text-center">صورة الروشتة</h5>
                <label for="request-image" class="form-label text-center w-100"
                    style="background-color: #f8f8f8; border: 1px solid #01497c; cursor:pointer">
                    <img id="request-image-preview" data-src="{{ asset('admin/img/work/plus.jpg') }}"
                     src="{{ asset('admin/img/work/plus.jpg') }}" class="img-fluid"
                        style="height: 120px;" title="إضغط لإختيار صورة الروشتة">
                    <input class="form-control drug_image file-change" type="file" hidden id="request-image"
                        data-extentions="jpg,png" data-preview="request-image-preview" />
                </label>
            </div>

            <div class=" col-12">
                <h2 class="text-center divider">
                    او
                </h2>
            </div>
            <div class="form-group p-2" style="direction:rtl;">
                <div class="row px-2">
                    <div class="col-lg-8 col-sm-12">
                        <label for="usr"> اسم العلاج</label>
                        <input type="text" class="form-control" id="drug_title">

                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="usr">الكمــــية</label>
                        <input class="form-control" type="number" min=1 id="quantity" value="1">

                    </div>
                </div>
                <div class="row px-2">
                    <ul class="p-2">

                        <li class="list-group-item m-1 radius">
                            <input class="form-check-input me-1 p-2 " type="checkbox" id="accept_alternative">
                            اقبل بديل في حالة عدم توفره
                        </li>
                        <li class="list-group-item m-1 radius ">
                            <input class="form-check-input p-2 me-1 " type="checkbox" id="accept_repeate">
                            اريد تكرار هذا الطلب بشكل تلقائي
                        </li>
                        {{-- Order repeat --}}
                        <li class="list-group-item mt-5 radius" id="repeate_form" style="display:none">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">تكرار الطلبية كل </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="input-group mb-3">

                                        <input type="number" min=0 max=30 id="day" placeholder=" اليوم"
                                            class="form-control rounded ">
                                        <input type="number" min=0 max=12 id="month" placeholder=" الشهر"
                                            class="form-control rounded ">
                                        <input type="number" min=0 max=12 id="year" placeholder=" السنة"
                                            class="form-control rounded ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">حتى تاريخ </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="input-group mb-3">
                                                <input placeholder="تاريخ إنتهاء تكرار الطلب" type="date" id="repeat_until"
                                                    class="form-control rounded ">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                        <div class="row justify-content-center gy-2 m-3 ">
                            <button onclick="addRequestDetail()" class="main-btn btn-hover">اضافة المنتج الى الطلبية
                            </button>
                        </div>
                    </ul>
                </div>
            </div>

            <div class="container flex-grow-1" style="direction:rtl;">
                <!-- Order  -->
                <div class="">
                    <div class="box-style">
                        <h5 class="card-header" style="background-color: var(--hover-main); color:#fff"> المنتجات
                            المندرجة ضمن طلبك</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>اسم /صورة العلاج</th>
                                        <th>الكمية </th>
                                        <th>اقبل بديل </th>
                                        <th>كرر الطلبية كل</th>
                                        <th>حتى تاريخ </th>
                                    </tr>
                                </thead>
                                <tbody id="order_details_table">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row gy-2 mb-1" style="margin-top:3rem;">
                    <div class="col-4">
                        <form action="{{ route('client-orders-store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
                            <input type="hidden" name="data" id="data" value="">
                            <input type="file" name="images[]" multiple hidden id="images">
                            <button id="send_request_btn" style="visibility:hidden;" type="submit"
                                class="main-btn btn-hover mt-5 mb-1"> ارسال الطلبية </button>
                        </form>
                    </div>
                </div>
            </div>


        </div>


    </section>

    <script>
        var drugs = {
            'data': []
        };
        let dataTransfere = new DataTransfer();

        function addRequestDetail() {

            var data = $("#data");
            var drug_image = $(".drug_image");
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
            var drug_title_image = "";
            drug_title_image = "";

            if (drug_image.val() != "") {
                drug.drug_image = drug_image.val();
                drug_title_image = "<img class='image_show' width='50px' src='" + window.URL.createObjectURL(drug_image.prop('files')[0]) +"' >";

            } else {
                if (drug_title.val() == "") {
                    $("#alert-error").html("يجب عليك إدخال اسم العلاج أو صورة الروشتة");
                    $("#alert-error").css("display", "block");
                    $("#alert-success").css("display", "none");
                    return;
                }
                drug.drug_title = drug_title_image = drug_title.val();
            }

            if (quantity.val() < 1) {
                $("#alert-error").html(" كمية العلاج مرفوضة");
                $("#alert-error").css("display", "block");
                $("#alert-success").css("display", "none");
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
                $("#alert-error").html("يجب عليك إدخال البيانات قبل إدخالها ");
                $("#alert-error").css("display", "block");
                $("#alert-success").css("display", "none");
                return;
            }

            if (data.val() != "") drugs = JSON.parse(data.val());

            drugs.data.push({
                ...drug
            });


            data.val(JSON.stringify(drugs));

            let uploading = document.getElementById("images");
            let files = drug_image.prop('files');
            for (let i = 0; i < files.length; i++) {
                let f = files[i];
                dataTransfere.items.add(
                    new File(
                        [f.slice(0, f.size, f.type)],
                        f.name
                    ));
            }


            if (uploading != null)
                uploading.files = dataTransfere.files;
            $("#alert-success").html("تم إضافة العلاج بنجاح");
            $("#alert-success").css("display", "block");
            $("#alert-error").css("display", "none");

            accept_alt = drug.accept_alternative == 1 ? "نعم" : "لا";

            var row = "<tr>" +
                "<td><strong> " + drug_title_image + " </strong></td>" +
                "<td> <strong>" + quantity.val() + "</strong></td>";

            row += drug.accept_alternative == 1 ?
                "<td><span class='badge bg-success me-1'>" + accept_alt + " </span></td>" :
                "<td><span class='badge bg-danger me-1'>" + accept_alt + " </span></td>";

            row +=
                "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>" + repeat_every +
                " يوم</strong></td>" +
                "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>" + repeat_until.val() +
                "</strong></td>" +
                "</tr>";

            order_details_table.html(order_details_table.html() + row);

            if ($("#data").val())
                $("#send_request_btn").css("visibility", "visible");
            else
                $("#send_request_btn").css("visibility", "hidden");

            $(".drug_image").val("");
            $("#drug_title").val("");
            $("#quantity").val(1);
            $("#accept_alternative").prop('checked', false);
            $("#day").val("");
            $("#month").val("");
            $("#year").val("");
            $("#repeat_until").val("");
            $("#accept_repeate").prop('checked', false);
            $("#repeate_form").css("display", "none");
            $("#request-image-preview").attr("src",$("#request-image-preview").attr("data-src"));
            
            window.scrollTo(0, 1000);

        }
    </script>

@stop
