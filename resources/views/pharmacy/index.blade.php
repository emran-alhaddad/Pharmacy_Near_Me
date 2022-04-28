@extends ('layouts.masterPharmacy')

@section('phar_profile_content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">ابولو</span><span class="text-black-50">Apolo@mail.com.my</span><span>
                    </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"> اعدادات الملف الشخصي للصيدلية</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <label class="f-5 my-4">الاسم</label><input type="text"
                                class="form-control" placeholder="first name" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="f-5 my-4"> رقم الجوال</label><input type="text"
                                class="form-control" placeholder="enter phone number" value=""></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 1</label><input type="text"
                                class="form-control" placeholder="enter address line 1" value=""></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 2</label><input type="text"
                                class="form-control" placeholder="enter address line 2" value=""></div>
                        <div class="col-md-12"><label class="f-5 my-4">المديرية</label><input type="text"
                                class="form-control" placeholder="enter address line 2" value=""></div>
                        <div class="col-md-12"><label class="f-5 my-4">المربع السكني</label><input type="text"
                                class="form-control" placeholder="enter address line 2" value=""></div>
                        <div class="col-md-12"><label class="f-5 my-4"> الايميل</label><input type="text"
                                class="form-control" placeholder="enter email id" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="f-5 my-4">الدولة</label><input type="text"
                                class="form-control" placeholder="country" value=""></div>
                        <div class="col-md-6"><label class="f-5 my-4">المدينة</label><input type="text"
                                class="form-control" value="" placeholder="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button text-dark "
                            type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
