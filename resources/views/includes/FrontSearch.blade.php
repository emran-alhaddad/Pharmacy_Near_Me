<section>
    <div>
        <h2 class="heading">Find <span>pharmacy</span></h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias, totam.</p>
    </div>
    <form action="{{ route('search-pharmacies') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name_Pharmacy" placeholder="Enter Pharmacy Name">

        <select name='city' class="input-field">
            <option selected disabled>All </option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach

        </select>

        <select id="inputAriae" name='zone' class="input-field">
            <option selected disabled>All </option>
            @foreach ($zones as $zone)
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endforeach

        </select>

        <button type="submit" class="s-btn">Find</button>
    </form>

</section>
