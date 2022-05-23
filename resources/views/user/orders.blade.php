@extends('layouts.masterUser')

@section('content')
    <!-- Content -->
    <section class="container-xxl flex-grow-1 container-p-y ">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
                {!! session('error') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                {!! session('status') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <!-- Order  -->
        <div class="card ">
            <h5 class="card-header"> الطلبات</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>اسم العميل</th>
                            <th>تاريخ الطلب </th>
                            <th>حالة الطلب </th>
                            <th>العمليات</th>
                            <!-- <th>تقديم عرض</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هديل جميل </strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                            <td><span class="badge bg-label-warning me-1">غير مكتمل</span></td>
                            <td> <a class="demo-inline-spacing" href="#collapseExample" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="collapseExample"> تفاصيل الطلب</a>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>هيفاء جميل </strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2022-5-3</strong></td>
                            <td><span class="badge bg-label-warning me-1">غير مكتمل</span></td>
                            <td> <a class="demo-inline-spacing" href="#collapseExample" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="collapseExample"> تفاصيل الطلب</a>
                            </td>
                            <td>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Order  -->

        <!-- Order Details  -->
        <div class="collapse mt-5 col-12" id="collapseExample">
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
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="الروشتة ">
                                        <img src="Front/assets/images/pharmacy/pharma.jpg" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>

                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                <td><span class="badge bg-label-danger me-1">لا</span></td>
                                <td> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#basicModal" role="button"><i class="bx bx-plus-circle me-1"></i>
                                        عرض سعر</a></td>

                                <!--modal  -->
                                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex justify-content-between">
                                                <h5 class="modal-title" id="exampleModalLabel1">انشاء عرض سعر </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="nav-align-top mb-4">
                                                    <ul class="nav nav-pills mb-3" role="tablist">
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link active" role="tab"
                                                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-home"
                                                                aria-controls="navs-pills-top-home" aria-selected="true">
                                                                أساسي
                                                            </button>
                                                        </li>
                                                        <li class="nav-item">
                                                            <button type="button" class="nav-link" role="tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#navs-pills-top-profile"
                                                                aria-controls="navs-pills-top-profile"
                                                                aria-selected="false">
                                                                بديل
                                                            </button>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="navs-pills-top-home"
                                                            role="tabpanel">
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label">سعر
                                                                    المنتج</label>
                                                                <input type="text" id="nameBasic" class="form-control"
                                                                    placeholder="ادخل سعر المنتج " />
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label"> الكمية
                                                                    المطلوبة</label>
                                                                <input type="text" id="nameBasic" class="form-control"
                                                                    placeholder="ادخل الكمية اللازمة لعمل عرض ع المنتج " />
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="navs-pills-top-profile"
                                                            role="tabpanel">
                                                            <div class="col mb-3">
                                                                <label for="formFile" class="form-label">صورة العلاج
                                                                    البديل</label>
                                                                <input class="form-control" type="file" id="formFile" />
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label">اسم العلاج
                                                                    البديل</label>
                                                                <input type="text" id="nameBasic" class="form-control"
                                                                    placeholder="ادخل  اسم العلاج " />
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label for="nameBasic" class="form-label"> سعر العلاج
                                                                    البديل</label>
                                                                <input type="text" id="nameBasic" class="form-control"
                                                                    placeholder="ادخل سعر البديل " />
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    الغاء
                                                </button>
                                                <button type="button" class="btn btn-primary">تثبيت الرد </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>مناديل</strong></td>
                                <td>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="الروشتة ">
                                        <img src="Front/assets/images/pharmacy/pharma.jpg" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>

                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                <td><span class="badge bg-label-success me-1">نعم</span></td>
                                <td> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#basicModal" role="button"><i class="bx bx-plus-circle me-1"></i>
                                        عرض سعر</a></td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Order Details  -->

        <!-- added replies -->
        <div class=" mt-5">
            <div class="card">
                <h5 class="card-header">عروض السعر المضافة </h5>
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
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="الروشتة ">
                                        <img src="Front/assets/images/pharmacy/pharma.jpg" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>

                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>أساسي</strong></td>

                                <td class="d-flex justify-content-start"> <a class="dropdown-item"
                                        href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i
                                            class="bx bx-edit-alt me-1"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#basicModal"><i class="bx bx-trash -circle me-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>مناديل</strong></td>
                                <td>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" title="الروشتة ">
                                        <img src="Front/assets/images/pharmacy/pharma.jpg" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>

                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>100</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>بديل</strong></td>

                                <td class="d-flex justify-content-start"> <a class="dropdown-item"
                                        href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#basicModal"><i
                                            class="bx bx-edit-alt me-1"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#basicModal"><i class="bx bx-trash -circle me-1"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="d-flex justify-content-center">

                                        <button class="btn btn-primary me-auto col-3" type="button">ارسال الردود</button>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- / Content -->

@stop











{{-- @extends ('layouts.masterPharmacy')

@section('phar_profile_content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                         src="{{ asset('uploads/avaters/pharmacy/' . Auth::user()->avater) }}"><span
                        class="font-weight-bold">{{ Auth::user()->name }}</span><span
                        class="text-black-50">{{ Auth::user()->email }}</span><span>
                    </span>
                </div>
                <div class="d-flex flex-column">
                <a href="{{ route('logout') }}" class="btn btn-success" >
                Logout
                </a>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"> اعدادات الملف الشخصي للصيدلية</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <label class="f-5 my-4">الاسم</label>
                        <input type="text" value="{{ Auth::user()->name }}"
                                class="form-control" placeholder="first name" ></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="f-5 my-4"> رقم الجوال</label>
                        <input type="text" value="{{ Auth::user()->phone }}"
                                class="form-control" placeholder="enter phone number" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 1</label><input type="text"
                                class="form-control" placeholder="enter address line 1" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 2</label><input type="text"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4">المحافضة</label>
                        <input type="text" value="{{ $pharmacy->zone->city->name }}"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4">المربع السكني</label>
                        <input type="text" value="{{ $pharmacy->zone->name }}"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> الايميل</label>
                        <input type="text" value="{{ Auth::user()->email }}"
                                class="form-control" placeholder="enter email id" ></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button text-dark "
                            type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop --}}
