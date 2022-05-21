@extends('layouts.masterPharmacy')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class=" mt-5" id="">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <!-- Order clint  -->
                        <table class="table table-hover shadow">
                            <thead>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar pull-up" title="بروفايل العميل" style="list-style-type: none;">
                                            <img src="{{ asset('uploads/avaters/client/' . $request->client->user->avater) }}"
                                                alt="Avatar" class="rounded-circle" />
                                        </li>

                                    </td>
                                    <td><i
                                            class="fab fa-angular fa-lg text-danger me-3"></i>{{ $request->client->user->name }}
                                    </td>
                                    <td><span
                                            class="badge text-black me-1"><strong>{{ $request->created_at->diffForHumans() }}</strong></span>
                                    </td>

                                    @if ($request->state == \App\Utils\RequestState::WAIT_ACCEPTANCE)
                                        <td><span class="badge bg-label-secondary me-1">في انتظارالقبول</span></td>
                                    @elseif ($request->state == \App\Utils\RequestState::ACCEPTED)
                                        <td><span class="badge bg-label-warning me-1">في انتظار الدفع</span></td>
                                    @elseif ($request->state == \App\Utils\RequestState::WAIT_DELIVERY)
                                        <td><span class="badge bg-label-info me-1">في انتظار التوصيل</span></td>
                                    @elseif ($request->state == \App\Utils\RequestState::FINISHED)
                                        <td><span class="badge bg-label-success me-1">مكتملة</span></td>
                                    @elseif ($request->state == \App\Utils\RequestState::REJECTED)
                                        <td><span class="badge bg-label-danger me-1">غير متوفرة</span></td>
                                    @elseif ($request->state == \App\Utils\RequestState::NOT_COMPLETED)
                                        <td><span class="badge bg-label-danger me-1">مرفوضه من قبل العميل</span></td>
                                    @endif
                                    <td> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#" role="button">
                                            <i class="bx bx-plus-circle me-1"></i> ارسال رسالة</a></td>
                                    @if ($request->state == \App\Utils\RequestState::WAIT_ACCEPTANCE)
                                        <td> <a class="btn btn-outline-danger"
                                                href="{{ route('pharmacy-order-reject', $request->id) }}" role="button">
                                                غير متوفرة</a></td>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                        <!-- Order clint  -->

                        <!-- Order Details  -->
                        <div class=" m-4 shadow" id="">
                            <div class="card">
                                <h5 class="card-header"> تفاصيل الطلبية</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>الرقم</th>
                                                <th>اسم / صورة الدواء</th>
                                                <th>الكمية</th>
                                                <th>قبول البدائل</th>
                                                <th>تقديم عرض</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($request->details as $requestDetails)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $loop->iteration }}</strong>
                                                    </td>
                                                    <td>
                                                        @if ($requestDetails->drug_image)
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" class="avatar pull-up"
                                                                title="صورة العلاج " style="list-style-type: none;">
                                                                <img src="{{ asset('uploads/requests/' . $requestDetails->drug_image) }}"
                                                                    alt="Avatar" class="rounded-circle">
                                                            </li>
                                                        @endif
                                                        <strong>{{ $requestDetails->drug_title }}</strong>
                                                    </td>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $requestDetails->quantity }}</strong>
                                                    </td>

                                                    @if ($requestDetails->accept_alternative)
                                                        <td><span class="badge bg-label-success me-1">نعم</span></td>
                                                    @else
                                                        <td><span class="badge bg-label-danger me-1">لا</span></td>
                                                    @endif
                                                    @if ($request->state == \App\Utils\RequestState::WAIT_ACCEPTANCE)
                                                        <td> <a class="dropdown-item" onclick="$('#req_det_id').val('{{ $requestDetails->id }}');
                                                                            @if ($requestDetails->accept_alternative) $('#alternative').css('visibility','visible');
                                                                @else
                                                                $('#alternative').css('visibility','hidden'); @endif
                                                                            " href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#basicModal"
                                                                role="button"><i class="bx bx-plus-circle me-1"></i> عرض
                                                                سعر</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Order Details  -->

                        <!-- added replies -->
                        <div class=" m-4 shadow">
                            <div class="alert_msg alert alert-danger mt-2 mb-2" style="display:none" role="alert">

                            </div>
                            @if (session('error'))
                                <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success mt-2 mb-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div id="success_msg" class="alert alert-success mt-2 mb-2" style="display:none" role="alert">

                            </div>
                            <div class="card">
                                <h5 class="card-header">الردود المضافة </h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>اسم / صورة الدواء</th>
                                                <th>الكمية</th>
                                                <th>السعر</th>
                                                <th> نوع الرد</th>
                                            </tr>
                                        </thead>
                                        @if ($request->state != \App\Utils\RequestState::WAIT_ACCEPTANCE)
                                            <tbody>
                                                @foreach ($request->replies->details as $replyDetails)
                                                @php
                                                    $requestDetails = $request->details->where('id', '=', $replyDetails->request_details_id)->first();
                                                @endphp 
                                                    @if ($replyDetails->request_details_id == $requestDetails->id)
                                                        <tr>
                                                            @if ($replyDetails->drug_price)
                                                                <td>
                                                                    @if ($requestDetails->drug_image)
                                                                        <li data-bs-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-bs-placement="top" class="avatar pull-up"
                                                                            title="صورة العلاج "
                                                                            style="list-style-type: none;">
                                                                            <img src="{{ asset('uploads/requests/' . $requestDetails->drug_image) }}"
                                                                                alt="Avatar" class="rounded-circle">
                                                                        </li>
                                                                    @endif
                                                                    <strong>{{ $requestDetails->drug_title }}</strong>
                                                                </td>
                                                                <td><strong>{{ $requestDetails->quantity }}</strong>
                                                                </td>
                                                                <td><strong>{{ $replyDetails->drug_price }}</strong></td>

                                                                <td><i class='fab fa-angular fa-lg text-success me-3'></i>
                                                                    <strong>اساسي </strong>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    @if ($replyDetails->alt_drug_image)
                                                                        <li data-bs-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-bs-placement="top" class="avatar pull-up"
                                                                            title="صورة العلاج "
                                                                            style="list-style-type: none;">
                                                                            <img src="{{ asset('uploads/replies/' . $replyDetails->alt_drug_image) }}"
                                                                                alt="Avatar" class="rounded-circle">
                                                                        </li>
                                                                    @endif
                                                                    <strong>{{ $replyDetails->alt_drug_title }}</strong>
                                                                </td>
                                                                <td><strong>{{ $requestDetails->quantity }}</strong>
                                                                </td>
                                                                <td><strong>{{ $replyDetails->alt_drug_price }}</strong>
                                                                </td>
                                                                <td><i class='fab fa-angular fa-lg text-danger me-3'></i>
                                                                    <strong>بديل </strong>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        @endif

                                        <tbody id="order_details_table">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="d-flex justify-content-center">

                                                        <form action="{{ route('pharmacy-order-reply', $request->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="client_id"
                                                                value="{{ $request->client_id }}">
                                                            <input type="hidden" name="pharmacy_id"
                                                                value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="data" id="data" value="">
                                                            <input type="file" name="images[]" multiple hidden id="images">
                                                            <button id="send_request_btn" class="btn btn-submit"
                                                                style="visibility:hidden;" type="submit">ارسال
                                                                الردود</button>
                                                        </form>

                                                    </div>

                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /added replies -->
                    </div>
                </div>
            </div>
            <!-- Order Details  -->
        </div>
    </div>
    <!--/ Content -->
    <input type="hidden" id="req_det_id" value="">

    <!--modal  -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel1">انشاء عرض
                        سعر </h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active btn-submit" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                                    aria-selected="true">
                                    أساسي
                                </button>
                            </li>
                            <li class="nav-item" id="alternative">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                                    aria-selected="false">
                                    بديل
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                                <div class="col mb-3">
                                    <label for="drug_price" class="form-label">سعر
                                        المنتج</label>
                                    <input type="text" id="drug_price" class="form-control"
                                        placeholder="ادخل سعر المنتج " />
                                </div>

                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                <div class="alert_msg alert alert-danger mt-2 mb-2" style="display:none" role="alert">

                                </div>
                                <div class="col mb-3">
                                    <label for="alt_drug_image" class="form-label">صورة العلاج
                                        البديل</label>
                                    <input class="form-control" type="file" id="alt_drug_image" />
                                </div>
                                <div class="col mb-3">
                                    <label for="alt_drug_title" class="form-label">اسم العلاج
                                        البديل</label>
                                    <input type="text" id="alt_drug_title" class="form-control"
                                        placeholder="ادخل  اسم العلاج " />
                                </div>
                                <div class="col mb-3">
                                    <label for="alt_drug_price" class="form-label"> سعر العلاج
                                        البديل</label>
                                    <input type="text" id="alt_drug_price" class="form-control"
                                        placeholder="ادخل سعر البديل " />
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        الغاء
                    </button>
                    <button type="button" onclick="addReplyDetails();" data-bs-dismiss="modal" class="btn btn-submit">تثبيت
                        الرد
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        var drugs = {
            'data': []
        };


        function addReplyDetails() {

            var data = $("#data");
            var alt_drug_image = $("#alt_drug_image");
            var alt_drug_title = $("#alt_drug_title");
            var alt_drug_price = $("#alt_drug_price");
            var drug_price = $("#drug_price");
            var order_details_table = $("#order_details_table");
            var drug = {};

            var drug_title_image = "";
            var reply_type = "";
            var req_det_id = $('#req_det_id').val();
            var price = "";



            if (drug_price.val() != "") {
                drug.drug_price = drug_price.val();
                price = drug_price.val();
                drug_title_image = "الطلبية الأساسية"
                reply_type = "أساسي";
            } else if (alt_drug_image.val() != "" || alt_drug_title.val() != "") {

                if (alt_drug_image.val() != "") {
                    drug.alt_drug_image = alt_drug_image.val();
                    drug_title_image = "<img  src='" + window.URL.createObjectURL(alt_drug_image.prop('files')[0]) +
                        "' alt='Avatar' class='rounded-circle' />";
                    reply_type = "بديل";

                } else if (alt_drug_title.val() != "") {
                    drug.alt_drug_title = alt_drug_title.val();
                    drug_title_image = alt_drug_title.val();
                    reply_type = "بديل";
                } else {
                    $(".alert_msg").html("يجب عليك إدخال اسم العلاج أو صورة العلاج/الروشتة");
                    $(".alert_msg").css("display", "block");
                    $("#success_msg").css("display", "none");
                    return;
                }


                if (alt_drug_price.val() != "") {
                    drug.alt_drug_price = alt_drug_price.val();
                    price = alt_drug_price.val();
                } else {
                    $(".alert_msg").html("يجب عليك إدخال سعر للعلاج البديل بناء على الكمية المطلوبة");
                    $(".alert_msg").css("display", "block");
                    $("#success_msg").css("display", "none");
                    return;
                }

            } else {
                $(".alert_msg").html("يجب عليك إدخال وضع تسعيرة أو اقتراح بدائل");
                $(".alert_msg").css("display", "block");
                $("#success_msg").css("display", "none");
                return;
            }

            drug.request_details_id = req_det_id;
            console.log(drug);

            if (data.val() != "") drugs = JSON.parse(data.val());

            drugs.data.push({
                ...drug
            });

            data.val(JSON.stringify(drugs));

            $("#success_msg").html("تم إضافة الرد بنجاح");
            $("#success_msg").css("display", "block");
            $(".alert_msg").css("display", "none");


            order_details_table.html(order_details_table.html() +
                "<tr>" +
                "<td>" +
                "   <li data-bs-toggle='tooltip' data-popup='tooltip-custom'" +
                "      data-bs-placement='top' class='avatar pull-up' title='الروشتة '" +
                "     style='list-style-type: none;'>" +
                "    <strong>" + drug_title_image + "</strong>" +
                "</li>" +
                "</td>" +
                "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>نفس طلب العميل</strong>" +
                "</td>" +
                "<td><i class='fab fa-angular fa-lg text-danger me-3'></i>" +
                "    <strong>" + price + "</strong>" +
                "</td>" +
                "<td><i class='fab fa-angular fa-lg text-danger me-3'></i>" +
                "    <strong>" + reply_type + "</strong>" +
                "</td>" +
                "</tr>");

            if ($("#data").val())
                $("#send_request_btn").css("visibility", "visible");
            else
                $("#send_request_btn").css("visibility", "hidden");

            $("#drug_price").val("");
            $("#alt_drug_title").val("");
            $("#alt_drug_price").val("");
            $("#alt_drug_image").val("");

        }

        let file = document.querySelector("#alt_drug_image");
        let back = document.getElementById("images");
        let dt = new DataTransfer();


        $("#alt_drug_image").on('change', function(e) {
            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'png':
                    let files = this.files;
                    for (let i = 0; i < files.length; i++) {
                        let f = files[i];
                        dt.items.add(
                            new File(
                                [f.slice(0, f.size, f.type)],
                                f.name
                            ));
                    }
                    back.files = dt.files;
                    $(".alert_msg").css("display", "none");
                    $("#success_msg").css("display", "none");
                    break;
                default:
                    $(".alert_msg").html("يجب أن تكون صورة الروشتة بأحد الصيغ التالية png او jpg فقط");
                    $(".alert_msg").css("display", "block");
                    $("#success_msg").css("display", "none");
                    this.value = '';
            }
        });
    </script>

@stop
