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
        <div class="row mb-2 mt-2">
            <div class="col-6">
                <a class="btn btn-primary text-light" href="{{ route('client-compliants-create') }}" role="button">
                    إضافة شكوى جديدة
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> رقم الشكوى</th>
                    <th scope="col"> المشتكى عليه</th>
                    <th scope="col">تاريخ الشكوى</th>
                    <th scope="col">محتوى الشكوى</th>
                    <th scope="col"> العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compliants as $compliant)
                    @if ($compliant->is_active == 1)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $compliant->pharmacy->user->name }}</td>
                            <td>{{ $compliant->created_at->diffForHumans() }}</td>
                            <td>{{ $compliant->message }}</td>
                            <td>
                                <div class="row">
                                    @if ($compliant->replay)
                                        <div class="col"><a class="btn btn-primary text-light"
                                                data-toggle="collapse" href="#compliant-reply" role="button"
                                                onclick="$('#reply-text').text('{{ $compliant->replay }}');">
                                                عرض الرد
                                            </a></div>
                                    @endif
                                    <div class="col">
                                        <a class="btn btn-danger text-light"
                                            href="{{ route('client-compliants-delete', $compliant->id) }}" role="button">
                                            حــذف
                                        </a>
                                    </div>

                                </div>

                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </section>
@stop
