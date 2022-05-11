<!--====== SEARCH PART START ======-->
<div class="search-area" style="direction: rtl;">
    <div class="container">
        <div class="search-wrapper shadow">
            <form action="{{ route('search-pharmacies') }}" method="POST">
                @csrf
                <div class="row justify-content-center ">


                    <div class="col-lg-2 col-sm-5 col-10">
                        <div class="search-input">
                            <label for="location"><i class="lni lni-map-marker theme-color dir"></i></label>
                            <select name="city" id="location">
                                <option value="none" selected disabled> المدينة </option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-5 col-10">
                        <div class="search-input">
                            <label for="category"><i class="lni lni-map theme-color"></i></label>
                            <select name="zone" id="category">
                                <option value="none" selected disabled> الحي </option>
                                @foreach ($zones as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-7 col-10">
                        <div class="search-input">
                            <label for="keyword"><i class="lni lni-search-alt theme-color "></i></label>
                            <input type="text" name="name_Pharmacy" id="keyword" placeholder="اسم الصيدليه">
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-10">
                        <div class="search-btn">
                            <button type="submit" class="main-btn btn-hover">بحث <i
                                    class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-md mt-3">
@if (session('error'))
    <div class="alert alert-danger" style="direction: rtl;" role="alert">
        {{ session('error') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success" style="direction: rtl;" role="alert">
        {{ session('status') }}
    </div>
@endif
</div>
<!--====== SEARCH PART END ======-->
