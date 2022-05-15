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
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                      @endforeach
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

                                        <div class="row g-3">
                                        <div class="col-8">

                                        <form method="POST" id="update_index" action="{{route('_admin-update_WebSiteSetting')}}">
                                                <div class="mb-3">
                                                <label for="exampleInputName" class="form-label">اسم الموقع</label>
                                                <input type="text" name="name" value="{{$site->name}}" class="form-control" id="exampleInputName">
                                                </div>
                                                <div class="mb-3">
                                                <label for="exampleInputLink" class="form-label"> العنوان</label>
                                                <input type="text" name="address_main" value="{{$site->address_main}}" class="form-control" id="exampleInputName">
                                                </div>

                                                <div class="row g-3">

                                                    <div class="mb-3">
                                                        <label for="exampleInputLink" class="form-label"> الوصف</label>
                                                        <textarea type="text"  name = "descripe_main" class = "form-control">{{$site->descripe_main}}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">اضافة صورة للموقع </label>
                                                        <input class="form-control" type="file" name="" id="formFile">
                                                    </div>
                                                </div>

                                               

                                                    

                                                <button  id="submit_button"  type="submit" class="btn btn-primary">حفظ التغيرات</button>
                                        </form>
                                    </div>

                                        <div class="col-4"> 
                                        <form action="{{route('_admin-update_logo')}}" enctype="multipart/form-data" method="post">

                                            <!-- <div class="mb-3">
                                            <label for="formFile" class="form-label"> تعديل صورة الموقع</label>
                                            <input class="form-control" type="file" id="formFile">
                                            </div> -->

                                                <div class="d-flex justify-content-start align-items-sm-center gap-4">
                                                    <label for="upload_logo">
                                                    <img
                                                    src={{asset("/uploads/logo/$site->logo")}}
                                                        alt="user-avatar"
                                                        class="d-block rounded"
                                                        height="100"
                                                        width="100"
                                                        id="uploadedAvatar"/>
                                                    </label>
                                                    <div class="button-wrapper">

                                                        {{-- <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0"> --}}
                                                        {{-- <span class="d-none d-sm-block" >تعديل صورة اللوجو</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i> --}}
                                                        <input
                                                            type="file"
                                                            id="upload_logo"
                                                            class="account-file-input"
                                                            hidden
                                                            accept="image/png, image/jpeg"
                                                            name="logo"
                                                        />
                                                        {{-- </label> --}}
                                                        <button class="btn btn-primary me-2 mb-4" type="submit">تعديل اللوجو</button>
                                                    </div>
                                                    </div>
                                        </form>

                                        </div>
                                    </div>
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
                                            @foreach ( $services as $ser )
                                            <tr>

                                            <td>  <img  src="{{asset("/uploads/service/$ser->image")}}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 50px;"></td>
                                            <td> {{$ser->title}} </td>

                                            <td> {{$ser->descripe}}</td>
                                            @if ($ser->is_active==1)
                        
                                            <td> <a href={{route('admin-activity_service', ['id' => $ser->id,'stats'=>0]);}} >   <button class="btn btn-success text-white" >مفعل</button></a></td>
                                             
                                                  
                                              @else 
                                            
                                                <td><a href={{route('admin-activity_service', ['id' => $ser->id,'stats'=>1]);}} > <button class="btn btn-danger text-white" >موقف</button></a></td>
                                           
                                              @endif


                                                
                                              
                                                <td>
                                                <a href={{route('admin-edit_Service',['id'=>$ser->id])}}> <button class="btn " ><i class="fas fa-pen" id="edit"></i></button></a>
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
                                            @endforeach
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


                                    <form method="POST" action="{{route('_admin-update_contact')}}">
                                        <div class="row g-3">

                                            <div class="mb-3 col-6"> 
                                                        <label for="exampleInputName" class="form-label">رقم الهاتف</label>
                                            <input type="text" name="phone" value="{{$site->phone}}" class="form-control" id="exampleInputName">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> البريد الالكتروني</label>
                                                        <input type="text"  name="google" value="{{$site->google}}" class="form-control" id="exampleInputName">
                                            </div>

                                        </div>


                                        <div class="row g-3">


                                            <div class="mb-3 col-6">    
                                                        <label for="exampleInputLink" class="form-label"><i class="fab fa-whatsapp fa-lg" style="color: lightgreen; padding : 0 10px 0 10px;"></i> واتساب</label>
                                                        <input type="text"  name="whatsup" value="{{$site->whatsup}}" class="form-control" id="exampleInputName">
                                            </div>

                                            <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"><i class="fab fa-twitter fa-lg" style="color: #55acee; padding : 0 10px 0 10px;"></i> تويتر</label>
                                                        <input type="text"   name="twitter" value="{{$site->twitter}}" class="form-control" id="exampleInputName">
                                            </div>


                                        </div>


                                        <div class="row g-3">

                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> <i class="fab fa-facebook-f fa-lg" style="color: #3b5998; padding: 0 10px 0 10px ;"></i>فيسبوك</label>
                                                        <input type="text"   name="facebook" value="{{$site->facebook}}" class="form-control" id="exampleInputName">
                                                </div>

                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> <i class="fab fa-instagram fa-lg" style="color: red; padding: 0 10px 0 10px ;"></i>انستاغرام</label>
                                                        <input type="text"   name="" value="{{$site->phone}}" class="form-control" id="exampleInputName">
                                                </div>
                                        </div>




                                                <button  id=""  type="submit" class="btn btn-primary">حفظ التغيرات</button>
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


                                    <form id="formabout" method="POST" action="{{route('_admin-create_about')}}">
                                        @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputName" class="form-label">عنوان المحتوى الرئيسي</label>
                                                    <input type="text" value="{{$site->title_about}}" name="title_about"  class="form-control" id="exampleInputName">
                                                    </div>

                                                <div class="row g-3">

                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف المحتوى الرئيسي</label>
                                                        <textarea type="text" id="editor" name = "descripe_about" class = "form-control editor "></textarea>
                                                    </div>


                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات الزائر</label>
                                                    <textarea type="text" id="editor" value=""  name = "descripe_ser_client" class = "form-control editor">{{$site->descripe_ser_client}}</textarea>
                                                    </div>
                                                    {{-- {!!$site->descripe_ser_client!!} --}}

                                                </div>

                                                <div class="row g-3">


                                                <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات الصيدلية</label>
                                                        <textarea type="text" id="editor" name = "descripe_ser_phar" class = "form-control editor "></textarea>
                                                    </div> 

                                                    <div class="mb-3 col-6">
                                                        <label for="exampleInputLink" class="form-label"> وصف خدمات المستخدم</label>
                                                        <textarea type="text" id="editor" name = "descripe_ser_user" class = "form-control editor"></textarea>
                                                    </div>


                                                </div>

                                                {{-- onclick="getData(this,'formabout','about')" --}}


                                                <button id="thisele"  id=""  type="submit" class="btn btn-primary">حفظ التغيرات</button>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
<script src='{{asset("/jquery/jquery.js")}}'> </script>   
<script>

 $(document).ready(function() {
    
    // function getData(thisele,formid,modelId)
    // {   debugger;
        alert('asasda');
        $('#submit_button').on('submit',function(event){
  event.preventDefault();
  
  var formDate=new FormData($('#update_index')[0]);
//   $.ajaxSetup({
//                   headers: {
//                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                   }
//               });
   $.ajax({
     type:'post',
     data:formDate,
     url:"{{route('_admin-update_WebSiteSetting')}}",
    success:function(data)
    { 
        // data.forEach(function (serv) {
            alert('data');
        console.log( data);

        // });
    }
    });

    });
 
});

// $('#services-tab').click(function() { 
//     alert('dasd');
//     event.preventDefault();
//     $.ajax({
//      type:'get',
//      url:"{{route('admin-get_services')}}",
//     success:function(data)
//     { 
//         data.forEach(function (serv) {
//         console.log( serv.title);

//         });
//     }
//     });
// });





</script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) ) 
    //     .catch( error => {
    //         console.error( error );
    //     } );
    var allEditors = document.querySelectorAll('.editor');
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i]);
}
</script>
<script>
   
</script>


@endsection
