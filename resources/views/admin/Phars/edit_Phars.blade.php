@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تعديل صيدلية</h3>
            </div>
            <div class="card-content px-5 row">
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

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
              @endforeach

         <form method="POST" class="col-9" action={{route('_admin-phar_Updata', ['id' => $phar->id]);}}>


        <div class="row g-3">
            <div class="mb-3 col-8">
                    <label for="exampleInputName" class="form-label">اسم الصيدلية</label>
            <input type="text" name="name" value="{{$phar->name}}" class="form-control" id="exampleInputName">
            </div>


            {{-- <div id="" class="mb-3 col-4">
                <form id="update_image" method="POST" action="{{route('_admin-phar_avater')}}">
                    @csrf

                    <div class="d-flex justify-content-start align-items-sm-center gap-4">
                    <img
                        src="{{asset("/uploads/pharmacy/$phar->avater")}}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    <div class="button-wrapper">
                        <button type="" id="btn_update_avater" class="d-none d-sm-block"  >تعديل صورة الصيدلي</button>

                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">


                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file"

                            id="update_avater"
                            class="account-file-input"


                            name="avater"
                        />
                        </label>
                    </div>
                    </div>



                </form>

                </div> --}}


        </div>

        <div class="row g-3">

            <div class="mb-3 col-3 col-4">
                <label for="exampleInputLink" class="form-label">المدينة</label>
                    <select class="form-select" name="city_id" aria-label="Default select example">
                      @foreach ($city as $c )
                        @if ($c->id ==$phar->Cid)
                    <option value="{{$c->id}}" selected> {{$c->name}} </option>

                        @else
                        <option value="{{$c->id}}" > {{$c->name}} </option>
                        @endif
                      @endforeach
                        {{-- <option selected> تعز </option>
                        <option value="1">عدن</option>
                        <option value="2">صنعاء</option>
                        <option value="3">حضرموت</option> --}}
                    </select>
                </div>

            <div class="mb-3 col-4">
                <label for="exampleInputLink" class="form-label">المنطقة السكنية</label>
                    <select class="form-select"  name="zone_id" aria-label="Default select example">

                        @foreach ($zone as $c )
                        @if ($c->id ==$phar->Zid)
                    <option value="{{$c->id}}" selected> {{$c->name}} </option>

                        @else
                        <option value="{{$c->id}}" > {{$c->name}} </option>
                        @endif
                      @endforeach
                        {{-- <option selected> الروضة </option>
                        <option value="1">المسبح</option>
                        <option value="2">بيرباشا</option>
                        <option value="3">صينا</option> --}}
                    </select>
            </div>


        </div>


        <div class="row g-3">

            <div class="mb-3 col-8">
                    <label for="exampleInputLink" class="form-label">العنوان</label>
            <input type="text" name="address" value="{{$phar->address}}" class="form-control" id="exampleInputName">
            </div>



          <div class="mb-3 col-4">
            <!-- <label for="formFile" class="form-label">صورة الرخصة</label>
            <input class="form-control" type="file" id="formFile"> -->


            {{-- <div class="d-flex align-items-start align-items-sm-center gap-4">
                <form action="">
                    <img
                        src="{{asset("/uploads/license/$phar->license")}}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"/>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">تعديل صورة الرخصة</span>
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
                </form>







           </div> --}}

        </div>

        <div class="row g-3">
        <div class="mb-3 col-4">
            <label for="formFile" class="form-label">  اوقات الدوام</label>
            <input class="form-control " type="time" id="formFile" >

        </div>

        <div class="mb-3 col-8">
            <label for="formFile" class="form-label"> وصف الصيدلية</label>
        <textarea type="text" name = "description" value="{{$phar->description}}" class = "form-control"></textarea>

        </div>
        </div>


        <div class="row g-3">
            <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label"> البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">  رقم الهاتف</label>
                <input type="text" name="phone" value="{{$phar->phone}}" class="form-control" id="exampleFormControlInput1" >
                </div>

                    <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">الموقع الالكتروني</label>
                    <input type="text" name="google"  value="{{$phar->google}}" class="form-control" id="exampleFormControlInput1" >
                </div>


        </div>

            <div class="row g-3">
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">  <i class="fab fa-whatsapp fa-lg" style="color: lightgreen; padding : 0 10px 0 10px;"></i> واتساب</label>
                    <input type="text" name="whatsup" value="{{$phar->whatsup}}"  class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"> <i class="fab fa-twitter fa-lg" style="color: #55acee; padding : 0 10px 0 10px;"></i> تويتر</label>
                    <input type="text" name="twitter" value="{{$phar->twitter}}"  vaclass="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label"><i class="fab fa-facebook-f fa-lg" style="color: #3b5998; padding: 0 10px 0 10px ;"></i>فيسبوك</label>
                    <input type="text" name="facebook" value="{{$phar->facebook}}" class="form-control" id="exampleFormControlInput1">
                </div>


        </div>

        <div class="row g-3">
        <div class="mb-3 col-6">
        <a href="" data-bs-toggle= "modal" data-bs-target="#edit-email">تعديل البريد الكتروني</a>
        </div>
        <div class="mb-3 col-6">
        <a href="" data-bs-toggle= "modal" data-bs-target="#addpassword"> تعديل كلمة المرور</a>
        </div>

        </div>


            <button  id="submit_button"  type="submit" class="btn btn-primary">تعديل</button>
    </form>



            </div>

            <div class="align-left col-3 align-items-start align-items-sm-center gap-4">
                <form  enctype="multipart/form-data"  method="POST" action={{route("_admin-phar_licenes")}} class="card" style="width: 18rem;">
                    @csrf
                    <input type="file"  name="license" id="license_img" onchange="edit(event,'license_id')" class="account-file-input invisible" />
                <input type="hidden" name="id" value="{{$phar->id}}">
                    <label for="license_img" class="" tabindex="0">
                    <img
                        src="{{asset("/uploads/license/$phar->license")}}"
                        alt="user-avatar"
                        class="d-block rounded card-img-top"
                        height="100"
                        width="100"
                        id="license_id"/>
                    </label>
                    <div class="button-wrapper">

                        <button type="submit"  class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">تعديل صورة الرخصة</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        </button>


                    </div>

                </form>
                <div class="mb-3 ">
                    {{-- <label for="upload-image" class="form-label"> --}}




                    <div class=" align-items-start align-items-sm-center gap-4">
                    <form action="{{route('_admin-phar_avater')}}" enctype="multipart/form-data" method="POST" class="card" style="width: 18rem;">
                        @csrf
                        <input class="form-control invisible" onchange="edit(event,'img_avater')" name="avatar"  type="file" id="upload-image">
                        <input type="hidden" name="id" value="{{$phar->id}}">
                            <label for="upload-image" class="form-label">
                            <img
                                src="{{asset("/uploads/avaters/pharmacy/$phar->avater")}}"
                                alt="user-avatar"
                                class="d-block rounded card-img-top"
                                height="100"
                                width="100"
                                id="img_avater"/>
                                </label>

                            <div class="button-wrapper card-body">
                                <button type="submit" for="upload-image" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">  تعديل صورة اللوجو</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                </button>
                                {{-- <input
                                    type="file"

                                    id="upload-image"
                                    class="account-file-input"
                                    hidden
                                    accept="image/png, image/jpeg"
                                    name="image"
                                /> --}}

                            </div>
                            </div>
                        </form>







                  </div>




    </div>




           </div>


        </div>  {{-- end--}}
</div>



@stop




                                {{-- <div class="modal"  id="addemail"  tabindex="-1">
                                        <div class="modal-dialog">
                                        <form action="{{route('_admin-phar_email')}}" method="post"></form>
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title ps-5 ms-5">تعديل البريد الالكتروني </h5>
                                            <button type="button" class="btn-close pe-5 me-5" data-bs-dismiss="modal" aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 col-12">
                                            <label for="exampleFormControlInput1" class="form-label"> البريد الالكتروني</label>
                                            <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <button class="btn btn-primary" type="button" id="button-addon1">ارسال</button>

                                            </div>
                                            </div>

                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">  ادخل رقم التأكيد</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" id="submit_button">تعديل الايميل</button>
                                            </div>
                                            </div>
                                        </div>
                                </div> --}}
                                 <!-- edit email -->
    <div class="modal fade" id="edit-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
                        تبديل البريد الالكتروني
                    </h4>
                    <button type="button" class="btn-close col-2" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="sendEmailCode" action="{{ route('_admin-phar_email') }}" method="POST"
                        class="row">
                        @csrf
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">البريد الإلكتروني</h6>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text rounded"
                                            style="background-color: var(--main-color)"><i
                                                class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="hidden" id="id" name="id" value="{{ $phar->id }}">
                                    <input type="hidden" id="name"  name="name" value="{{ $phar->name }}">
                                        <input value="{{ $phar->email }}" id='currentEmail' type="email"
                                            placeholder="البريد الإلكتروني" name="email"
                                            class="form-control rounded @error('email') border-danger @enderror">
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button class="btn-submit radius text-center p-2 col-12 mt-2">
                                        ارسال رمز التحقق
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <hr>
                    <form action="{{ route('_admin-phar_check_email') }}" method="POST" class="g-3">

                        @csrf


                        <input id="hiddenEmail" type="hidden" name="email">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">رمز التحقق</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" placeholder="رمز التحقق" name="code"
                                        class="form-control rounded @error('code') border-danger @enderror">
                                    <input type="hidden" name="id" value="{{$phar->id}}">
                                    @error('code')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="row">
                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


                                <div class="modal"  id="addpassword"  tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title ps-5 ms-5">تغيير كلمة المرور </h5>
                                            <button type="button" class="btn-close pe-5 me-5" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">  كلمة المرور القديمة</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">  كلمة المرور الجديدة</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="exampleFormControlInput1" class="form-label">    تأكيد كلمة المرور</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" id="submit_button">اضافة</button>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>






<script>
    function edit(event,id)
    {
        var out=document.getElementById(id);
        out.src=URL.createObjectURL(event.target.files[0]);
    }

        $(window).on('load', function() {
            @error('modal')
                $("#{{ $message }}").modal('show');
            @enderror

        });
        var formData={};

        $("#sendEmailCode").on('submit', function(e) {
            e.preventDefault();
            // var formData=new FormData($('#sendEmailCode')[0]);
            $("#sendEmailCode :input").each(function(){
          var input = $(this);
          if (typeof input.attr("name") !== 'undefined')
          { console.log(typeof  input.attr("name")+" "+input.val());
            formData[input.attr("name")]=input.val();
          }

        //  console.log(typeof  input.attr("name")+" "+input.attr("value"));
});
            // var token = $($("[name='_token']")[0]).val();
            // var email = $("#currentEmail").val();
            // var name = $("#name").val();
            // var id = $("#id").val();
            $.ajax({
                method: 'post',
                data:formData,
                url: "{{ route('_admin-phar_email') }}",
                success: function(data) {
                    $("#hiddenEmail").val($("#currentEmail").val());
                    if (data['type'] != 'danger')
                        $("#currentEmail").attr('disabled', 'disabled');
                    $("#sendEmailCode").html(
                        "<div class='alert alert-" + data['type'] + "' role='alert'>" +
                        data['data'] +
                        "</div>" +
                        $("#sendEmailCode").html()
                    );

                }


            })
        })
    </script>


// $(document).ready(function() {

//  $("document").on('submit','update_image',function(event) {
//     event.preventDefault();
//     alert('dasd');
//     var formData=new FormData($('#update_image')[0]);

//     $.ajax({
//      type:'post',
//      url:"{{route('_admin-phar_avater')}}",
//      enctype:'multipart/form-data',
//      data:formData,
//     success:function(data)
//     {
//         // data.forEach(function (serv) {
//         console.log(data);

//         // });
//     }
//     });
// });
// });
                                    </script>

