@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة حساب</h3>
            </div>
            <div class="card-content">
    <form>

    <div class="row g-3">
        <div class="mb-3 col-4">
                <label for="exampleInputName" class="form-label">اسم الحساب</label>
                <input type="text" class="form-control" id="exampleInputName">
                </div>
        <div class="mb-3 col-8">
                <label for="exampleInputLink" class="form-label">وصف الحساب</label>
                <textarea type="text" name = "desc" class = "form-control"></textarea>
        </div>
    </div>

            <button  id="edit_button"  type="submit" class="btn btn-primary">اضافة</button>
    </form>

            </div>
        </div>
</div>



@stop
