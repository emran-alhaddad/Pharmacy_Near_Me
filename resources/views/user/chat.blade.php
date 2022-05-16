
@extends('layouts.masterUser2')

@section('content')


<div class="row g-0 me-auto ">

            <h1 class="h3 mb-3">الرسائل</h1>
    
            <div class="card ">
                <div class="row g-0 ">
                   
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong> صيدلية الحياة </strong>
                                    <div class="text-muted small"><em>يكتب ...</em></div>
                                </div>
                               
                            </div>
                        </div>
    
                        <div class="position-relative">
                            <div class="chat-messages p-4">
    
                                <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">صيدلية الامل</div>
                                      العلاج الذي تم طلبه يوجد لدينا بديلا عنه  
                                    </div>
                                </div>
    
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1"> انت</div>
                                        ولكن هل العلاج يحمل نفس الكفاءة ومن شركة مضمونه
                                    </div>
                                </div>
    
                                <div class="chat-message-right mb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">صيدلية الامل</div>
                                       نعم نفس الكفاءة والسعر
                                    </div>
                                </div>
    
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1"> انت</div>
                                      اذا انا موافق 
                                    </div>
                                </div>
    
                           
    
    
                            </div>
                        </div>
    
                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="  اكتب هنا">
                                <button type="submit" class="btn btn-submit me-2">ارسال <i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
    
                    </div>
            
            </div>
        </div>
    </main>
@stop