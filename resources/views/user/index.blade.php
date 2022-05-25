@extends('layouts.masterUser2')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">

                        <button type="submit" class="btn btn-submit btn-hover me-2"> <a
                                href="{{ route('client-dashboard') }}" style="color:#fff;"><i class="bx bx-user me-1"></i>
                                البروفايل</a></button>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}"><i class="bx bx-cog me-1"></i>
                            الاعدادات</a>
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
                            <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">

                                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">اعادة تعيين</span>
                        </button> -->


                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                        <div class="card-body">




                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">اسم العميل </label>

                                    <div class="form-control rounded @error('name') border-danger @enderror">
                                        {{ $user->name }}
                                    </div>
                                </div>





                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">الايميل</label>

                                    <div class="form-control rounded @error('name') border-danger @enderror">
                                        {{ $user->email }}
                                    </div>
                                </div>


                            </div>
                            <div class="mt-2">
                                <a class=" btn btn-submit btn-hover  me-2" href="{{ route('edit_profile') }}"
                                    style=color:#fff;>تعديل</a> </button>

                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>

@stop
