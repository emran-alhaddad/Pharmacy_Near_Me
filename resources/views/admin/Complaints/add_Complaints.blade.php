@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة شكوى</h3>
            </div>
            <div class="card-content">
    <form>
                <div class="mb-3">
                <label for="exampleInputName" class="form-label">مقدم الشكوى</label>
                <input type="text" class="form-control" id="exampleInputName">
                </div>
            <div class="mb-3">
                <label for="exampleInputLink" class="form-label">على من الشكوى</label>
                <input type="text" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3">
                <label for="exampleInputDate" class="form-label">تاريخ تقديم الشكوى</label>
                <input type="date" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3">
                <label for="exampleInputLink" class="form-label">محتوى الشكوى</label>
                <input type="text" class="form-control" id="exampleInputName">
            </div>


            <button  id="edit_button"  type="submit" class="btn btn-primary">Submit</button>
    </form>

            </div>
        </div>
</div>



@stop