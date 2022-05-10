@extends('layouts.masterAdmin')
@section('admin_pages')



        <!-- Content wrapper -->
        <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

            <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 m-5">
                <h5 class="card-header">تفاصيل الملف الشخصي</h5>
                <!-- Account -->
            <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">تعديل صورة الملف الشخصي</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                        />
                        </label>
                    </div>
                    </div>
            </div>
            <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">الاسم </label>
                        <input
                            class="form-control"
                            type="text"
                            id="Name"
                            name="Name"
                            value="Haneen"
                            autofocus
                        />
                        </div>

                        <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">البريد الالكتروني</label>
                        <input
                            class="form-control"
                            type="text"
                            id="email"
                            name="email"
                            value="Haneen@example.com"
                            placeholder="Haneen@example.com"
                        />
                        </div>

                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">رقم الجوال </label>
                            <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            placeholder="777777"/>
                        </div>
                        <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">كلمة المرور</label>
                        <input
                            type="text"
                            class="form-control"
                            id=""
                            name=""
                            value=""/>
                        </div>


                        </div>


                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">حفظ التغييرات</button>
                        <button type="reset" class="btn btn-outline-secondary">الغاء</button>
                    </div>
                    </form>
                </div>
                <!-- /Account -->
                </div>
                <div class="card m-5">
                <h5 class="card-header">حذف الحساب</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">هل انت متأكد انك تريد حذف الحساب?</h6>
                        <p class="mb-0">في حال انك قمت بحذف الحساب لا يمكنك التراجع عن ذلك</p>
                    </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                    <div class="form-check mb-3">
                        <input
                        class="form-check-input"
                        type="checkbox"
                        name="accountActivation"
                        id="accountActivation"
                        />
                        <label class="form-check-label" for="accountActivation"
                        >تأكيد الغاء تفعيل الحساب</label
                        >
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">الغاء تفعيل الحساب</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>

@endsection
