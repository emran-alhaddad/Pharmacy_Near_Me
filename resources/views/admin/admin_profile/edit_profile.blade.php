@extends('layouts.masterAdmin')
@section('admin_pages')

<section style="background-color: #eee;">
<div class="container py-5 my-5">

<div class="row">
    <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-body text-center">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3">حنين عبد الجليل</h5>
        <p class="text-muted mb-1">Full Stack Developer</p>
        </div>
    </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
        <div class="card-body">

    <form method="POST" enctype="multipart/form-data"  action="{{ route('admin-edit_profile-image') }}">
        @csrf 
        <div class="mb-3">
                <label for="exampleInputName" class="form-label">الاسم الكامل</label>
                <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
            <div class="mb-3">
                <label for="exampleInputLink" class="form-label"> كلمة السر</label>
                <input type="text" name="password" class="form-control" id="exampleInputName">
            </div>

            <div class="mb-3">
                <label for="exampleInputLink"  class="form-label"> الموبايل</label>
                <input type="text" name="phone"class="form-control" id="exampleInputName">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">الايميل</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="haneen@example.com">
            </div>

            {{-- <div class="mb-3">
                <label for="exampleInputLink" class="form-label"> العنوان</label>
                <input type="text"  class="form-control" id="exampleInputName">
            </div> --}}

            <div class="mb-3">
            <label for="formFile" class="form-label">صورة شخصية</label>
            <input name="avatar" class="form-control" type="file" id="formFile">
            </div>
            @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $success }}</div>
        @enderror
            <button id="edit_button"  type="submit" class="btn btn-outline-dark m-3">حفظ التغيرات</button>
    </form>

    </div>

</section>

@endsection
