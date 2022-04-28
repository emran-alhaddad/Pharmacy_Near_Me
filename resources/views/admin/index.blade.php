@extends('layouts.masterAdmin')
@section('admin_pages')


 <div class="wrapper bg-white">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-3">
         <div class="card bg-white m-5">
            <!-- <div class="card-header">
                <h3>الصيدلية</h3>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
                <table class="table no-margin ">
                    <thead class="success">
                        <tr>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>المربع</th>
                            <th>المنطقة</th>
                            <th>الايميل</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fas fa-user text-primary"></i> ابولو</td>
                            <td>
                                <div class="d-flex">
                                    <span class="pr-2 d-flex align-items-center"> الضربة</span>
                                </div>
                            </td>
                            <td>المسبح</td>
                            <td>القاهرة</td>
                            <td>Apollo@yahoo.com</td>
                            <td>
                                <button class="btn btn-success text-white" >مفعل</button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div> -->

            <html>
<link
	rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"	type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

<style>
	.container {
	width: 70%;
	margin: 15px auto;
	}
	body {
	text-align: center;
	color: green;
	}
	h2 {
	text-align: center;
	font-family: "Verdana", sans-serif;
	font-size: 30px;
	}
</style>
<body>
	<div class="container">
	<h2>Line Chart</h2>
	<div>
		<canvas id="myChart"></canvas>
	</div>
	</div>
</body>

<script>
	var ctx = document.getElementById("myChart").getContext("2d");
	var myChart = new Chart(ctx, {
	type: "line",
	data: {
		labels: [
		"Monday",
		"Tuesday",
		"Wednesday",
		"Thursday",
		"Friday",
		"Saturday",
		"Sunday",
		],
		datasets: [
		{
			label: "work load",
			data: [2, 9, 3, 17, 6, 3, 7],
			// backgroundColor: "rgba(153,205,1,0.6)",
            backgroundColor: "#543ab7",
		},
		{
			label: "free hours",
			data: [2, 2, 5, 5, 2, 1, 10],
			// backgroundColor: "rgba(155,153,10,0.6)",

            backgroundColor: "#817ecd",
		},
		],
	},
	});
</script>
</html>

        </div>

            <div class="card bg-white m-5">
                <!-- <div class="card-header">
                    <h2>المستخدمين</h2>
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="card-content">
                    <table class="table no-margin ">
                        <thead class="success">
                            <tr>
                                <th>الاسم</th>
                                <th>العنوان</th>
                                <th>الايميل</th>
                                <th>الجوال</th>
                                <th>طرق الدفع</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-user "></i> حنين</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="pr-2 d-flex align-items-center">المسبح </span>
                                    </div>
                                </td>
                                <td>haneen@yahoo.com</td>
                                <td>73333333333</td>
                                <td>فيزا</td>
                                <td>
                                    <button class="btn btn-success text-white" >مفعل</button>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> -->
        </div>




@endsection
