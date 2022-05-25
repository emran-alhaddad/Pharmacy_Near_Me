@extends('layouts.masterPharmacy')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pharmacy-account') }}"><i class="bx bx-user me-1"></i>
                            البروفايل</a>
                    </li>
                    <li class="nav-item btn-submit">
                        <a class="nav-link text-white" href="{{ route('pharmacy-settings') }}"><i
                                class="bx bx-cog me-1"></i> الاعدادات</a>
                    </li>
                </ul>
                <!-- email -->
                <div class="card shadow">
                    <h5 class="card-header">تغيير الايميل الخاص بهذا الحساب </h5>
                    <div class="card-body">
                        <form style="direction:rtl">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">الايميل الحالي</label>
                                <div class="input-group ">
                                    <input type="text" id="basic-default-email" class="form-control"
                                        placeholder="usernam@example.com" aria-describedby="basic-default-email2" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-email"> الايميل الجديد</label>
                                    <div class="input-group ">
                                        <input type="text" id="basic-default-email" class="form-control"
                                            placeholder="usernam@example.com" aria-describedby="basic-default-email2" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn input-group btn-submit">حفظ التعيرات</button>
                        </form>
                    </div>
                </div>
                <!-- pass -->
                <div class="card shadow mt-5">
                    <h5 class="card-header">تغيير كلمة السر الخاصة بهذا الحساب </h5>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password12">كلمة السر الحالية </label>
                                    <div class="input-group" style="direction:ltr">
                                        <input type="password" class="form-control" id="basic-default-password12"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password12">كلمة السر الجديده </label>
                                    <div class="input-group" style="direction:ltr">
                                        <input type="password" class="form-control" id="basic-default-password12"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password12">تأكيد كلمة السر الجديده
                                    </label>
                                    <div class="input-group" style="direction:ltr">
                                        <input type="password" class="form-control" id="basic-default-password12"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit input-group">حفظ التعيرات</button>
                        </form>
                    </div>
                </div>
                <!-- delete Account -->
                <div class="card mt-5 shadow">
                    <h5 class="card-header">حذف الحساب</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">هل أنت واثق من أنك تريد حذف حسابك ؟</h6>
                                <p class="mb-0">لا يوجد عودة لهذا الأمر من فضلك كن حذرا </p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            {{-- <div class="form-check mb-3">
                                <label class="form-check-label" for="accountActivation"
                            >أوافق على إلغاء تفعيل حسابي </label
                            >
                            <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                            style="font-size: 2px;"
                            />

                        </div> --}}
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
