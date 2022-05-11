@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

        <div class="card-header d-flex justify-content-between">
                    <h3>تعديل الخدمة</h3>
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

            <div class="row g-3">

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
                        <span class="d-none d-sm-block" id="submit_button">تعديل صورة الخدمة</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"/>
                        </label>
                        <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                        </button> -->

                        <!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                    </div>
                </div>

                <div class="row g-3">

                    <div class="mb-3 col-4">
                                    <label for="exampleInputName" class="form-label">عنوان الخدمة</label>
                                    <input type="text" class="form-control" id="exampleInputName">
                                </div>



                                <div class="mb-3 col-8">
                                    <label for="formFile" class="form-label">وصف الخدمة</label>
                                    <input class="form-control" type="textarea" id="formFile" rows="5" cols="50">
                                </div>

                </div>





                        </div>



                        <button  id="submit_button"  type="submit" class="btn btn-primary">اضافة</button>
                </form>

            </div>


</div>
</div>
</div>
</div>



@endsection
