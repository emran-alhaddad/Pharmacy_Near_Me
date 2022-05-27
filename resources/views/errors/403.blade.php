@extends('layouts.masterFront')

    @section('content')

    <!--====== 404 PRODUCT PART START ======-->
	<section class="page-404-wrapper pt-5" style="direction: rtl;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 p-5">
					<div class="text-center content-404 p-5">
						<div class="image  p-5">
							<img src="{{ asset('Front/assets/images/404/403-img.svg') }}" alt="">
						</div>
						<h1>ليس لديك صلاحيات</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== 404 PRODUCT PART ENDS ======-->

    @stop
