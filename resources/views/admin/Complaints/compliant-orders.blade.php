@extends('layouts.masterAdmin')
@section('admin_pages')
    <!-- Content -->
    <div class="wrapper bg-white">
        <div class="row">

            <div class=" mt-5" id="">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <!-- Order clint  -->
                        <table class="table table-hover shadow">
                            <thead>
                                <tr>

                                    <td> <a class="btn btn-primary" href={{route('admin-add_Complaints',['id'=>$com->id])}}
                                     role="button">
                                            <i class="bx bx-plus-circle me-1"></i> إضافة رد على الشكوى</a>
                                    </td>
                                    <td> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#" role="button">
                                            <i class="bx bx-plus-circle me-1"></i> فتح محادثة</a>
                                    </td>

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
                                                                    alt="Avatar" class="rounded-circle image_show">
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
                                                                                alt="Avatar"
                                                                                class="rounded-circle image_show">
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
                                                                                alt="Avatar"
                                                                                class="rounded-circle image_show">
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







@stop
