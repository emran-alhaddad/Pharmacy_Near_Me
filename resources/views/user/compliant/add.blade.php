@extends('layouts.masterUser')

@section('content')

    <!-- order Section -->
    <section class="col-lg-9 col-md-8 col-12" id="ord">
        <div id="alert_msg" class="alert alert-danger hide" role="alert">

        </div>
        <div id="success_msg" class="alert alert-success hide" role="alert">

        </div>
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
        <form action="{{ route('client-compliants-store') }}" method="POST">
            @csrf
            <div class="card shadow p-3">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold text-prof"> إرسال شكوى </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">المشتكى علية </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <div class="input-group mb-3 rounded">
                                <div class="dropdown col-12">
                                    <select name="pharmacy_id"  class=" rounded form-control">
                                    @foreach ($pharmacies as $pharmacy)
                                        <option value="{{ $pharmacy->user_id }}">{{ $pharmacy->user->name  }}</option>
                                    @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">نص الشكوى  </h6>
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
                            <button  type="submit" class="col-12 p-2 m-2 log-btn">ارسال
                                الشكوى </button>

                        </div>
                </div>
            </div>
        </form>
    </section>
@stop
