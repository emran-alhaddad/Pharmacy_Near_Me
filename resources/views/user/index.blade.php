@extends('layouts.masterUser2')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->

    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('pharmacy-dashboard') }}"><i class="bx bx-user me-1"></i> البروفايل</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pharmacy-settings') }}"
            ><i class="bx bx-cog me-1"></i> الاعدادات</a
            >
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"
            ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
        </li> -->
        </ul>
        <div class="card mb-4">
        <h5 class="card-header">تفاصيل البروفايل</h5>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
                src="Front/assets/images/pharmacy/pharma.jpg"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
            />
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">تغيير صورة البروفايل </span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                />
                </label>
                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">اعادة تعيين</span>
                </button> -->

                <p class="text-muted mb-0">مسموح فقط ب  JPG, GIF or PNG. أكبر حجم هو 800K</p>
            </div>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
                <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">اسم الصيدلية </label>
                <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    value="صيدلية الحياة"
                    autofocus
                />
                </div>

                <div class="mb-3 col-md-6">
                <label for="address" class="form-label">وصف العنوان </label>
                <textarea class="form-control" id="address" rows="1"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                <label class="form-label" for="country">المدينة</label>
                <select id="country" class="select2 form-select">
                    <option value="">المدينة</option>
                    <option value="Australia">تعز</option>
                    <option value="Australia">عدن</option>
                    <option value="Australia">صنعاء</option>
                </select>
                </div>
                <div class="mb-3 col-md-6">
                <label for="Australia" class="form-label">الحي السكني</label>
                <select id="Australia" class="select2 form-select">
                    <option value="">الحي </option>
                    <option value="Australia">المسبح </option>
                    <option value="Australia">الثورة </option>
                    <option value="Australia">شارع جمال</option>
                </select>
                </div>
                <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text">ye(+697)</span>
                    <input
                    type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    class="form-control"
                    placeholder="777 777 777"
                    />
                </div>
                </div>
                <div class="mb-3 col-md-6">
                <label for="email" class="form-label">الايميل</label>
                <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="user@example.com"
                    placeholder="user@example.com"
                />
                </div>
                <div class="mb-3 col-md-6">
                <label for="bio" class="form-label">عن الصيدلية  </label>
                <textarea class="form-control" id="bio" rows="2" placeholder="نبذه"></textarea>
                </div>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">حفظ التغيرات</button>
                <button type="reset" class="btn btn-outline-secondary">الغاء</button>
            </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
    </div>
    </div>
</div>
<!-- / Content -->

<div class="content-backdrop fade"></div>

@stop
