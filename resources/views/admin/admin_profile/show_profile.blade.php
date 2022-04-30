@extends('layouts.masterAdmin')
@section('admin_pages')

<section style="background-color: #eee;">
<div class="container py-5 my-5">

<div class="row">
    <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-body text-center">
        <a href="/_admin/edit_profile">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <span style="margin-top: -50px;">
                    <div class="d-flex justify-content-center mb-2">
                    <i class="fas fa-pen"></i>
                    </div>
                </span>
            </a>
        <h5 class="my-3">حنين عبد الجليل</h5>
        <p class="text-muted mb-1">Full Stack Developer</p>
        </div>
    </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">الاسم</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">حنين عبد الجليل</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">الايميل</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">haneen@example.com</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">الموبايل</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">(097) 234-5678</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
            <p class="mb-0">العنوان</p>
            </div>
            <div class="col-sm-9">
            <p class="text-muted mb-0">تعز</p>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-body">

<ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <i class="fas fa-globe fa-lg text-warning"></i>
            <p class="mb-0">https://Haneen.com</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <i class="fab fa-github fa-lg" style="color: #333333;"></i>
            <p class="mb-0">Haneen</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
            <p class="mb-0">@Haneen</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
            <p class="mb-0">Haneen</p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
            <p class="mb-0">Haneen</p>
            </li>
</ul>
        </div>
    </div>
</div>
</div>
</section>

@endsection
