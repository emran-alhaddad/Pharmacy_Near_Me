@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 ">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <a href="/_admin/add_ads"><i class="fas fa-plus"></i></a>
                <h3>الاعلانات</h3>
            </div>
            <div class="card-content">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th> اسم الاعلان</th>
                            <th> رابط الموقع</th>
                            <th>تاريخ بداية الاعلان</th>
                            <th>تاريخ نهاية الاعلان</th>
                            <th>مكان الاعلان</th>
                            <th>صورة الاعلان</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ads as $ad)
                        <tr>
                        <td>{{$ad->descripe}}</td>
                        <td>{{$ad->url}}</td>
                        <td>{{$ad->startAt}}</td>
                        <td>{{$ad->endAt}}</td>
                        <td>{{$ad->position}}</td>
                        <td>  <img src={{asset("/uploads/ads/$ad->image")}} alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 50px;"></td>
                        

                                    @if ($ad->is_active==1)

                                    <td>  <a href={{route('admin-ads_activity', ['id' => $ad->id , 'stats'=>0])}}>   <button class="btn btn-success text-white" >مفعل</button></a></td>
            
            
                                      @else
            
                                        <td>  <a href={{route('admin-ads_activity', ['id' => $ad->id ,'stats'=>1])}}> <button class="btn btn-danger text-white" >موقف</button></a></td>
            
                                      @endif
                    

                            <td>
                                <a href={{route('admin-edit_ads', ['id' => $ad->id]);}} >   <button class="btn btn-primary text-white" >تعديل</button></a>
                            <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ad->id}}">حذف</button>
                                    <div class="modal"  id="exampleModal{{$ad->id}}"  tabindex="-1">
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
                                                <a href={{route('admin-ads_activity', ['id' => $ad->id,'stats'=>0])}}  >        <button type="button" class="btn btn-primary">نعم</button></a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                            </td>


                        </tr>
                @endforeach
                    </tbody>

                </table>

            </div>
        </div>
</div>



@endsection
