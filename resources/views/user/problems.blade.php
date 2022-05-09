@extends('layouts.masterUser2')

@section('content')

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              

            
           


              <!-- added complaints -->
              <div class=" mt-5">
                  <div class="card">
                    <h5 class="card-header"> عرض الشكاوي </h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>المشتكى عليه </th>
                            <th>تاريخ الشكوى</th>
                            <th>محتوى الشكوى</th>
                            
                            <th>العمليات </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>صيدلية الحياة</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>22/2/2022</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>تاخر في التسليم</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>اضافة رد</strong></td>
                         
                           

                         
                          <tr>
                          <td colspan="5">
                            <div class="d-flex justify-content-center">
                            
                           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  اضافة شكوى
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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

                    <form action="{{ route('client-password-update') }}" method="POST" class="g-3">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">  المشتكى</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input value="{{ old('password') }}" type="password"
                                        placeholder="كلمة المرور القديمة" name="password"
                                        class="form-control rounded @error('password') border-danger @enderror">
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">المشتكى  </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="كلمة المرور الجديدة" name="new_password"
                                        class="form-control rounded @error('new_password') border-danger @enderror">
                                    @error('new_password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">تاريخ الشكوى   </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="password" placeholder="تأكيد كلمة المرور الجديدة"
                                        name="new_password_confirmed"
                                        class="form-control rounded @error('new_password_confirmed') border-danger @enderror">
                                    @error('new_password_confirmed')
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
                                اضافة
                            </button>
                        </div>
                    </form>
                </div>

      </div>
     
    </div>
  </div>
</div>
                            </div>
                        
                          </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>


            </div>
@stop
