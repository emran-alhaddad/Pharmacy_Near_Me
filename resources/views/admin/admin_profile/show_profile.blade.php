

@extends('layouts.masterAdmin')
@section('admin_pages')

<section>
<div class="container py-5 my-5">

<div class="row">
    <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-body text-center">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3">{{$admin->name}}</h5>
        <p class="text-muted mb-1">Full Stack Developer</p>
        <a href="/_admin/edit_profile">
        <button id="edit_button" type="button" class="btn btn-outline-dark m-3">تعديل بيانات الحساب</button>
        </a>

        </div>
    </div>
    </div>
    <div class="col-lg-8">


     <div class="card mb-4">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0"> الاسم الكامل </p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">{{$admin->name}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">البريد الالكتروني</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">{{$admin->email}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">رقم الجوال</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">{{$admin->phone}}</p>
            </div>
        </div>
        <hr>


        </div>
    </div>


</section>

@endsection
