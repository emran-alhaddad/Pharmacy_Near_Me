@extends('layouts.masterUser')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client-dashboard') }}"><i class="bx bx-user me-1"></i>
                            البروفايل</a>
                    </li>
                    <li class="nav-item">

                        <button type="submit" class="btn btn-submit btn-hover me-2"> <a
                                href="{{ route('client-dashboard') }}" style="color:#fff;"><i class="bx bx-user me-1"></i>
                                الاعدادات</a></button>
                    </li>

                </ul>


                <div class="card">
                    <h5 class="card-header">حذف الحساب</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">هل أنت واثق من أنك تريد حذف حسابك ؟</h6>
                                <p class="mb-0">لا يوجد عودة لهذا الأمر من فضلك كن حذرا </p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <label class="form-check-label" for="accountActivation">أوافق على إلغاء تفعيل حسابي </label>
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" />

                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">تعطيل حسابي</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>

@stop
