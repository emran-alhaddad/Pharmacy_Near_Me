@extends('layouts.masterUser')

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
                                                            href="{{ route('client-compliants-delete', $compliant->id) }}"
                                                            role="button">
                                                            حــذف
                                                        </a>
                                                    </div>

                                  <!--  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>-->
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <p id="replay_massage">


                                                    <div class="col">
                                                        @if ($compliant->replay)
                                                            <button type="button" class="btn btn-submit btn-hover me-2 "
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                                                onclick="$('#replay_massage').text('{{ $compliant->replay }}');">


                                                                عرض الرد
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>




                                        </tr>
                                    @endif
                                @endforeach
                                <td colspan="5">
                                    <div class="d-flex justify-content-center">

                            </tbody>


                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> عرض الرد</h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <p id="replay_massage">


                                                </p>
                                            </div>




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
