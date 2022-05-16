@extends('layouts.masterUser2')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="container">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"> رصيدك الحالي هو 0 ريال</a>
    <button type="submit" class="btn btn-submit btn-hover  me-2">سحب رصيد من المحفظة <i class="lni lni-search-alt"></i></button>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">بحث</button>
    </form>
  
</nav>
<!--table-->
<div class="row  ">
        <div class="col-12 col-m-12 col-sm-12">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
             
                <h5>العمليات في المحفظة</h5>
            </div>
            <div class="card-content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> رقم العملية </th>
                            <th>نص العملية</th>
                          
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                              تم تحويل 12  من حساب عمران الى حساب وفاء وذلك مقابل رسوم المنتجات المالية

                            </td>

                    


                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                            تم تحويل 12  من حساب عمران الى حساب وفاء وذلك مقابل رسوم المنتجات المالية


                            </td>

                    


                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
</div>







<script src="http://127.0.0.1:8000/admin/js/script2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</div>
</div>
            <div id="rejected" class="tab-pane fade in">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">رقم الطلبية</th>
                        <th scope="col">الصيدلية</th>
                        <th scope="col">تاريخ الطلبية</th>
                        <th scope="col">حالة الطلبية</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            


                </tbody>
            </table>
        </div>        </div>
    </div>
</div>
<!-- / Content -->



@stop

