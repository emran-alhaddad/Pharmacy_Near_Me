@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-8 col-sm-8">
<div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                        <h3>اضافة اعلان</h3>
            </div>
            <div class="card-content">

                <div class="row g-3">
                        <div class="col-8">

                <form>
                        <div class="mb-3">
                        <label for="exampleInputName" class="form-label">اسم الاعلان</label>
                        <input type="text" class="form-control" id="exampleInputName">
                        </div>
                    <div class="mb-3">
                        <label for="exampleInputLink" class="form-label">رابط الموقع</label>
                        <input type="text" class="form-control" id="exampleInputName">
                    </div>

                    <div class="row g-3">
                        <div class="mb-3 col-6">
                            <label for="exampleInputDate" class="form-label">تاريخ بداية الاعلان</label>
                            <input type="date" class="form-control" id="exampleInputName">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputLink" class="form-label">تاريخ نهاية الاعلان</label>
                            <input type="date" class="form-control" id="exampleInputName">
                        </div>
                    </div>


                    <div class="mb-3 ">
                        <label for="exampleInputLink" class="form-label"> مكان الاعلان</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected> يسار </option>
                                <option value="1">يمين</option>
                                <option value="2">فوق</option>
                                <option value="3">تحت</option>
                            </select>
                    </div>




                        </div>

                            <div class="col-4">

                                <div class="mb-3">
                                <label for="formFile" class="form-label">صورة الاعلان</label>
                                <input class="form-control" type="file" id="formFile">
                                </div>

                            </div>
                    </div>

                    <button  id="edit_button"  type="submit" class="btn btn-primary">اضافة</button>
                </form>
        </div>
    </div>
</div>



@stop
