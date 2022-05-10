@extends('layouts.masterUser')

@section('content')
    <style>
        .nav-tabs>li {
            float: right;
        }

        .table {
            direction: rtl;
            text-align: -webkit-match-parent;
        }

        th,
        td {
            text-align: center;
        }

        .avater {
            width: 30px;
            padding: 3px;
            border: 1px solid;
            border-radius: 50%;
        }

        .badge {
            padding: 10px;
        }

    </style>
    <section class="col-lg-9 col-md-8 col-12">
        <div class="row mb-2 mt-2">
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
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#wait-accept">في انتضار القبول</a></li>
            <li><a data-toggle="tab" href="#wait-pay">في انتضار الدفع</a></li>
            <li><a data-toggle="tab" href="#wait-delivery">في انتضار التوصيل</a></li>
            <li><a data-toggle="tab" href="#done">مكتملة</a></li>
            <li><a data-toggle="tab" href="#rejected">غير متوفرة</a></li>
        </ul>

        <div class="tab-content">
            @include('user.order.state.wait-acceptance')
            @include('user.order.state.wait-payment')
            @include('user.order.state.wait-delivery')
            @include('user.order.state.completed')
            @include('user.order.state.rejected')
        </div>
    </section>


@stop
