@extends('layouts.masterUser')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
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
        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب  /</span> البروفايل</h4> -->

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">

                        <button type="submit" class="btn btn-submit btn-hover me-2"> <a
                                href="{{ route('client-dashboard') }}"><i class="bx bx-user me-1"></i>
                                البروفايل</a></button>


                    </li>

                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">تفاصيل البروفايل</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('uploads/avaters/client/' . Auth::user()->avater) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />

                            </div>

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
                        <div class="mt-2  align-content-center">
                            <a class=" btn btn-submit btn-hover  col-6 me-2" href="{{ route('edit_profile') }}">تعديل</a>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>

@stop
