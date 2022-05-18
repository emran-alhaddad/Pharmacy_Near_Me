@extends('layouts.masterFront')

@section('content')

    {{-- payment --}}
    <section id="pay" class="contact-us section  radius search-area" style="direction: rtl; z-index: 00000000;">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <form action="{{ route('user-payment-pay',$request['order_reference']) }}" method="post" class="row p-2  shadow radius">

                    <div class="text-center banner-area ">
                        <h3 class="heading text-white">عملية الدفع</h3>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {!! session('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {!! session('status') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="col-lg-6 col-12 radius p-5 ">
                        <div class="form-main">
                            <div class="text-center">
                                <h3 class="heading" style="font-size: 1.6rem">المعلومات <span>الشخصية </span></h3>
                            </div>
                            <div class="form" >
                                <div class="row">
                                    @csrf
                                    <div class="p-4">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text rounded"
                                                style="background-color: var(--main-color)"><i
                                                    class="bi bi-person-fill text-white"></i></span>
                                            <input value="{{ Auth::user()->name }}" type="text" placeholder="اسم المستخدم" name="name"
                                                class="form-control rounded @error('name') border-danger @enderror">
                                            @error('name')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text rounded"
                                                style="background-color: var(--main-color)"><i
                                                    class="bi bi-envelope-fill text-white"></i></span>
                                            <input type="email" value="{{ Auth::user()->email }}" placeholder="example@example.com" name="email"
                                                class="form-control rounded @error('email') border-danger @enderror">
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text rounded"
                                                style="background-color: var(--main-color)"><i
                                                    class="lni lni-map-marke text-white"></i></span>
                                            <input type="address" value="" placeholder="وصف العنوان " name="address"
                                                class="form-control rounded @error('address') border-danger @enderror">
                                            @error('address')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3 rounded">
                                            <div class="dropdown col-12">
                                                <select name="city" id="location" class="col-12 rounded form-control">
                                                    <option value="none" selected disabled> المدينة </option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3 rounded">
                                            <div class="dropdown col-12">
                                                <select name="zone" id="category" class="col-12 rounded form-control">
                                                    <option value="none" selected disabled> الحي </option>
                                                    @foreach ($zones as $zone)
                                                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12 radius p-5 ">
                        <div class="form-main">
                            <div class="text-center">
                                <h3 class="heading" style="font-size: 1.6rem">تفاصيل <span>الطلبية</span></h3>
                            </div>
                            <div class="form" >
                                <div class="row">

                                    <div class="row">
                                        <div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-0"> لديك
                                                        {{ $request['total_products'] }}
                                                        منتجات في انتظار الدفع </p>
                                                </div>
                                            </div>

                                            @foreach ($request['products'] as $product)
                                                        <div class="card mb-3 col-12">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    @if ($product['drug_price'])
                                                                        <div class="d-flex flex-row align-items-center">
                                                                             @if (isset($product['drug_image']))
                                                                            <div>

                                                                                <img src="{{ $product['drug_image'] }}"
                                                                                    class="img-fluid rounded-3"
                                                                                    alt="Shopping item"
                                                                                    style="width: 65px;">
                                                                            </div>
                                                                            @endif
                                                                            @if (isset($product['drug_title']))
                                                                            <div class="ms-3">
                                                                                <h5>{{ $product['drug_title'] }} </h5>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="d-flex flex-row align-items-center">
                                                                            <div style="width: 50px;">
                                                                                <h5 class="fw-normal mb-0">
                                                                                    {{ $product['quantity'] }}</h5>
                                                                            </div>
                                                                            <div style="width: 80px;">
                                                                                <h5 class="mb-0">
                                                                                    ${{ $product['drug_price'] }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                            @endforeach


                                            <hr>
                                            <div class="d-flex justify-content-around mb-5">
                                                <h5 class="text-uppercase">اجمالي السعر </h5>
                                                <h5>${{ $request['total_price'] }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center p-1 my-2 radius">
                        <div class="form-group d-flex justify-content-center col-6">
                            <a href="javascript:void(0);" class="col-12">
                                <button type="submit" class="main-btn col-12 btn-hover">دفع </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



@stop
