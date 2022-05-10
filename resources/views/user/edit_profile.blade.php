@extends('layouts.masterUser2')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
@if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->

    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('client-dashboard') }}"><i class="bx bx-user me-1"></i> البروفايل</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}"
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
            <form  method="POST" action="{{ route('client-dashboard-update') }}"  class="card-body">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
تغيير كلمة المرور
</button>

<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
تغيير  البريد
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    


      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تغيير كلمة المرور
                    </h4>
                   
                </div>

                <div class="modal-body">
                    @error('error')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('status')
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <form action="{{ route('client-password-update') }}" method="POST" class="g-3">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">كلمة المرور القديمة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input value="{{ old('password') }}" type="password"
                                        placeholder="كلمة المرور القديمة" name="password"
                                        class="form-control rounded @error('password') border-danger @enderror">
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">كلمة المرور الجديدة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="كلمة المرور الجديدة" name="new_password"
                                        class="form-control rounded @error('new_password') border-danger @enderror">
                                    @error('new_password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">تأكيد كلمة المرور الجديدة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="تأكيد كلمة المرور الجديدة"
                                        name="new_password_confirmed"
                                        class="form-control rounded @error('new_password_confirmed') border-danger @enderror">
                                    @error('new_password_confirmed')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>









   
    </div>
  </div>
</div>
            @csrf
                @method('put')

            <div class="row">
                <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">اسم العميل </label>
                <input
                    class="form-control rounded @error('name') border-danger @enderror"
                    value="{{ $user->name }}" type="text" placeholder="اسم المستخدم" name="name"
                   
                    autofocus
                />
                @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>

                <div class="mb-3 col-md-6">
                <label for="address" class="form-label">وصف العنوان </label>
                <input
                    class="form-control rounded @error('name') border-danger @enderror"
                    value="{{ $user->client->address }}" type="text" placeholder="العنــوان" name="address"
                   
                    autofocus
                />
                @error('address')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>
                <div class="mb-3 col-md-6">
                <label class="form-label" for="country">تاريخ الميلاد</label>
                <input
                   
                value="{{ $user->client->dob }}" type="date" placeholder="تاريخ الميلاد"
                                        name="dob"
                   class="form-control rounded @error('phone') border-danger @enderror"
        
                   />
                   @error('dob')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                <label for="Australia" class="form-label"> الجنس</label>
                <select name="gender" id="gender" class="select2 form-select">
                    <option  value="male" @if ($user->client->gender == 'male') selected @endif>ذكر</option>
                    <option value="female" @if ($user->client->gender == 'female') selected @endif>انثى</option>
                  
                </select>
                </div>
                <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text">ye(+697)</span>
                    <input
                   
                    value="{{ $user->phone }}" type="tel"  name="phone"
                    class="form-control rounded @error('phone') border-danger @enderror"
                    placeholder="777 777 777"
                    />
                    @error('phone')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
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
