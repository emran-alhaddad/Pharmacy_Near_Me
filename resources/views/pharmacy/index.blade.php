@extends ('layouts.masterPharmacy')

@section('phar_profile_content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                         src="{{ asset('uploads/avaters/pharmacy/' . Auth::user()->avater) }}"><span
                        class="font-weight-bold">{{ Auth::user()->name }}</span><span
                        class="text-black-50">{{ Auth::user()->email }}</span><span>
                    </span>
                </div>
                <div class="d-flex flex-column">
                <a href="{{ route('logout') }}" class="btn btn-success" >
                Logout
                </a>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"> اعدادات الملف الشخصي للصيدلية</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <label class="f-5 my-4">الاسم</label>
                        <input type="text" value="{{ Auth::user()->name }}"
                                class="form-control" placeholder="first name" ></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="f-5 my-4"> رقم الجوال</label>
                        <input type="text" value="{{ Auth::user()->phone }}"
                                class="form-control" placeholder="enter phone number" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 1</label><input type="text"
                                class="form-control" placeholder="enter address line 1" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> العنوان 2</label><input type="text"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4">المحافضة</label>
                        <input type="text" value="{{ $pharmacy->zone->city->name }}"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4">المربع السكني</label>
                        <input type="text" value="{{ $pharmacy->zone->name }}"
                                class="form-control" placeholder="enter address line 2" ></div>
                        <div class="col-md-12"><label class="f-5 my-4"> الايميل</label>
                        <input type="text" value="{{ Auth::user()->email }}"
                                class="form-control" placeholder="enter email id" ></div>
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
