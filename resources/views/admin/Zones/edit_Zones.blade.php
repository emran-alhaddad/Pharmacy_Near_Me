@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تعديل منطقة سكنية</h3>
            </div>
            <div class="card-content">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {!! session('error') !!}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {!! session('status') !!}
                </div>
            @endif
    <form>

    <div class="row g-3">

            <div class="mb-3 col-6">
                    <label for="exampleInputName" class="form-label">اسم المنطقة</label>
                    <input type="text" class="form-control" id="exampleInputName">
                    </div>
                <div class="mb-3 col-6">
                <label for="exampleInputLink" class="form-label">المدينة</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected> تعز </option>
                        <option value="1">عدن</option>
                        <option value="2">صنعاء</option>
                        <option value="3">حضرموت</option>
                    </select>
                </div>

    </div>

            <button  id="submit_button"  type="submit" class="btn btn-primary">تعديل</button>
    </form>

            </div>
        </div>
</div>



@stop
