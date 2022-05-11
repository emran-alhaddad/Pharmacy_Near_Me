@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 ">


            <!-- start -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- 1 -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">وصف الموقع</a>
                </li>


                <!-- 2 -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="services-tab" data-bs-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">خدمات الموقع</a>
                </li>


                <!-- 3 -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="socialmedia-tab" data-bs-toggle="tab" href="#socialmedia" role="tab" aria-controls="socialmedia" aria-selected="false">مواقع التواصل الاجتماعي</a>
                </li>

                <!-- 4 -->
                <li class="nav-item" role="presentation">
                        <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">من نحن</a>
                </li>


            </ul>
            <!-- end -->

            <!-- start content -->
            <div class="tab-content" id="myTabContent">
                    <!-- 1 -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="card bg-white m-5">

                                    <div class="card-header d-flex justify-content-between">
                                                <h3>تعديل وصف الموقع </h3>
                                    </div>
                                    <div class="card-content">

                                        <div class="row g-3">
                                        <div class="col-8">

                                        <form>
                                                <div class="mb-3">
                                                <label for="exampleInputName" class="form-label">اسم الموقع</label>
                                                <input type="text" class="form-control" id="exampleInputName">
                                                </div>
                                                <div class="mb-3">
                                                <label for="exampleInputLink" class="form-label"> العنوان</label>
                                                <input type="text" class="form-control" id="exampleInputName">
                                                </div>

                                                <div class="row g-3">

                                                    <div class="mb-3">
                                                        <label for="exampleInputLink" class="form-label"> الوصف</label>
                                                        <textarea type="text" name = "desc" class = "form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">اضافة صورة للموقع </label>
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                </div>

                                                </div>

                                                    <div class="col-4">

                                                        <!-- <div class="mb-3">
                                                        <label for="formFile" class="form-label"> تعديل صورة الموقع</label>
                                                        <input class="form-control" type="file" id="formFile">
                                                        </div> -->

                                                            <div class="d-flex justify-content-start align-items-sm-center gap-4">
                                                                <img
                                                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                                                    alt="user-avatar"
                                                                    class="d-block rounded"
                                                                    height="100"
                                                                    width="100"
                                                                    id="uploadedAvatar"/>
                                                                <div class="button-wrapper">
                                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                    <span class="d-none d-sm-block" >تعديل صورة الصيدلي</span>
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

                                                <button  id="submit_button"  type="submit" class="btn btn-primary">حفظ التغيرات</button>
                                        </form>
                                    </div>
                            </div>



                </div>



                    <!-- 2 -->
                <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">

                    <div class="card bg-white m-5">

                                <div class="card-header d-flex justify-content-between">
                                    <a href="/_admin/Add_Service"><i class="fas fa-plus"></i></a>
                                    <h3>الخدمات</h3>
                                </div>
                                <div class="card-content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>  صورة الخدمة</th>
                                                <th> عنوان الخدمة</th>
                                                <th>   وصف الخدمة</th>
                                                <th>الحالة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                            <td>  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 50px;"></td>
                                            <td>توفير دواء</td>

                                            <td> الحرص على توفير دواء للعميل من اقرب صيدلية </td>



                                                <td>
                                                    <button class="btn badge btn-success text-white" >مفعل</button>

                                                </td>

                                                <td>
                                                <a href="/_admin/edit_Service"> <button class="btn " ><i class="fas fa-pen" id="edit"></i></button></a>
                                                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="delete"><i class="fas fa-trash"></i></button>
                                                        <div class="modal"  id="exampleModal"  tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">حذف </h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    </p> هل تريد حقا حذف الاعلان ؟</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">لا</button>
                                                                    <button type="button" class="btn btn-primary">نعم</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </td>


                                            </tr>

                                        </tbody>



                                    </table>

                                </div>
                        </div>


                </div>


                    <!-- 3 -->
                <div class="tab-pane fade" id="socialmedia" role="tabpanel" aria-labelledby="socialmedia-tab">
                    <div class="col-12 col-m-8 col-sm-8">
                            <div class="card bg-white m-5">

                                    <div class="card-header d-flex justify-content-between">
                                                <h3>تعديل مواقع التواصل الاجتماعي </h3>
                                    </div>
                                    <div class="card-content">


                                        <form>
                                        <div class="row g-3">

                                            <div class="mb-3 col-6">
                                                        <label for="exampleInputName" class="form-label">رقم الهاتف</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> البريد الالكتروني</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                            </div>

                                        </div>


                                        <div class="row g-3">


                                            <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"><i class="fab fa-whatsapp fa-lg" style="color: lightgreen; padding : 0 10px 0 10px;"></i> واتساب</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                            </div>

                                            <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"><i class="fab fa-twitter fa-lg" style="color: #55acee; padding : 0 10px 0 10px;"></i> تويتر</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                            </div>


                                        </div>


                                        <div class="row g-3">

                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> <i class="fab fa-facebook-f fa-lg" style="color: #3b5998; padding: 0 10px 0 10px ;"></i>فيسبوك</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                                </div>

                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> <i class="fab fa-instagram fa-lg" style="color: red; padding: 0 10px 0 10px ;"></i>انستاغرام</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                                </div>
                                        </div>




                                                <button  id="submit_button"  type="submit" class="btn btn-primary">حفظ التغيرات</button>
                                        </form>
                                    </div>
                            </div>


                    </div>
                </div>


                    <!-- 4 -->
                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">

                    <div class="col-12 col-m-8 col-sm-8">
                            <div class="card bg-white m-5">

                                    <div class="card-header d-flex justify-content-between">
                                                <h3>تعديل  من نحن</h3>
                                    </div>
                                    <div class="card-content">


                                        <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputName" class="form-label">عنوان المحتوى الرئيسي</label>
                                                        <input type="text" class="form-control" id="exampleInputName">
                                                    </div>

                                                <div class="row g-3">

                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف المحتوى الرئيسي</label>
                                                        <textarea type="text" name = "desc" class = "form-control"></textarea>
                                                    </div>


                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات الزائر</label>
                                                        <textarea type="text" name = "desc" class = "form-control"></textarea>
                                                    </div>

                                                </div>

                                                <div class="row g-3">


                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات الصيدلية</label>
                                                        <textarea type="text" name = "desc" class = "form-control"></textarea>
                                                    </div>

                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات المستخدم</label>
                                                        <textarea type="text" name = "desc" class = "form-control"></textarea>
                                                    </div>


                                                </div>




                                                <button  id="submit_button"  type="submit" class="btn btn-primary">حفظ التغيرات</button>
                                        </form>
                                    </div>
                            </div>


                    </div>

                </div>

            </div>
            <!-- end content -->


        </div>
    </div>
</div>


@endsection
