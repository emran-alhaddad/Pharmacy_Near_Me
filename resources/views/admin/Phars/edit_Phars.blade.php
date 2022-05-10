@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تعديل صيدلية</h3>
            </div>
            <div class="card-content px-5">
    <form>


        <div class="row g-3">
            <div class="mb-3 col-8">
                    <label for="exampleInputName" class="form-label">اسم الصيدلية</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div>


            <div class="mb-3 col-4">
            <!-- <label for="formFile" class="form-label">صورة الصيدلية</label>
            <input class="form-control" type="file" id="formFile"> -->

                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">تعديل صورة الملف الشخصي</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                            name="image"
                        />
                        </label>
                    </div>
                    </div>





        </div>


        </div>

        <div class="row g-3">

            <div class="mb-3 col-3 col-4">
                <label for="exampleInputLink" class="form-label">المدينة</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected> تعز </option>
                        <option value="1">عدن</option>
                        <option value="2">صنعاء</option>
                        <option value="3">حضرموت</option>
                    </select>
                </div>

            <div class="mb-3 col-4">
                <label for="exampleInputLink" class="form-label">المنطقة السكنية</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected> الروضة </option>
                        <option value="1">المسبح</option>
                        <option value="2">بيرباشا</option>
                        <option value="3">صينا</option>
                    </select>
            </div>
            <div class="mb-3 col-4">
                    <label for="exampleInputLink" class="form-label">رقم المرور</label>
                    <input type="password" class="form-control" id="exampleInputName">
            </div>

        </div>


        <div class="row g-3">

            <div class="mb-3 col-8">
                    <label for="exampleInputLink" class="form-label">العنوان</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div>



        <div class="mb-3 col-4">
            <!-- <label for="formFile" class="form-label">صورة الرخصة</label>
            <input class="form-control" type="file" id="formFile"> -->


            <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">تعديل صورة الملف الشخصي</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                        />
                        </label>
                        <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                        </button> -->

                        <!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                    </div>
                    </div>







        </div>

        </div>

        <div class="row g-3">

        <div class="mb-3 col-8">
            <label for="formFile" class="form-label"> وصف الصيدلية</label>
            <textarea type="text" name = "desc" class = "form-control"></textarea>

        </div>

        <div class="mb-3 col-4">
            <label for="formFile" class="form-label">  اوقات الدوام</label>
            <input class="form-control " type="text" id="formFile" >

        </div>
        </div>


        <div class="row g-3">
            <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"> البريد الالكتروني</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">  رقم الهاتف</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>

                    <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">الموقع الالكتروني</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
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


            <button  id="edit_button"  type="submit" class="btn btn-primary">تعديل</button>
    </form>

            </div>
        </div>
</div>



@stop
