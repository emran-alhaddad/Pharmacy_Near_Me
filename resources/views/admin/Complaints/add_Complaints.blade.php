@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>الرد على  الشكوى</h3>
            </div>
            <div class="card-content">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
              @endforeach
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
    <form action={{route('admin-create_Complaints',['id'=>$id])}} method="POST">
                <div class="row g-3">

            {{-- <div class="mb-3 col-6">
                    <label for="exampleInputName" class="form-label">مقدم الشكوى</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3 col-6">
                    <label for="exampleInputLink" class="form-label">على من الشكوى</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div> --}}

            </div>


            <div class="row g-3">
            <div class="mb-3 col-8">
                    <label for="exampleInputLink" class="form-label">رد الشكوى</label>
                    <textarea type="text" name = "replay" class = "form-control"></textarea>
            </div>
            {{-- <div class="mb-3 col-4">
                    <label for="exampleInputDate" class="form-label">تاريخ تقديم الشكوى</label>
                    <input type="date" class="form-control" id="exampleInputName">
            </div> --}}
            </div>


            <button  id="submit_button"  type="submit" class="btn btn-primary">اضافة</button>
    </form>



            </div>
        </div>
</div>



@stop
