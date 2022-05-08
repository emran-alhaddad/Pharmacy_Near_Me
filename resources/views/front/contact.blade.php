
@extends('layouts.masterFront')

    @section('content')


	<!--====== HERO PART START ======-->
	<section class="banner-area bg_cover" style="direction: rtl;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="banner-content">
						<h1 class="text-white">يمكنك التواصل معنا عبر المعلومات الوارادة في هذه الصفحة </h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('index') }}"> الرئيسية</a></li>
								<li class="breadcrumb-item active" aria-current="page">  تواصل معنا   </li>
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
                        <div class="single-head">
                            <div class="contant-inner-title ">
                                <h4 class="text-white">معلومات التواصل </h4>
                                <p class="text-white">يمكنك التواصل معنا في أي وقت </p>
                            </div>
                            <div class="single-info">

                                <ul>
                                    <li class="text-white"><i class="lni lni-phone pl-2"></i> +697 777 777 777</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <ul>
                                    <li class="text-white"><a href="mailto:pharmacy.neer.me@gmail.com" class="text-white"> <i class="lni lni-envelope pl-2"></i> pharmacy.neer.me@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="single-info">

                                <ul>
                                    <li class="text-white"><i class="lni lni-map pl-2"></i>  موقع وسيط ع الانترنت </li>
                                </ul>
                            </div>
                            <div class="contact-social">
                                <h5>تابعنا على</h5>
                                <ul>
                                    <li class="p-1">
                                        <a href="#" class="text-white ">
                                            <span class="icon-1"><i class="lni lni-facebook-filled pl-1"></i></span>
                                            <span>pharmacy.neer.me@facebook.com </span>
                                        </a>
                                    </li>
                                    <li class="p-1">
										<a href="#" class="text-white">
                                            <span class="icon-1"><i class="lni lni-twitter-original pl-1"></i></span>
                                            <span> pharmacy.neer.me@twitter.com </span>
                                        </a>
                                    </li>
                                    <li class="p-1">
										<a href="#" class="text-white">
                                            <span class="icon-1"><i class="lni lni-linkedin-original"></i></span>
                                            <span> pharmacy.neer.me@linkedin.com </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-12 radius p-5 ">
                        <div class="form-main">
                            <form class="form" method="post" action="assets/mail/mail.php">
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
                                            <input name="email"class="radius border" type="email" placeholder="example@gmail.com "
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
                                        <div class="form-group ">
                                            <button type="submit" class="main-btn col-12 ">ارسال الرسالة </button>
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
