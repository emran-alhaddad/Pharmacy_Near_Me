<div class="tab-pane fade show active shadow" id="wait-acceptance" role="tabpanel">
    <div class="card">
        <h5 class="card-header"> الطلبات</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>اسم العميل</th>
                        <th>تاريخ الطلبية </th>
                        <th>حالة الطلبية </th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        @if ($request->state == \App\Utils\RequestState::WAIT_ACCEPTANCE)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $loop->iteration }}</strong>
                                </td>
                                <td>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                        data-bs-placement="top" class="avatar pull-up"
                                        title="الروشتة " style="list-style-type: none;">
                                        <img src="{{ asset('uploads/avaters/client/' . $request->client->user->avater) }}"
                                            alt="Avatar" class="rounded-circle">
                                        <strong>{{ $request->client->user->name }}</strong>
                                    </li>

                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $request->created_at->diffForHumans() }}</strong>
                                </td>
                                <td><span class="badge bg-label-secondary me-1">في
                                        انتظارالقبول</span></td>

                                <td> <a class="demo-inline-spacing"
                                        href="{{ route('pharmacy-order-details', $request->id) }}"
                                        role="button"> تفاصيل الطلبية</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>