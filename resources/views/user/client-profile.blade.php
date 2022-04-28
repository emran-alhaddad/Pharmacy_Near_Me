
@extends('layouts.masterUser')

@section('content')

<!-- order Section -->
<section class="col-lg-8 col-md-8 col-12" id="ord">
        <div class="card shadow p-3">
        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
            <h3 class="fw-bold text-prof">ارسال طلب  </h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">اسم العلاج </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                بلا بلا بلا
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" />
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">الكمية</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                <input type="number" placeholder="1" >
                </div>
            </div>
            <hr>
                <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">أقبل البدائل </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                <input type="checkbox" >
                </div>
            </div>
            <hr>
                <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">تكرار الطلبية </h6>
                </div>
                <a class="col-sm-9" role="button "data-bs-toggle="modal"data-bs-target="#rep">
                <div class="col-sm-9 text-secondary">
                <input type="checkbox" >

                </div>  </a>
            </div>
            <hr>
            <div class="row">
                <button type="button" class="col-12 p-2 m-2 log-btn ">اضافة</button>
            </div>

            </div>
        </div>
        <!-- detelis section -->
    <div class=" col-12 align-content-center" id="detelis">
        <div class="card p-3">
            <div  class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-prof">التفاصيل</h3>
                </div>

                <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">اسم العلاج </div>
                        <div class="col-3">صورة العلاج </div>
                        <div class="col-2">الكمية </div>
                        <div class="col-2">البدائل </div>
                        <div class="col-2">التكرار  </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-3">اسم العلاج </div>
                        <div class="col-3">صورة العلاج </div>
                        <div class="col-2">الكمية </div>
                        <div class="col-2">البدائل </div>
                        <div class="col-2">التكرار  </div>

                    </div>
                    <hr>
                    <div class="row">
                        <button class="col-12 p-2 m-2 log-btn">ارسال الطلبية </button>

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>



        <!-- info Section -->
    <section class="col-lg-8 col-md-8 col-12" id="perso">
        <div class="card shadow p-3">
        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
            <h3 class="fw-bold text-prof">المعلومات الشخصية </h3>
            <a role="button" data-bs-toggle="modal"data-bs-target="#edit-info"
                class="  border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle"
                style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
            <i class="fas fa-edit"></i>
        </a>


        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">الاسم الكامل </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                {{ Auth::user()->name }}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">الايميل </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                {{ Auth::user()->email }}
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">الهاتف</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                (+697) 777 777 777
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">العنوان</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                تعز - القاهره - المسبخ
                </div>
            </div>


            </div>
        </div>
    </section>


</div>

</main>

<!-- Edit user avatar image model -->
<div
class="modal fade"
id="avatar-edit-model"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content p-3">
    <!-- model header -->
    <div class="modal-headerd-flex justify-content-between align-items-center">
    <h4 class="modal-title fw-bold text-center" id="exampleModalLabel">
        تعديل صورة البروفايل
    </h4>

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
    ></button>
    </div>

    <!-- model body -->
    <div class="modal-body">
    <form class="g-3">
        <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" />
        </div>
    </form>
    </div>

    <!-- model footer -->
    <div class="modal-footer">
    <button type="button" class="btn bg-primary text-white">
        تعديل
    </button>
    </div>
</div>
</div>
</div>

<!-- edit user info -->
<div
    class="modal fade"
    id="edit-info"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
<div class="modal-content p-3">
<div class="modal-header">
    <h4 class="modal-title fw-bold text-center col-10" id="exampleModalLabel">
    تعديل المعلومات الشخصية
    </h4>
    <button
    type="button"
    class="btn-close col-2"
    data-bs-dismiss="modal"
    aria-label="Close"
    ></button>


</div>

<div class="modal-body">
    <form class="row g-3">
    <div class="col-6">
        <!-- [عمم] name -->
        <div class="input-group">
            <input
            type="text"
            class="form-control"
            placeholder="اسمك الكامل "
            aria-label="fName"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>
        </div>


        <!-- email -->
        <div class="col-6">
        <div class="input-group">
            <input
            type="email"
            class="form-control"
            placeholder="الايميل"
            aria-label="email"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>
        </div>


        <!-- phone number -->
        <div class="col-6">
        <div class="input-group">
            <input
            type="text"
            class="form-contro 1"
            placeholder="رقم الهاتف"
            aria-label="phone"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>
        </div>

        <!-- Address  -->
        <div class="col-6">
        <div class="input-group">
            <input
            type="text"
            class="form-control l"
            placeholder="العنوان"
            aria-label="add"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>
        </div>

        <!-- bio -->
        <div class="col-12">
        <div class="input-group">
            <input
            type="text"
            class="form-control l"
            placeholder="سيرة ذاتية"
            aria-label="add"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>
        </div>


    </form>
</div>

<div class="modal-footer">
    <button type="button" class=" col-12 btn bg-primary text-white">Save</button>
</div>
</div>
</div>
</div>

<!-- Repeate modal -->
<div  class="modal fade"
        id="rep"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
    <div class="modal-body fw-bold d-flex justify-content-lg-center align-items-center flex-column">
    <h3 class="fs-4">تكرار الطلبية كل </h3>
    <div class="col">
        <div class="d-inline-block p-2"> <input type="number" placeholder="0"><h3 class="text-center">يوم</h3></div>
        <div class="d-inline-block  p-2"> <input type="number" placeholder="0"><h3 class="text-center">شهر</h3></div>
        <div class="d-inline-block  p-2"> <input type="number" placeholder="0"><h3 class="text-center">أسبوع</h3></div>
        <div class="d-inline-block  p-2"> <input type="number" placeholder="0"><h3 class="text-center">سنه</h3></div>
    </div>

        <div class="row">
            <h3 class="fs-4 col-6"> حتى تاريخ   </h3>
        <div class="input-group col-6">
            <input
            type="date"
            aria-describedby="addon-wrapping"
            required
            value=""
            />
        </div>

     </div>

    </div>
    <div class="modal-footer">
    <button type="button"
        class="btn"
        data-bs-dismiss="modal" >
        تم
    </button>
    </div>
</div>
</div>
</div>
<!-- Delete  modal -->
<div  class="modal fade"
id="delete"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true" >
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div
    class="modal-body fw-bold d-flex justify-content-lg-center align-items-center flex-column"
    >
    <i class="bi bi-exclamation-circle fs-1 text-danger"></i>
    <h3 class="fs-4">هل تريد الحذف ؟</h3>
    </div>
    <div class="modal-footer">
    <button
        type="button"
        class="btn btn-primary"
        data-bs-dismiss="modal"
    >
        لا
    </button>
    <button type="button" class="btn btn-danger">نعم </button>
    </div>
</div>
</div>
</div>



@stop
