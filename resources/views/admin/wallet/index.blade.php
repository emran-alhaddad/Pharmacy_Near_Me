@extends('layouts.masterAdmin')
@section('admin_pages')

    <!-- Content -->
<div class="wrapper bg-white">
        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand"> رصيدك الحالي هو {{ $user->balance }} $</a>
                    @if ($user->balance > 0)
                        <button type="submit" class="btn btn-submit btn-hover  me-2">سحب رصيد من المحفظة <i
                                class="lni lni-search-alt"></i></button>
                    @endif
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">بحث</button>
                    </form>

            </nav>
            <!--table-->
            <div class="row  ">
                <div class="col-12 col-m-12 col-sm-12">
                    <div class="card bg-white m-5">

                        <div class="card-header d-flex justify-content-between">

                            <h5>العمليات في المحفظة</h5>
                        </div>
                        <div class="card-content">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> رقم العملية </th>
                                        <th>نص العملية</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction['id'] }}</td>
                                            <td>
                                                @if ($transaction['type'] == 'deposit')
                                                    أودع /
                                                    {{ $transaction['from'] }}
                                                    {{ $transaction['amount'] }}$
                                                    إلى حسابك
                                                @elseif ($transaction['type'] == 'withdraw')
                                                    لقد قمت بتحويل
                                                    {{ $transaction['amount'] }}$
                                                    إلى حساب
                                                    {{ $transaction['reciever'] }}
                                                @endif

                                                بتاريخ
                                                {{ $transaction['date'] }}

                                            </td>
                                            <td>
                                                <a class=" btn btn-success text-light btn-hover me-2" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#details{{ $transaction['id'] }}">
                                                    عرض التفاصيل
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="collapse" id="details{{ $transaction['id'] }}">
                                                    <div class="card card-body">
                                                        {!! $transaction['data'] !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- / Content -->



@stop
