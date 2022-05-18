<div id="wait-delivery" class="tab-pane fade">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">رقم الطلبية</th>
                <th scope="col">الصيدلية</th>
                <th scope="col">تاريخ الطلبية</th>
                <th scope="col">سعر الطلبية</th>
                <th scope="col">حالة الطلبية</th>
                <th scope="col">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                @if ($request->state == \App\Utils\RequestState::WAIT_DELIVERY)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $request->pharmacy->user->name }}</td>
                        <td>{{ $request->created_at->diffForHumans() }}</td>
                        <td>
                            {{ $request->replies->details->sum('drug_price') }}
                        </td>
                        <td><span class="badge bg-warning text-dark" style="background-color:rgb(195, 216, 161);">في
                                انتضار التوصيل</span></td>
                        <td><a class=" btn btn-submit btn-hover me-2" data-bs-toggle="collapse"
                                        role="button"
                                        data-bs-target="#details{{ $request->id }}"
                                aria-expanded="false" aria-controls="collapseExample">
                                عرض التفاصيل
                            </a></td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <div class=" collapse" id="details{{ $request->id }}">
                                <div class="card card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">أسم/صورة العلاج</th>
                                                <th scope="col"> الكمية</th>
                                                <th scope="col">أقبل البدائل</th>
                                                <th scope="col">العمليات </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($request->details as $requestDetails)
                                                        <tr>
                                                            <td>{{ $requestDetails->drug_title }}</td>
                                                            <td>{{ $requestDetails->quantity }}</td>
                                                            <td>
                                                                    @if ($requestDetails->accept_alternative)
                                                                    <span class="badge bg-success text-light">
                                                                        نعم
                                                                    @else
                                                                    <span class="badge bg-danger text-light">
                                                                        لا
                                                                    @endif
                                                                </span></td>
                                                            <td><a class="btn btn-primary" data-toggle="collapse"
                                                                    href="#reply{{ $requestDetails->id }}"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    عرض الرد
                                                                </a></td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="5">
                                                                <div class=" collapse"
                                                                    id="reply{{ $requestDetails->id }}">
                                                                    <div class="card card-body">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">أسم/صورة العلاج</th>
                                                                                    <th scope="col"> الكمية</th>
                                                                                    <th scope="col">نوع الرد</th>
                                                                                    <th scope="col">سعر العلاج </th>
                                                                                    <th scope="col">قبول الرد </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($request->replies->details as $replyDetails)
                                                                                    @if ($requestDetails->id == $replyDetails->request_details_id)
                                                                                        <tr>
                                                                                            @if ($replyDetails->drug_price)
                                                                                                <td>{{ $requestDetails->drug_title }}
                                                                                                </td>
                                                                                                <td>{{ $requestDetails->quantity }}
                                                                                                </td>
                                                                                                <td><span
                                                                                                        class="badge bg-primary text-light">اساسي</span>
                                                                                                </td>
                                                                                                <td>{{ $replyDetails->drug_price }}
                                                                                                </td>
                                                                                            @else
                                                                                                <td>{{ $replyDetails->alt_drug_title }}
                                                                                                </td>
                                                                                                <td>{{ $requestDetails->quantity }}
                                                                                                </td>
                                                                                                <td><span
                                                                                                        class="badge bg-secondary text-light">بديل</span>
                                                                                                </td>
                                                                                                <td>{{ $replyDetails->alt_drug_price }}
                                                                                                </td>
                                                                                            @endif
                                                                                            @if ($replyDetails->state == \App\Utils\ReplyState::ACCEPTED)
                                                                                            <td>
                                                                                                <span class="badge bg-success text-light" >تم قبول الرد</span>
                                                                                            </td>
                                                                                            @else
                                                                                            <td>
                                                                                                <span class="badge bg-danger text-light" >تم رفض الرد</span>
                                                                                            </td>
                                                                                            @endif
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
