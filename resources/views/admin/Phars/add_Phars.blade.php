@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>اضافة صيدلية</h3>
            </div>
            <div class="card-content px-5">
    <form>


        <div class="row g-3">
            <div class="mb-3 col-8">
                    <label for="exampleInputName" class="form-label">اسم الصيدلية</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name">
            </div>


            <div class="mb-3 col-4">
            <label for="formFile" class="form-label">صورة الصيدلية</label>
            <input class="form-control" type="file" id="formFile" name="image">

        </div>


        </div>

        <div class="row g-3">

            <div class="mb-3 col-3 col-4">
                <label for="exampleInputLink" class="form-label">المدينة</label>
                    <select class="form-select" aria-label="Default select example" name="cities">
                        <option selected> تعز </option>
                        <option value="1">عدن</option>
                        <option value="2">صنعاء</option>
                        <option value="3">حضرموت</option>
                    </select>
                </div>

            <div class="mb-3 col-4">
                <label for="exampleInputLink" class="form-label">المنطقة السكنية</label>
                    <select class="form-select" aria-label="Default select example" name="zones">
                        <option selected> الروضة </option>
                        <option value="1">المسبح</option>
                        <option value="2">بيرباشا</option>
                        <option value="3">صينا</option>
                    </select>
            </div>
            <div class="mb-3 col-4">
                    <label for="exampleInputLink" class="form-label">رقم المرور</label>
                    <input type="password" class="form-control" id="exampleInputName" name="password">
            </div>

        </div>


        <div class="row g-3">

            <div class="mb-3 col-8">
                    <label for="exampleInputLink" class="form-label">العنوان</label>
                    <input type="text" class="form-control" id="exampleInputName" name="address">
            </div>



        <div class="mb-3 col-4">
            <label for="formFile" class="form-label">صورة الرخصة</label>
            <input class="form-control" type="file" id="formFile" name="license">

        </div>

        </div>

        <div class="row g-3">

        <div class="mb-3 col-8">
            <label for="formFile" class="form-label"> وصف الصيدلية</label>
            <textarea type="text" name = "desc" class = "form-control"></textarea>

        </div>

        <div class="mb-3 col-4">
            <label for="formFile" class="form-label">  اوقات الدوام</label>
            <input class="form-control " type="time" id="formFile" >

        </div>
        </div>


        <div class="row g-3">
            <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"> البريد الالكتروني</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">  رقم الهاتف</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="mopile" >
                </div>

                    <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">الموقع الالكتروني</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="url" >
                </div>


        </div>

            <div class="row g-3">
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">  <i class="fab fa-whatsapp fa-lg" style="color: lightgreen; padding : 0 10px 0 10px;"></i> واتساب</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"> <i class="fab fa-twitter fa-lg" style="color: #55acee; padding : 0 10px 0 10px;"></i> تويتر</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"><i class="fab fa-facebook-f fa-lg" style="color: #3b5998; padding: 0 10px 0 10px ;"></i>فيسبوك</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>


        </div>


            <button  id="edit_button"  type="submit" class="btn btn-primary">اضافة</button>
    </form>

            </div>
        </div>
</div>



@stop
