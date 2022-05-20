
@extends('layouts.masterFront')

    @section('content')


	<!--====== HERO PART START ======-->
	<section class="banner-area bg_cover shadow" style="direction: rtl;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="banner-content">
						<h3 class="text-white py-3">يمكنك التواصل معنا عبر المعلومات الوارادة في هذه الصفحة </h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item py-1 text-white"><a href="{{ route('index') }}"> الرئيسية</a></li>
								<li class="breadcrumb-item active p-1" aria-current="page">  تواصل معنا   </li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== HERO PART END ======-->

 	<!--====== SEARCH PART START ======-->
        @include('includes.FrontSearch')
	<!--====== SEARCH PART END ======-->

  <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section pt-5 radius" style="direction: rtl;">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row p-2 m-1 shadow radius">

                    <div class="col-lg-5 col-12 radius p-5  " style="background-color: var(--main-color);">
                        <div class="single-head p-3">
                            <div class="contant-inner-title ">
                                <h4 class="text-white py-3">معلومات التواصل </h4>
                                <p class="text-white py-2">يمكنك التواصل معنا في أي وقت </p>
                            </div>
                            <div class="single-info py-2">

                            @foreach($infoSite as $infoSites)

                                <ul>
                                    <li class="text-white py-2"><i class="lni lni-phone pl-2"></i>{{$infoSites->phone}}</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <ul>
                                    <li class="text-white pb-2"><a href="mailto:{{$infoSites->email}}" class="text-white"> <i class="lni lni-envelope pl-2"></i> {{$infoSites->email}}</a></li>
                                </ul>
                            </div>
                            <div class="single-info">

                                <ul>
                                    <li class="text-white py-2"><i class="lni lni-map pl-2 "></i>  {{$infoSites->website}} </li>
                                </ul>
                            </div>
                            <div class="contact-social">
                                <h5>تابعنا على</h5>
                                <ul style="direction: ltr;" class="px-2">
                                    <li class="p-1">
                                        <a href="#" class="text-white ">
                                            <span class="icon-1"><i class="lni lni-facebook-filled pr-1"></i></span>
                                            <span>{{$infoSites->facebook}} </span>
                                        </a>
                                    </li>
                                    <li class="p-1">
										<a href="#" class="text-white">
                                            <span class="icon-1"><i class="lni lni-twitter-original pr-1"></i></span>
                                            <span> {{$infoSites->twitter}} </span>
                                        </a>
                                    </li>
                                    <li class="p-1">
										<a href="#" class="text-white">
                                            <span class="icon-1"><i class="lni lni-whatsapp pr-1"></i></span>
                                            <span> {{$infoSites->whatsup}} </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <div class="col-lg-7 col-12 radius p-5 ">
                        <div class="form-main mt-10">
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {!! session('error') !!}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {!! session('status') !!}
                                </div>
                            @endif
                            <form class="form" method="post" action="">
                                <div class="row">
                                    <div class="col-lg-6 col-6 py-2">
                                        <div class="form-group">
                                            <input name="name" class="radius border" type="text" placeholder="الاسم الكامل  " required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6 py-2">
                                        <div class="form-group">
                                            <input name="subject" class="radius border" type="text" placeholder="الموضوع"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6 py-2">
                                        <div class="form-group">
                                            <input name="email"class="radius border" type="email" placeholder="thng@example.com "
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6 py-2">
                                        <div class="form-group">
                                            <input name="phone"class="radius border" type="text" placeholder="رقم الهاتف "
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-12 p-1 py-2 radius">
                                        <div class="form-group message">
                                            <textarea name="message" class="radius border" placeholder="الرسالة"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 p-1 mt-1 radius">
                                        <div class="form-group py-2 my-2">
                                            <button type="submit" class="main-btn col-12 btn-hover">ارسال الرسالة </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->




    @stop
