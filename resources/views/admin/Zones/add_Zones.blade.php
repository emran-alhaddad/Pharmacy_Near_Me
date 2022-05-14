@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة منطقة سكنية</h3>
            </div>
            <div class="card-content">
<<<<<<< HEAD
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {!! session('error') !!}
=======
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
              @endforeach
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error') }}
>>>>>>> admin/v.2
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
<<<<<<< HEAD
                    {!! session('status') !!}
                </div>
            @endif
    <form>
=======
                    {{ session('status') }}
                </div>
            @endif
    <form  method="POST" action={{route('admin-create_zone');}}>
>>>>>>> admin/v.2

    <div class="row g-3">

            <div class="mb-3 col-6">
                    <label for="exampleInputName" class="form-label">اسم المنطقة</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                    </div>
                <div class="mb-3 col-6">
                <label for="exampleInputLink" class="form-label">المدينة</label>
                    <select class="form-select" aria-label="Default select example">
                        <select class="form-select" name="city_id" aria-label="Default select example">
                            @foreach ( $cities as $city )
                      
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>

    </div>

            <button  id="submit_button"  type="submit" class="btn btn-primary">اضافة</button>
    </form>

            </div>
        </div>
</div>



@stop
