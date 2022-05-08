@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row ">
        <div class="col-4 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تعديل المدينة</h3>
            </div>
            <div class="card-content">
    <form>
                <div class="mb-3">
                <label for="exampleInputName" class="form-label">اسم المدينة</label>
                <input type="text" class="form-control" id="exampleInputName">
                </div>
            <button  id="edit_button"  type="submit" class="btn btn-primary">تعديل</button>
    </form>

            </div>
        </div>
</div>



@stop
