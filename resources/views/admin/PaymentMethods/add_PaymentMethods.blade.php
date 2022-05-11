@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة طريقة دفع</h3>
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

                        <div class="row g-">

                                <div class="mb-3 col-6">
                                    <label for="exampleInputName" class="form-label">اسم طريقة الدفع</label>
                                    <input type="text" class="form-control" id="exampleInputName">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">صورة طريقة الدفع</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>


                        </div>



                        <button  id="submit_button"  type="submit" class="btn btn-primary">اضافة</button>
                </form>

            </div>
        </div>
</div>



@stop
