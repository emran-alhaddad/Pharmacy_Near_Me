@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة طلبية</h3>
            </div>
            <div class="card-content">
    <form>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">مرسل الطلبية</label>
                    <input type="text" class="form-control" id="exampleInputName">
                </div>

            <div class="mb-3">
                <label for="exampleInputLink" class="form-label">مرسل الطلبية</label>
                <input type="text" class="form-control" id="exampleInputName">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">صورة الدواء</label>
                <input class="form-control" type="file" id="formFile">
            </div>

            <div class="mb-3">
                <label for="exampleInputLink" class="form-label">اسم الدواء</label>
                <input type="text" class="form-control" id="exampleInputName">
            </div>

            <div class="mb-3">
                <label for="exampleInputLink" class="form-label"> اقبل البدائل</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">نعم</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">لا</label>
                    </div>

            </div>

            <div class="mb-3">
                <label for="exampleInputLink" class="form-label"> الكمية</label>
                <input type="number" class="form-control" id="exampleInputName">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label"> تكرار الطلبية كل</label>
                <input class="form-control" type="date" id="formFile">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label"> تكرار الطلبية حتى تاريخ</label>
                <input class="form-control" type="date" id="formFile">
            </div>

            <button  id="edit_button"  type="submit" class="btn btn-primary">Submit</button>
    </form>

            </div>
        </div>
</div>



@stop
