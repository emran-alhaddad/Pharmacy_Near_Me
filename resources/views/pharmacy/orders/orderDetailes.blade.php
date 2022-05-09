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
                            <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar pull-up"
                                title="بروفايل العميل"
                                style="list-style-type: none;">
                                <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" alt="Avatar" class="rounded-circle" />
                            </li>

                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> هيثم جميل </td>
                            <td><span class="badge text-black me-1"><strong>2022-5-2</strong></span></td>
                            <td><span class="badge bg-label-success me-1">مكتمل</span></td>
                            <td> <a class="dropdown-item" href="javascript:void(0);"
                                data-bs-toggle="modal"
                                data-bs-target="#"
                                role="button">
                                <i class="bx bx-plus-circle me-1"></i> ارسال رسالة</a></td>

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
                                    <th>اسم الدواء</th>
                                    <th>صورةالدواء</th>
                                    <th>الكمية</th>
                                    <th>قبول البدائل</th>
                                    <th>تقديم عرض</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>بنادول</strong></td>
                                    <td>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up"
                                            title="الروشتة "
                                            style="list-style-type: none;"
                                        >
                                            <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" alt="Avatar" class="rounded-circle" />
                                    </li>

                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><span class="badge bg-label-danger me-1">لا</span></td>
                                    <td> <a class="dropdown-item" href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        role="button"
                                            ><i class="bx bx-plus-circle me-1"></i> عرض سعر</a
                                            ></td>

                                        <!--modal  -->
                                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-between">
                                                    <h5 class="modal-title" id="exampleModalLabel1">انشاء عرض سعر </h5>
                                                    <button
                                                    type="button" class="btn-close "
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="nav-align-top mb-4">
                                                    <ul class="nav nav-pills mb-3" role="tablist">
                                                        <li class="nav-item">
                                                        <button
                                                            type="button"
                                                            class="nav-link active btn-submit"
                                                            role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-top-home"
                                                            aria-controls="navs-pills-top-home"
                                                            aria-selected="true">
                                                            أساسي
                                                        </button>
                                                        </li>
                                                        <li class="nav-item">
                                                        <button
                                                            type="button"
                                                            class="nav-link"
                                                            role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-top-profile"
                                                            aria-controls="navs-pills-top-profile"
                                                            aria-selected="false"
                                                        >
                                                            بديل
                                                        </button>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">سعر المنتج</label>
                                                            <input type="text" id="nameBasic" class="form-control" placeholder="ادخل سعر المنتج " />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label"> الكمية المطلوبة</label>
                                                            <input type="text" id="nameBasic" class="form-control" placeholder="ادخل الكمية اللازمة لعمل عرض ع المنتج " />
                                                        </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                                        <div class="col mb-3">
                                                            <label for="formFile" class="form-label">صورة العلاج البديل</label>
                                                            <input class="form-control" type="file" id="formFile" />
                                                            </div>
                                                            <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">اسم العلاج البديل</label>
                                                            <input type="text" id="nameBasic" class="form-control" placeholder="ادخل  اسم العلاج " />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label"> سعر العلاج البديل</label>
                                                            <input type="text" id="nameBasic" class="form-control" placeholder="ادخل سعر البديل " />
                                                        </div>

                                                        </div>

                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    الغاء
                                                    </button>
                                                    <button type="button" class="btn btn-submit">تثبيت الرد </button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>مناديل</strong></td>
                                    <td>
                                    <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up"
                                            title="الروشتة "
                                            style="list-style-type: none;"
                                        >
                                            <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" alt="Avatar" class="rounded-circle" />
                                    </li>

                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><span class="badge bg-label-success me-1">نعم</span></td>
                                    <td> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        role="button"
                                            ><i class="bx bx-plus-circle me-1"></i> عرض سعر</a
                                            ></td>
                                    <td>

                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <!-- /Order Details  -->

                    <!-- added replies -->
                    <div class=" m-4 shadow">
                        <div class="card">
                        <h5 class="card-header">الردود المضافة </h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>الرقم</th>
                                    <th>اسم الدواء</th>
                                    <th>صورةالدواء</th>
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                    <th> نوع الرد</th>
                                    <th>العمليات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>بنادول</strong></td>
                                    <td>
                                    <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar pull-up"
                                        title="الروشتة "
                                        style="list-style-type: none;"
                                        >
                                        <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" alt="Avatar" class="rounded-circle" />
                                    </li>

                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>أساسي</strong></td>

                                    <td class="d-flex justify-content-start"> <a class="dropdown-item" href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        ><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        ><i class="bx bx-trash -circle me-1"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>مناديل</strong></td>
                                    <td>
                                    <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar pull-up"
                                        title="الروشتة "
                                        style="list-style-type: none;"
                                        >
                                        <img src="{{ asset('Front/assets/images/pharmacy/pharma.jpg') }}" alt="Avatar" class="rounded-circle" />
                                    </li>

                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>بديل</strong></td>

                                    <td class="d-flex justify-content-start"> <a class="dropdown-item" href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        ><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        ><i class="bx bx-trash -circle me-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="7">
                                    <div class="d-flex justify-content-center">

                                    <button class="btn btn-submit col-3" type="button">ارسال الردود</button>
                                    </div>

                                    </td>
                                    </tr>
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
 <!--/ Content -->
@stop
