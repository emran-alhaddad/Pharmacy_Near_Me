<section class="search">
    <div>
        <h2 class="heading">جد  <span>صيدليتك </span></h2>
        <p>يمكنك إدخال اسم الصيدلية للبحث عنها أو اختيار المديرة والمربع السكني  للبحث ضمن منطقة محددة </p>
    </div>
    <form action="{{ route('search-pharmacies') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name_Pharmacy" placeholder="ادخل إسم الصيدلية " class="box">

        <select name='city' class="input-field box">
            <option selected disabled> المديرية </option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach

        </select>

        <select id="inputAriae" multiple name='zone[]' class="input-field">
            <option selected disabled> المنطقة </option>
            @foreach ($zones as $zone)
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endforeach

        </select>

        <button type="submit" class="s-btn box">بحث</button>
    </form>

</section>
