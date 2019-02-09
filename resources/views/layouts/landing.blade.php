<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Neuron Finance is a finance, corporate and business HTML template">
        <meta name="keywords" content="advisor, corporate accountant, finance, financial, insurance, investment, consultation">
        <meta name="author" content="trendytheme.net">

		<title>Irorunde || @yield('title')</title>
        <!--  favicon -->
        <link rel="shortcut icon" href="assets/img/ico/favicon.png">
        <!--  apple-touch-icon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/img/ico/apple-touch-icon-57-precomposed.png">

		<!-- animate CSS -->
		<link rel="stylesheet" href="assets/css/animate.min.css" media="all" />
		<!-- FontAwesome CSS -->
		<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css" media="all" />
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" media="all" />
		<!-- Bootsnav Menu -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" media="all" />
		<!-- Bootstrap -->
		<link rel="stylesheet"  href="assets/bootstrap/css/bootstrap.min.css" media="all" />
		<!-- Style CSS -->
		<link rel="stylesheet" type="text/css" href="style.css" media="all" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>


	<body>
		<!-- ::::::::::::::::::::: Header Section:::::::::::::::::::::::::: -->
		<header>
			<!-- start top bar -->
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 hidden-xs">
							<div class="contact">
								<p>
									<i class="fa fa-phone"></i>
									+234 810 179 5145
								</p>
								<p>
									<i class="fa fa-envelope"></i>
									<a href="#">irorun.m.coop.soc@gmail.com</a>
								</p>
							</div><!-- /.contact -->
						</div><!-- /.col-sm-8 -->
						
						<div class="col-sm-4">
							<div class="social-icon">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-linkedin"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
									<li><a href=""><i class="fa fa-tumblr"></i></a></li>
								</ul>
							</div><!-- /.social-icon -->
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- end top bar -->
			
	        <!-- Start Navigation -->
	        <nav class="navbar navbar-default navbar-sticky bootsnav">

	            <div class="container">
	                <!-- Start Header Navigation -->
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
	                        <i class="fa fa-bars"></i>
	                    </button>
	                    <a class="navbar-brand" href="/"><img src="assets/img/logo.png" class="logo logo-scrolled" alt=""></a>
	                </div>
	                <!-- End Header Navigation -->

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="collapse navbar-collapse" id="navbar-menu">
	                    <ul class="nav navbar-nav navbar-right" data-in="" data-out="">
	                        <li class="@yield('home')"><a href="/">Home</a></li>
	                        <li class="@yield('news')"><a href="/blog">News</a></li>
	                        <li class="@yield('about')">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >About Us</a>
	                            <ul class="dropdown-menu">
	                                <li><a href="/about">About</a></li>
	                                <li><a href="/services">Services</a></li>
	                                <!--<li><a href="/works">Works</a></li>-->
	                                <li><a href="/contact">Contact</a></li>
	                        		<li><a href="/faqs">FAQs</a></li>
	                            </ul>
	                        </li>
	                        @if($user == '')
	                        <li  class="@yield('account')">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i>  Account</a>
	                            <ul class="dropdown-menu">
	                                <li><a href="/login">Login</a></li>
	                                <li><a href="/register">Register</a></li>
	                            </ul>
	                        </li>
	                        @elseif($user == 'member')
	                        <li  class="@yield('account') bg-success text-white">
	                            <a href="/member"><i class="fa fa-laptop"></i>  Dashboard</a>
	                        </li>
	                        @elseif($user == 'admin')
	                        <li  class="@yield('account') bg-success text-white">
	                            <a href="/admin"><i class="fa fa-laptop"></i>  Dashboard</a>
	                        </li>
	                        @endif
	                    </ul>
	                </div><!-- /.navbar-collapse -->
	            </div>
	        </nav>
	        <!-- End Navigation -->
	        <div class="clearfix"></div>
		</header> <!-- end header -->
	

		@yield('body')
		
	
		<!-- ::::::::::::::::::::: Footer Section:::::::::::::::::::::::::: -->
		<footer>
			<div class="primary-footer">
				<div class="container">
					<div class="row">
						<!-- start single footer widget -->
						<div class="col-sm-6 col-md-4">
							<div class="footer-widget about-us">
								<a href="index.html"><img src="assets/img/logo-white.png" alt="" /></a>
								<p>Collaboratively create resource sucking manufactured products and worldwide e-services. Seamlessly revol tionize holistic data rather than intermandated results. Energistically innovate open-source systems for performance based total.</p>
								<div class="online-card">
									<a href="#"><img src="assets/img/online-card/1.png" alt="" /></a>
									<a href="#"><img src="assets/img/online-card/2.png" alt="" /></a>
									<a href="#"><img src="assets/img/online-card/3.png" alt="" /></a>
									<a href="#"><img src="assets/img/online-card/4.png" alt="" /></a>
								</div>
							</div>
						</div><!-- end single footer widget -->
						
						<!-- start single footer widget -->
						<div class="col-sm-6 col-md-2">
							<div class="footer-widget usefull-link">
								<h3>Useful Links</h3>
								<ul> 
									<li><a href="/about"><i class="fa fa-angle-right"></i>About Us</a></li>
									<li><a href="/services"><i class="fa fa-angle-right"></i>Services</a></li>
									<li><a href="/works"><i class="fa fa-angle-right"></i>Works</a></li>
									<li><a href="/contact"><i class="fa fa-angle-right"></i>Contact</a></li>
									<!--<li><a href="/"><i class="fa fa-angle-right"></i>Support</a></li>-->
									<li><a href="/privacy-policy"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
									<li><a href="/blog"><i class="fa fa-angle-right"></i>News</a></li>
								</ul>
							</div>
						</div><!-- end single footer widget -->
						
						<!-- start single footer widget -->
						<div class="col-sm-6 col-md-3">
							<div class="footer-widget latest-post">
								<h3>Latest News</h3>
								<ul>
									@foreach($posts as $post)
									<li>
										<img src="{{ $post->thumb }}" alt="{{ $post->title }}" />
										<p><a href="blog-details?post={{ $post->id }}">{{ ucwords($post->title) }}</a></p>
										<span>{{ date("F d Y",strtotime($post->created_at)) }}</span>
									</li>
									@endforeach
								</ul>
							</div>
						</div><!-- end single footer widget -->
						
						<!-- start single footer widget -->
						<div class="col-sm-6 col-md-3">
							<div class="footer-widget news-letter">
								<h3>NewsLetter Subscription</h3>
								<p>Subscribe to get the latest news, update and offer information. Don't worry, we won't send spam!</p>

								<form class="subscribe-form mailchimp" method="post">
                                    <div class="clearfix">
                                        <div class="input-wrapper">
                                          <label class="sr-only" for="email">Email</label>
                                          <input id="subscribeEmail" type="email" name="subscribeEmail" class="validate form-control" placeholder="Your Email Please!">
                                          <button type="submit"><i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- to showing success messages -->
                                    <p class="subscription-success"></p>
								</form>
							</div><!-- /.news-letter -->
						</div><!-- end single footer widget -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.primary-footer -->

			<!-- footer copyright area -->
			<div class="copyright-wrapper text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p>Copyright@2017 Irorunde IMCES LTD. All Rights Reserved.</p>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- ./end copyright-wrapper -->
		</footer>

		<!-- preloader -->
		<div id="loading">
			<div id="loading-center">
				<div id="loading-center-absolute">
					<div class="object" id="object_four"></div>
					<div class="object" id="object_three"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_one"></div>
				</div>
			</div>
		</div>

		<!-- main jQuery -->
		<script src="assets/js/jquery-2.1.3.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/bootsnav.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
        <script src="assets/js/ajaxchimp.js"></script>
        <script src="assets/js/ajaxchimp-config.js"></script> 
		<script src="assets/js/script.js"></script>
	</body>
</html>