@extends('layouts.masterUser2')

@section('content')

<div class="content-wrapper">
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
                        @foreach ($compliants as $compliant)
                    @if ($compliant->is_active == 1)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $compliant->pharmacy->user->name }}</td>
                            <td>{{ $compliant->created_at->diffForHumans() }}</td>
                            <td>{{ $compliant->message }}</td>
                            <td>
                                <div class="row">
                                   
                                    <div class="col">
                                        <a class="btn btn-outline-danger text-secondary"
                                            href="{{ route('client-compliants-delete', $compliant->id) }}" role="button">
                                            حــذف
                                        </a>
                                    </div>
                                    

                                </div>

                            </td>
                            
                            @if ($compliant->replay)
                            <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> 
        <button type="button" class="btn btn-submit " data-bs-toggle="modal" data-bs-target="#exampleModal2"
        onclick="$('#replay_massage').text('{{ $compliant->replay }}');">


   عرض الرد
       </button></td>
                                       @endif    
                            
       
                        </tr>
                    @endif
                @endforeach
                          <td colspan="5">
                            <div class="d-flex justify-content-center">
                            
                           <!-- Button trigger modal -->
<button type="button" class="btn btn-submit " data-bs-toggle="modal" data-bs-target="#exampleModal">
  اضافة شكوى
</tbody>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        
                      

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> المشتكى عليه  </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
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
                                <h6 class="mb-0">نص الشكوى   </h6>
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



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  عرض الرد</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="row"><p id="replay_massage">


         </p></div>
          

                   

                        <div class="row">
                            <button class="btn-submit radius text-center p-2 col-12 mt-2" type="submit">
                                تم
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
