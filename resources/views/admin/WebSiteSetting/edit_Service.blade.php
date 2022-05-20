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
               
            <div class="row g-3">

            <form action="{{route('admin-update_iamge_Service')}}" enctype="multipart/form-data" method="POST" class="d-flex align-items-start align-items-sm-center gap-4">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0"> <img
                    src="{{asset("/uploads/service/$service->image")}}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    </label>
                    <div class="button-wrapper">
                        <input type="hidden" name="id" value="{{$service->id}}">
                        <button type="submit" class="d-none d-sm-block" id="submit_button">تعديل صورة الخدمة</button>
                        
                        
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            onchange="edit(event,'uploadedAvatar')"
                            name="image"
                            accept="image/png, image/jpeg"/>
                        
                        <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                        </button> -->

                        <!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                    </div>
                </form>
                <form method="POST" action={{route('admin-update_Service')}}>

                <div class="row g-3">

                    <div class="mb-3 col-4">
                                    <label for="exampleInputName" class="form-label">عنوان الخدمة</label>
                    <input name="title" value="{{$service->title}}" type="text" class="form-control" id="exampleInputName">
                    <input type="hidden" name="id" value="{{$service->id}}">
                                </div>



                                <div class="mb-3 col-8">
                                    <label for="formFile" class="form-label">وصف الخدمة</label>
                                    <input  name="descripe" value="{{$service->descripe}}" class="form-control" type="textarea" id="formFile" rows="5" cols="50">
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

<script>
    function edit(event,id)
    {
        var out=document.getElementById(id);
        out.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
