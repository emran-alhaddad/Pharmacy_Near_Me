@extends('layouts.masterFront')


@section('content')

    <style>
        .picture-container {
            background-color: #f7f7f7;
            border: 1px solid #2b547a;
            padding-top: 20px;
            padding-bottom: 10px;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        html{
            direction:rtl;
        }
    </style>
    <script>

    </script>

    <div class="container-xxl flex-grow-1 container-p-y" style="direction:rtl;">
        <!-- Order  -->
         
        <div class="row gy-2 mb-1" style="margin-top:3rem;">
        <div class="col-4">
                <form action="{{ route('client-orders-store') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <input type="hidden" name="data" id="data" value="">
        <button id="send_request_btn" style="visibility:hidden;"  type="submit" class="main-btn btn-hover mt-5 mb-1"> ارسال الطلبية
                            بالكامل </button>
            </form>
        </div>
        </div>
        <div class="row mt-2">    
        <div class="card">
            <h5 class="card-header"> المنتجات المندرجة ضمن طلبك</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>اسم /صورة العلاج</th>
                            <th>الكمية </th>
                            <th>اقبل بديل </th>
                            <th>كرر الطلبية كل</th>
                            <th>حتى تاريخ </th>
                            <!-- <th>تقديم عرض</th> -->
                        </tr>
                    </thead>
                    <tbody id="order_details_table">
                        

                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
    <div id="alert_msg" class="alert alert-danger mt-2 mb-2" style="display:none" role="alert">

        </div>
        <div id="success_msg" class="alert alert-success mt-2 mb-2" style="display:none" role="alert">

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

        <div class="picture-container">
            <div class="picture">
                <img src="{{ asset('admin/img/work/plus.jpg') }}" class="picture-src" id="wizardPicturePreview"
                    title="">
                <input type="file" id="wizard-picture"  class="drug_image">
            </div>
            <h6 class="">اختر صورة </h6>

        </div>

        <div class="row m-4">
            <h2 class="text-center">
                او
            </h2>
        </div>

        <div class="form-group" style="direction:rtl;">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <label for="usr"> اسم العلاج</label>
                    <input type="text" class="form-control" id="drug_title">

                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for="usr">الكمــــية</label>
                    <input class="form-control" type="number" min=1 id="quantity" value="1">

                </div>
            </div>


            <div class="row">
                <div class=" col-lg-9 col-sm-12">
                    <div class="text-center section-title mb-3">
                    </div>

                    <div class="box-style sidebar-pharmacy">

                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" id="accept_alternative" >
                            اقبل بديل في حالة عدم توفره
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" id="accept_repeate">
                            اريد تكرار هذا الطلب بشكل تلقائي
                        </li>

                        <li class="list-group-item mt-5" id="repeate_form" style="display:none">
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
                                                <span class="input-group-text rounded"
                                                    style="background-color: var(--main-color)"><i
                                                        class="bi bi-person-plus-fill text-white"></i></span>
                                                <input placeholder="تاريخ إنتهاء تكرار الطلب" type="date" id="repeat_until"
                                                    class="form-control rounded ">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>

                        <li class="list-group-item mt-2">
                            <div class="row justify-content-center gy-2 m-3">
                        <button  onclick="addRequestDetail()" class="main-btn btn-hover">اضافة المنتج الى الطلبية </button>
                    </div>
                        </li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      
      var drugs = {
            'data': []
        };

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

            if (drug_image.val() != "")  {
                drug.drug_image = drug_image.val();  
                drug_title_image = "<img src='"+drug.drug_image+"' >";
            }
            else {
                if (drug_title.val() == "") {
                    $("#alert_msg").html("يجب عليك إدخال اسم العلاج أو صورة الروشتة");
                    $("#alert_msg").css("display","block");
                    $("#success_msg").css("display","none");
                    return;
                }
                drug.drug_title = drug_title_image = drug_title.val();
            }

            if (quantity.val() < 1) {
                $("#alert_msg").html(" كمية العلاج مرفوضة");
                $("#alert_msg").css("display","block");
                $("#success_msg").css("display","none");
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
                $("#alert_msg").css("display","block");
                $("#success_msg").css("display","none");
                return;
            }

            if (data.val() != "") drugs = JSON.parse(data.val());

            drugs.data.push({
                ...drug
            });

            data.val(JSON.stringify(drugs));

            $("#success_msg").html("تم إضافة العلاج بنجاح");
            $("#success_msg").css("display","block");
            $("#alert_msg").css("display","none");

            accept_alt = drug.accept_alternative == 1 ? "نعم" : "لا";
            
            order_details_table.html(order_details_table.html() +
                        "<tr>"+
                            "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong> " + drug_title_image + " </strong></td>"+
                            "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>" + quantity.val() + "</strong></td>"+
                            "<td><span class='badge bg-label-warning me-1'>" + accept_alt + " </span></td>"+
                            "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>" + repeat_every + " يوم</strong></td>"+
                            "<td><i class='fab fa-angular fa-lg text-danger me-3'></i> <strong>"+repeat_until.val()+"</strong></td>"+
                        "</tr>");

            if ($("#data").val())
                $("#send_request_btn").css("visibility","visible");
            else
            $("#send_request_btn").css("visibility","hidden");

            $(".drug_image").val("");
            $("#drug_title").val("");
            $("#quantity").val("");
            $("#accept_alternative").prop('checked', false);
            $("#day").val("");
            $("#month").val("");
            $("#year").val("");
            $("#repeat_until").val("");
            $("#accept_repeate").prop('checked', false);
            $("#repeate_form").css("display","none");

        }

        $(".drug_image").on('change', function(e) {
            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'png':
                $("#alert_msg").css("display","none");
                    $("#success_msg").css("display","none");
                    break;
                default:
                    $("#alert_msg").html("يجب أن تكون صورة الروشتة بأحد الصيغ التالية png او jpg فقط");
                    $("#alert_msg").css("display","block");
                    $("#success_msg").css("display","none");
                    this.value = '';
            }
        });

        $("#accept_repeate").on("change", function(e) {
            if($("#accept_repeate").is(":checked"))
            $("#repeate_form").css("display","block");
            else
            $("#repeate_form").css("display","none");
        });
        


    </script>

@stop
