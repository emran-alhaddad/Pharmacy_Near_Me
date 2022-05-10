@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
<div class="card bg-white m-5">

                                <div class="card-header d-flex justify-content-between">
                                    <h3>اضافة عميل</h3>
                                </div>
                                <div class="card-content">
                        <form>

                        <div class="row g-3">

                        <div class="mb-3 col-6">
                                        <label for="exampleInputName" class="form-label">صورة العميل</label>
                                        <input type="file" class="form-control" id="exampleInputName">
                        </div>

                        <div class="mb-3 col-6">
                                        <label for="exampleInputName" class="form-label">اسم العميل</label>
                                        <input type="text" class="form-control" id="exampleInputName">
                                    </div>

                        </div>



                        <div class="row g-3">


                                <div class="mb-3 col-6">
                                    <label for="exampleInputLink" class="form-label">تاريخ الميلاد</label>
                                    <input type="date" class="form-control" id="exampleInputName">
                                </div>


                                <div class="mb-3 col-6">
                                    <label for="exampleInputLink" class="form-label"> الجنس</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected> ذكر </option>
                                            <option value="1">انثى</option>
                                        </select>
                                </div>

                        </div>

                        <div class="row g-3">

                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="exampleInputLink" class="form-label">العنوان</label>
                                    <input type="text" class="form-control" id="exampleInputName">
                                </div>

                        </div>



                                <div class="row g-3">


                                <div class="mb-3 col-6">

                                <a href="" data-bs-toggle= "modal" data-bs-target="#addemail">اضافة بريد الكتروني</a>

                                </div>


                                <div class="mb-3 col-6">

                                <a href="" data-bs-toggle= "modal" data-bs-target="#addpassword"> اضافة كلمة مرور</a>

                                </div>





                                </div>

                                <button  id="edit_button"  type="submit" class="btn btn-primary">اضافة</button>
                        </form>

            </div>
        </div>
</div>





                                <div class="modal"  id="addemail"  tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">اضافة بريد الكتروني جديد </h5>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label"> البريد الالكتروني</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">  ادخل رقم التأكيد</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">اضافة الايميل</button>
                                            </div>
                                            </div>
                                        </div>
                                </div>


                                <div class="modal"  id="addpassword"  tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">اضافة كلمة مرور  جديدة </h5>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">  كلمة المرور الجديدة</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">    تأكيد كلمة المرور</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">اضافة</button>
                                            </div>
                                            </div>
                                        </div>
                                </div>

@stop
