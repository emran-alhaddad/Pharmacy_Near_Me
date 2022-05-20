@extends('layouts.masterUser')

@section('content')


    <div class="layout-wrapper layout-content-navbar">



        <div class="layout-container">
            <!-- Menu -->

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-accept" aria-controls="navs-top-accept"
                                                aria-selected="true"> في انتظار القبول
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-paym" aria-controls="navs-top-paym"
                                                aria-selected="false">
                                                في انتظار الدفع
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-delevry" aria-controls="navs-top-delevry"
                                                aria-selected="false">
                                                في انتظار التوصيل
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-done" aria-controls="navs-top-done"
                                                aria-selected="false">
                                                مكتملة
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-none" aria-controls="navs-top-none"
                                                aria-selected="false">
                                                غير متوفره
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content mx-lg-4">








                                        <!-- Order Details  -->
                                        <div class="collapse mt-5" id="collapseExample">
                                            <div class="card">
                                                <h5 class="card-header"> تفاصيل الطلبية</h5>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>الرقم</th>
                                                                <th>اسم الدواء</th>
                                                                <th>صورةالدواء</th>
                                                                <th>الكمية</th>
                                                                <th>قبول البدائل</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>1</strong>
                                                                </td>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>بنادول</strong>
                                                                </td>
                                                                <td>
                                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                        data-bs-placement="top" class="avatar pull-up"
                                                                        title="الروشتة ">
                                                                        <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                                            class="rounded-circle" />
                                                                    </li>

                                                                </td>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>2</strong>
                                                                </td>
                                                                <td><span class="badge bg-label-danger me-1">لا</span></td>


                                                            </tr>
                                                            <tr>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>2</strong>
                                                                </td>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>مناديل</strong>
                                                                </td>
                                                                <td>
                                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                        data-bs-placement="top" class="avatar pull-up"
                                                                        title="الروشتة ">
                                                                        <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                                            class="rounded-circle" />
                                                                    </li>

                                                                </td>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>1</strong>
                                                                </td>
                                                                <td><span class="badge bg-label-success me-1">نعم</span>
                                                                </td>
                                                                < <td>

                                                                    </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Order Details  -->

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
@stop
