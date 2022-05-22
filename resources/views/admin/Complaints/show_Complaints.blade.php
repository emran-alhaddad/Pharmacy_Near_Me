@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <a href="/_admin/add_Complaints"><i class="fas fa-plus"></i></a>
                <h3>الشكاوى</h3>
            </div>
            <div class="card-content">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th> مقدم الشكوى</th>
                            <th> على من الشكوى </th>
                            <th>تاريخ تقديم الشكوى</th>
                            <th>محتوى الشكوى</th>

                            <th>العمليات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($coms as $com )


                        <tr>
                            <td>{{$com->client->user->name}}</td>
                            <td>{{$com->pharmacy->user->name}}</td>
                            <td> {{$com->created_at}}</td>
                            <td>{{$com->message}}</td>

                            {{-- <td>
                                <button class="btn btn-success text-white" >مفعل</button>
                            </td> --}}

                            <td>
                                @if ($com->replay==null)
                                <a href={{route('admin-add_Complaints',['id'=>$com->id])}}>  <button class="btn badge btn-primary text-white" >رد على الشكوى</button></a>
                                @else



                                <button class="btn badge btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$com->id}}">عرض الرد</button>
                                @endif
                                <div class="modal"  id="exampleModal{{$com->id}}"  tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">رد  الشكوى </h5>
                                            </div>
                                            <div class="modal-body">
                                                </p>{{$com->replay}} </p>
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">لا</button>
                                                <button type="button" class="btn btn-primary">نعم</button> --}}
                                            </div>
                                            </div>
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



@endsection
