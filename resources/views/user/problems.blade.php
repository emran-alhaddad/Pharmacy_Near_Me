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
                            
                            <button class="btn btn-primary me-auto col-3" type="button">اضافة شكوى </button>
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
