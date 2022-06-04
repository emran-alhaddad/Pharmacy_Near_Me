@extends('layouts.masterUser')

@section('content')


    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            <div class="layout-page">


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-accept" aria-controls="navs-top-accept"
                                                aria-selected="true"> في انتظار القبول
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-pay" aria-controls="navs-top-paym"
                                                aria-selected="false">
                                                في انتظار الدفع
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#wait-delivery" aria-controls="navs-top-delevry"
                                                aria-selected="false">
                                                في انتظار التوصيل
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#done" aria-controls="navs-top-done" aria-selected="false">
                                                مكتملة
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#rejected" aria-controls="navs-top-none"
                                                aria-selected="false">
                                                غير متوفره
                                            </button>
                                        </li>
                                    </ul>





                                    <div class="tab-content">
                                        @include('user.state.wait-acceptance')
                                        @include('user.state.wait-payment')
                                        @include('user.state.wait-delivery')
                                        @include('user.state.completed')
                                        @include('user.state.rejected')
                                    </div>



                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>


        </div>
    </div>
    </div>

    <!-- addCompliant Modal -->
    <div id="addCompliant" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافة شكوى</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @error('error')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('status')
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <form action="{{ route('client-compliants-store') }}" method="POST" class="g-3">
                        @csrf
                        <input type="hidden" name="order" id="order" />
                        <input type="hidden" name="pharmacy_id" id="pharmacy_id" />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> المشتكى عليه </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">

                                    <div class="dropdown col-12">
                                        <select id="pharmacy" name="pharmacy" disabled class=" rounded form-control">
                                            @foreach ($pharmacies as $pharmacy)
                                                <option value="{{ $pharmacy->user_id }}">
                                                    {{ $pharmacy->user->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">نص الشكوى </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3 rounded">
                                    <textarea value="{{ old('message') }}" name="message"
                                        class="form-control rounded @error('name') border-danger @enderror">

                            </textarea>
                                    @error('message')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <button class="btn-danger radius text-center p-2 col-12 mt-2" type="submit">
                                ارسال الشكوى
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script>
  
    function reject(order, pharmacy) {
        $('#order').val(order);
        $('#pharmacy_id').val(pharmacy);
        $('#pharmacy').val(pharmacy).change();
    }
  
     
    @if(session('tapState'))
    $(document).ready(function(){
        $("button[data-bs-target=\'#{{ session('tapState') }}\']").trigger('click');

    });

    @endif   
   


        // @if (session('tapState'))
        //     $(document).ready(function() {
        //         $("button[data-bs-target=\'#{{ session('tapState') }}\']").trigger("click");
        //     });
        // @endif
    </script>
@stop
