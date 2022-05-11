<div id="wait-accept" class="tab-pane active">
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
                    @foreach ($requests as $request)
                        @if ($request->state == \App\Utils\RequestState::WAIT_ACCEPTANCE)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $request->pharmacy->user->name }}</td>
                                <td>{{ $request->created_at->diffForHumans() }}</td>
                                <td><span class="badge bg-warning text-dark">انتضار القبول</span></td>
                                <td><a class="btn btn-primary" href="javascript:void(0);"
                                        data-bs-toggle="collapse"
                                        role="button"
                                        data-bs-target="#details{{ $request->id }}" >
                                        عرض التفاصيل
                                    </a></td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="collapse" id="details{{ $request->id }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">أسم/صورة العلاج</th>
                                                        <th scope="col"> الكمية</th>
                                                        <th scope="col">أقبل البدائل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($request->details as $details)
                                                        <tr>
                                                            <td>{{ $details->drug_title }}</td>
                                                            <td>{{ $details->quantity }}</td>
                                                            <td>
                                                                    @if ($details->accept_alternative)
                                                                    <span class="badge bg-success text-light">
                                                                        نعم
                                                                    @else
                                                                    <span class="badge bg-danger text-light">
                                                                        لا
                                                                    @endif
                                                                </span></td>
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