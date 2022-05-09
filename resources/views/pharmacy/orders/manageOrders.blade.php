@extends('layouts.masterPharmacy')

@section('content')
 <!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
    <div class="col-xl-12">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <button
                    type="button"
                    class="nav-link active"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-accept"
                    aria-controls="navs-top-accept"
                    aria-selected="true"
                >  في انتظار القبول
                </button>
                </li>
                <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-paym"
                    aria-controls="navs-top-paym"
                    aria-selected="false"
                >
                    في انتظار الدفع
                </button>
                </li>
                <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-delevry"
                    aria-controls="navs-top-delevry"
                    aria-selected="false"
                >
                    في انتظار التوصيل
                </button>
                </li>
                    <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-done"
                    aria-controls="navs-top-done"
                    aria-selected="false"
                >
                    مكتملة
                </button>
                </li>
                    <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-top-none"
                    aria-controls="navs-top-none"
                    aria-selected="false"
                >
                    غير متوفره
                </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active shadow" id="navs-top-accept" role="tabpanel">
                <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                    <!-- <th>العمليات</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-secondary me-1">في انتظار القبول</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',1) }}"

                                    role="button"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-secondary me-1">في انتظار القبول</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                <div class="tab-pane fade shadow" id="navs-top-paym" role="tabpanel">
                    <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                    <!-- <th>العمليات</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-warning me-1">في انتظار الدفع</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',4) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-warning me-1">في انتظار الدفع</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',5) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade shadow" id="navs-top-delevry" role="tabpanel">
                <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-info me-1">في انتظار التوصيل</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',6) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-info me-1">في انتظار التوصيل</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>

                <div class="tab-pane fade shadow" id="navs-top-delevry" role="tabpanel">
                <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-success me-1">مكتملة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-success me-1">مكتملة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>

                <div class="tab-pane fade" id="navs-top-done" role="tabpanel">
                <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-success me-1">مكتملة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-success me-1">مكتملة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                <div class="tab-pane fade" id="navs-top-none" role="tabpanel">
                <div class="card">
                    <h5 class="card-header"> الطلبات</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ الطلبية </th>
                                    <th>حالة الطلبية </th>
                                    <th>سعر الطلبية </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-danger me-1">غير متوفرة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلبية</a></td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                                    <td><span class="badge bg-label-danger me-1">غير متوفرة</span></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td> <a  class="demo-inline-spacing" href="{{ route('pharmacy-order-details',3) }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"> تفاصيل الطلب</a></td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>


    </div>

</div>
@stop
