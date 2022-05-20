@extends('layouts.masterFront')

@section('content')
    {{-- action={{route('_admin-create-customer')}} --}}

    <style>
        .card {
            margin-top: 12em;
            position: relative;
            right: 50%;
            left: 30%;
            padding: 1.5em 0.5em 0.5em;
            border-radius: 2em;
            text-align: end;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);


        }

        @media (max-width: 991px) {
            .card {
                position: relative;
                right: 1rem;
                left: 1rem;
                padding: .5em 0 0;


            }
        }

        .card img {
            width: 50%;
            height: 60%;
            border-radius: 50%;
            margin: .5rem auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card .card-title {
            font-weight: 700;
            font-size: 1.5em;
        }

        .card .btn {
            border-radius: var(--radius);
            background-color: var(--main-color);
            color: #ffffff;
            padding: 0.5em 1.5em;
        }

        .card .btn:hover {
            background-color: var(--main-color);
            color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .banner-area {
            height: 50%;
        }

    </style>

    <div>
        <div class="card" style="width: 40rem; max-width: 100%;">

            <div class="card-body">
                <h5 class="card-title">موقع علاجي </h5>
                <p class="card-text">
                    نرحب بانضمامك لموقعنا، من فضلك قم بتعبئة البيانات التالية لإكمال عملية التسجيل في الموقع..
                </p>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible text-center mt-2 fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @elseif(session('state'))
                    <div class="alert alert-success alert-dismissible text-center mt-2 fade show" role="alert">
                        {{ session()->get('state') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif

            </div>

            <form action={{ route('store-request-license', $id) }} method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 m-auto  col-10">
                    <label for="exampleInputName" class="form-label">صورة الرخصة</label>
                    <input type="file" name="license" class="form-control " id="exampleInputName">
                </div>

                <div class="mb-3  m-auto col-10">
                    <label for="exampleInputLink" class="form-label"> المدينة</label>
                    <select name="city" class="form-select" aria-label="Default select example">
                        @foreach ($cities as $city)
                            <option value={{ $city->id }}> {{ $city->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 m-auto col-10">
                    <label for="exampleInputLink" class="form-label"> الحي السكني</label>
                    <select name="zone" class="form-select" aria-label="Default select example">
                        @foreach ($zones as $zone)
                            <option value={{ $zone->id }}> {{ $zone->name }} </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" href="#" class="btn m-auto">تقديم طلب</button>
        </div>

        </form>

    </div>
    </div>


@stop
