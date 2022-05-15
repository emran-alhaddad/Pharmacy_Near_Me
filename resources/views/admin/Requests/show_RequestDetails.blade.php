@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 ">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تفاصيل الطلب</h3>
            </div>
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th> مرسل الطلب</th>
                            <th> مستقبل الطلب</th>
                            <th>صورة الدواء</th>
                            <th>اسم الدواء</th>
                            <th> نوع الدواء</th>
                            <th> الكمية</th>
                            
                           
                            <th>تكرار الطلبية كل</th>
                            <th>تكرار الطلبية حتى تاريخ</th>
                            <th>الحالة</th>
                            <!-- <th>العمليات</th> -->
                        </tr>
                    </thead>


                    <tbody>
                      @php 
                      for($i=0 ;$i<sizeof($request[0]->details);$i++)
                       {
                       
                       
                       echo '<tr>
                           <td>'.$request[0]->client->user->name.'</td>
                            <td>'. $request[0]->pharmacy->user->name. '</td>';
                             if ($request[0]->replies->details[$i]->drug_price)
                             {
                           echo' <td>'.$request[0]->details[$i]->drug_image.'</td>
                            <td>'.$request[0]->details[$i]->drug_title.'</td>
                            <td>اساسي </td>';
                             }
                            
                             else
                             {
                            echo' <td>'.$request[0]->replies->details[$i]->alt_drug_image.'</td>
                             <td>'.$request[0]->replies->details[$i]->alt_drug_title.'</td>
                             <td>بديل</td>';
                             }
                           echo' <td>'.$request[0]->details[$i]->quantity.'</td>
                            
                            
                         
                            
                            <td>'.$request[0]->details[$i]->repeat_every.'</td>
                            <td>'.$request[0]->details[$i]->repeat_until.'</td>';
                            
                        
                        //     {{-- <td>ابولو</td>
                        //     <td>ابولو</td>
                        //     <td>  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        //             class="rounded-circle img-fluid" style="width: 50px;">
                        //     </td>
                        //     <td>ابولو</td>
                        //     <td>

                        //     نعم

                        //     </td>
                        //     <td>10</td>
                        //     <td>2032\10\20</td>
                        //     <td>2034\10\30</td>

                        //     <td>
                        //         <button class="btn badge btn-success text-white" >مفعل</button>

                        //     </td> --}}

                        // <!-- <td>
                        //     <a href="/_admin/edit_Requests">  <button class="btn btn-primary text-white" >تعديل</button></a>
                        //         <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">حذف</button>
                        //             <div class="modal"  id="exampleModal"  tabindex="-1">
                        //                 <div class="modal-dialog">
                        //                     <div class="modal-content">
                        //                     <div class="modal-header">
                        //                         <h5 class="modal-title">حذف </h5>
                        //                     </div>
                        //                     <div class="modal-body">
                        //                         </p> هل تريد حقا حذف الاعلان ؟</p>
                        //                     </div>
                        //                     <div class="modal-footer">
                        //                         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">لا</button>
                        //                         <button type="button" class="btn btn-primary">نعم</button>
                        //                     </div>
                        //                     </div>
                        //                 </div>
                        //             </div>

                        //     </td> -->


                     echo'   </tr>';
                    }
                        @endphp

                    </tbody>



                </table>

            </div>
        </div>
</div>



@endsection
