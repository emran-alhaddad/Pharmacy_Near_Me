<div id="done" class="tab-pane fade">
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
                @if ($request->state == \App\Utils\RequestState::FINISHED)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $request->pharmacy->user->name }}</td>
                        <td>{{ $request->created_at->diffForHumans() }}</td>
                        <td>
                            {{ $request->replies->details->sum('drug_price') }}
                        </td>
                        <td><span class="badge bg-warning text-dark" style="background-color:green;">مكتملة</span></td>
                        <td><a class="btn btn-submit btn-hover text-light me-2" data-bs-toggle="collapse" role="button"
                                data-bs-target="#details{{ $request->id }}" aria-expanded="false"
                                aria-controls="collapseExample">
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
                                                @foreach ($request->replies->details as $rep_det)
                                                    @if ($requestDetails->id == $rep_det->request_details_id && $rep_det->state == \App\Utils\ReplyState::ACCEPTED)
                                                        <tr>
                                                            <td>
                                                                @if ($requestDetails->drug_image)
                                                                    <li data-bs-toggle="tooltip"
                                                                        data-popup="tooltip-custom"
                                                                        data-bs-placement="top" class="avatar pull-up"
                                                                        title="صورة العلاج "
                                                                        style="list-style-type: none;">
                                                                        <img src="{{ asset('uploads/requests/' . $requestDetails->drug_image) }}"
                                                                            alt="Avatar" class="rounded-circle image_show">
                                                                    </li>
                                                                @endif
                                                                <strong>{{ $requestDetails->drug_title }}</strong>
                                                            </td>
                                                            <td>{{ $requestDetails->quantity }}</td>
                                                            <td>
                                                                @if ($requestDetails->accept_alternative)
                                                                    <span class="badge bg-success text-light">
                                                                        نعم
                                                                    @else
                                                                        <span class="badge bg-danger text-light">
                                                                            لا
                                                                @endif
                                                                </span>
                                                            </td>
                                                            <td><a class="btn btn-primary" data-toggle="collapse"
                                                                    href="#reply{{ $requestDetails->id }}"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    عرض الرد
                                                                </a>
                                                            </td>
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
                                                                                                <td>
                                                                                                    @if ($requestDetails->drug_image)
                                                                                                        <li data-bs-toggle="tooltip"
                                                                                                            data-popup="tooltip-custom"
                                                                                                            data-bs-placement="top"
                                                                                                            class="avatar pull-up"
                                                                                                            title="صورة العلاج "
                                                                                                            style="list-style-type: none;">
                                                                                                            <img src="{{ asset('uploads/requests/' . $requestDetails->drug_image) }}"
                                                                                                                alt="Avatar"
                                                                                                                class="rounded-circle image_show">
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    <strong>{{ $requestDetails->drug_title }}</strong>
                                                                                                </td>
                                                                                                <td>{{ $requestDetails->quantity }}
                                                                                                </td>
                                                                                                <td><span
                                                                                                        class="badge bg-primary text-light">اساسي</span>
                                                                                                </td>
                                                                                                <td>{{ $replyDetails->drug_price }}
                                                                                                </td>
                                                                                            @else
                                                                                                <td>
                                                                                                    @if ($replyDetails->alt_drug_image)
                                                                                                        <li data-bs-toggle="tooltip"
                                                                                                            data-popup="tooltip-custom"
                                                                                                            data-bs-placement="top"
                                                                                                            class="avatar pull-up"
                                                                                                            title="صورة العلاج "
                                                                                                            style="list-style-type: none;">
                                                                                                            <img src="{{ asset('uploads/replies/' . $replyDetails->alt_drug_image) }}"
                                                                                                                alt="Avatar"
                                                                                                                class="rounded-circle image_show">
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    <strong>{{ $replyDetails->alt_drug_title }}</strong>
                                                                                                </td>

                                                                                                <td>{{ $requestDetails->quantity }}
                                                                                                </td>
                                                                                                <td><span
                                                                                                        class="badge bg-secondary text-light">بديل</span>
                                                                                                </td>
                                                                                                <td>{{ $replyDetails->alt_drug_price }}
                                                                                                </td>
                                                                                            @endif


                                                                                            <td>
                                                                                                <span
                                                                                                    class="badge bg-success text-light">تم
                                                                                                    قبول الرد</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
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
