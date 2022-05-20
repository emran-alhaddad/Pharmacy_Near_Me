@extends('layouts.masterUser2')

@section('content')


    <div class="layout-wrapper layout-content-navbar">

        <div class="row mb-2 mt-2">
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
        </div>

        <div class="layout-container">

            <div class="layout-page">


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-accept" aria-controls="navs-top-accept"
                                                aria-selected="true"> في انتظار القبول
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-pay" aria-controls="navs-top-paym"
                                                aria-selected="false">
                                                في انتظار الدفع
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-delivery" aria-controls="navs-top-delevry"
                                                aria-selected="false">
                                                في انتظار التوصيل
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#done" aria-controls="navs-top-done" aria-selected="false">
                                                مكتملة
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#rejected" aria-controls="navs-top-none"
                                                aria-selected="false">
                                                غير متوفره
                                            </button>
                                        </li>
                                    </ul>





                                    <div class="tab-content">
                                        @include('user.state.wait-acceptance')
                                        @include('user.state.wait-payment')
                                        @include('user.state.wait-delivery')
                                        @include('user.state.completed')
                                        @include('user.state.rejected')
                                    </div>



                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>


        </div>
    </div>
    </div>


@stop
