@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 col-m-8 col-sm-8">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <h3>تعديل اعلان</h3>
            </div>
            <div class="card-content">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
              @endforeach
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <div class="row g-3">
                <div class="col-8">

    <form method="POST" action={{route('admin-ads_update',['id'=>$ads->id])}}>
                <div class="mb-3">

                <label for="exampleInputName" class="form-label">وصف الاعلان</label>
                <input type="text" class="form-control" value="{{$ads->descripe}}" id="exampleInputName" name="descripe">
                </div>
            <div class="mb-3">
                <label for="exampleInputLink" class="form-label">رابط الموقع</label>
                <input type="text" class="form-control" value="{{$ads->url}}" id="exampleInputName" name="url">
            </div>

            <div class="row g-3">
                <div class="mb-3 col-6">
                    <label for="exampleInputDate" class="form-label">تاريخ بداية الاعلان</label>
                    <input type="date" class="form-control" name="startAt" value="{{$ads->startAt}}" id="exampleInputName">
                </div>

                <div class="mb-3 col-6">
                    <label for="exampleInputLink" class="form-label">تاريخ نهاية الاعلان</label>
                    <input type="date" class="form-control" name="endAt" value="{{$ads->endAt}}" id="exampleInputName">
                </div>
            </div>


            <div class="mb-3 ">
                <label for="exampleInputLink" class="form-label"> مكان الاعلان</label>
                    <select class="form-select" aria-label="Default select example" name="position">
                        @if ($ads->position==1)
                        <option selected value="1">يمين</option>
                        @elseif ($ads->position==2)
                        <option selected value="2">فوق</option>
                        @elseif ($ads->position==3)
                        <option selected value="3">تحت</option>
                        @else
                        <option selected> يسار </option>
                       @endif 
                       
                        
                      
                    </select>
            </div>




                </div>

                <div class="col-4">

                    <div class="mb-3">
                    <label for="formFile" class="form-label">صورة الاعلان</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    </div>

                </div>
        </div>

        <button  id="edit_button"  type="submit" class="btn btn-primary">تعديل</button>
    </form>
            </div>
        </div>
</div>



@stop
