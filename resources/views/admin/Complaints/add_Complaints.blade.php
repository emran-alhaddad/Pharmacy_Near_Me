@extends('layouts.masterAdmin')
@section('admin_pages')


    <div class="wrapper bg-white">
        <div class="row  ">
            <div class="col-12 col-m-8 col-sm-8">
                <div class="card bg-white m-5">

                    <div class="card-header d-flex justify-content-between">
                        <h3>الرد على الشكوى</h3>
                    </div>
                    <div class="card-content">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action={{ route('admin-create_Complaints', ['id' => $id]) }} method="POST">
                            <div class="row g-3">

                                {{-- <div class="mb-3 col-6">
                    <label for="exampleInputName" class="form-label">مقدم الشكوى</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3 col-6">
                    <label for="exampleInputLink" class="form-label">على من الشكوى</label>
                    <input type="text" class="form-control" id="exampleInputName">
            </div> --}}

                            </div>


                            <div class="row g-3">
                                <div class="mb-3 col-8">
                                    <label for="exampleInputLink" class="form-label">رد الشكوى</label>
                                    <textarea type="text" name="replay" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="orderMony"
                                            class="custom-control-input" checked value="client">
                                        <label class="custom-control-label" for="customRadioInline1">إعادة المبلغ
                                            للعميل</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="orderMony"
                                            class="custom-control-input" value="pharmacy">
                                        <label class="custom-control-label" for="customRadioInline2">دفع للصيدلية</label>
                                    </div>
                                </div>
                            </div>


                            <button id="submit_button" type="submit" class="btn btn-primary">ارسال الرد</button>
                        </form>



                    </div>
                </div>
            </div>


        @stop
