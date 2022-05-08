@extends('layouts.masterUser')

@section('content')

    <!-- info Section -->
    <section class="col-lg-9 col-md-8 col-12">
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
        <div class="card shadow p-3">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-prof">المعلومات الشخصية </h3>
                <a href="{{ route('client-dashboard-edit') }}"
                    class="  border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle"
                    style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
                    <i class="fas fa-edit"></i>
                </a>


            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">الاسم الكامل </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">الايميل </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email }}
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">الهاتف</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->phone }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">العنوان</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->client->address }}
                    </div>
                </div>


            </div>
        </div>
    </section>

@stop
