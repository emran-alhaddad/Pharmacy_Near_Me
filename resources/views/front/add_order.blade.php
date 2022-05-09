@extends('layouts.masterFront')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y" style="direction:rtl;">
            <!-- Order  -->
            <div class="card" style="margin-top:7rem;";>
                <h5 class="card-header"> المنتجات المندرجة ضمن طلبك</h5>
                <div class="table-responsive text-nowrap">
                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم /صورة العلاج</th>
                        <th>الكمية   </th>
                        <th>اقبل به  </th>
                        <th>كرر الطلبية كل</th>
                        <th>التاريخ  </th>
                        <!-- <th>تقديم عرض</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> بندول </strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
                        <td><span class="badge bg-label-warning me-1">نعم </span></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>اسبوع</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>22/3/2022</strong></td>
                       
                    
                    </tr>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> بندول </strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
                        <td><span class="badge bg-label-warning me-1">لا </span></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>اسبوع</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>22/3/2022</strong></td>
                       
                    
                    </tr>

                    </tbody>
                </table>
                </div>
            </div>


</div>

<div class="container">
    <div class="picture-container">
        <div class="picture">
            <img  src="{{ asset('admin/img/work/plus.jpg') }}" class="picture-src" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" class="">
        </div>
         <h6 class="">اختر صورة </h6>

    </div>
    <div class="form-group" style="direction:rtl;">
  <label for="usr">او اضف اسم العلاج</label>
  <input type="text" class="form-control" id="usr">

  <div class="row">
                <div class="mx-auto col-xl-6 col-lg-7 col-md-10">
                    <div class="text-center section-title mb-60">
</div>

<div class="box-style sidebar-pharmacy">
                               
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        اقبل بديل في حالة عدم توفره 
                                    </li>
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        المديرية
                                    </li>
                                 


                                </ul>
                            </div>

    <!-- info Section -->
    <div class="row justify-content-center">
    <section class="col-lg-8 col-md-8 col-12">
                        <div class="card shadow p-3">
     
            <form action="http://127.0.0.1:8000/client/update" method="POST" class="card-body">
                <input type="hidden" name="_token" value="Y5vKmU7Zz0q7XhMQqbsoCjqlWWetzhfxcOUUWwth">                <input type="hidden" name="_method" value="put">                <div class="row">
                  
                   
                </div>
             

               
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">التكرار كل </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="input-group mb-3">
                           
                            <input value="" type="number" placeholder=" اليوم" name="phone" class="form-control rounded ">
                            <input value="" type="number" placeholder=" الشهر" name="phone" class="form-control rounded ">
                            <input value="" type="number" placeholder=" السنة" name="phone" class="form-control rounded ">
                                                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">حتى تاريخ  </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded" style="background-color: var(--main-color)"><i class="bi bi-person-plus-fill text-white"></i></span>
                                    <input value="" type="date" placeholder="تاريخ الميلاد" name="dob" class="form-control rounded ">
                                                                    </div>
                            </div>
                        </div>
                    </div>

                
                </div>
                
                <hr>

          
         
            </form>
        </div>
    </section>
            </div>
            <div class="p-5">
<button type="submit" class="main-btn btn-hover">  ارسال الطلبية بالكامل  </button>
<button type="submit" class="main-btn btn-hover">اضافة المنتج الى الطلبية </button>
<!--form-->



  

   

    


        

      
</div>



                    </div>
                </div>
            </div>


</div>

@stop
