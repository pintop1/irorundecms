@extends('layouts.landing')

@section('title') About Us @stop

@section('home') @stop
@section('news') @stop
@section('about') dropdown active @stop
@section('account') dropdown @stop

@section('body')
<!-- ::::::::::::::::::::: Page Title Section:::::::::::::::::::::::::: -->
		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- breadcrumb content -->
						<div class="page-breadcrumbd">
							<h2>About Us</h2>
							<p><a href="/">Home</a> / About</p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
		</section><!-- end breadcrumb -->
	
		<!-- ::::::::::::::::::::: Block Section:::::::::::::::::::::::::: -->
		<section class="block about-us-block section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<!-- block text -->
						<div class="block-text">
							<h2>A Finance Agency Crafting Beautiful & Engaging Online Experiences</h2>
							<p>Seamlessly communicate distinctive alignments and business models. Efficiently whiteboard robust meta-services whereas stand-alone synergy. Enthusiastically engage premier supply chains after intuitive testing procedures. Conveniently parallel task robust imperatives through corporate customer service.</p> 
							
							<p>Dynamically productivate tactical mindshare via business collaboration and idea-sharing. Credibly conceptualize extensive schemas for functionalized metrics. </p>
						</div>
					</div>
					<div class="col-md-6">
						<!-- block image -->
						<div class="block-img">
							<img src="assets/img/about-us-block.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
		</section><!-- block area end -->
		
		<!-- ::::::::::::::::::::: Intro Section:::::::::::::::::::::::::: -->
		<section class="section-padding darker-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
						<div class="intro-title text-center">
							<h2>Welcome to the Irorunde CMES</h2>
							<div class="hidden-xs">
								<p>Interactively simplify 24/7 markets through 24/7 best practices. Authoritatively foster cutting-edge manufactured products and distinctive.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single intro -->
					<div class="col-md-4">
						<div class="single-intro">
							<div class="intro-img intro-bg1"></div>
							<div class="intro-details text-center">
								<h3>Savings Package</h3>
								<p>Our savings package is designed to receive monthly, weekly, daily savings from members who have decided to save for the raining days, the savings package is a prerequisite for loan request.</p>
							</div>
						</div>
					</div>
					<!-- single intro -->
					<div class="col-md-4">
						<div class="single-intro">
							<div class="intro-img intro-bg2"></div>
							<div class="intro-details text-center">
								<h3>Deposit Package</h3>
								<p>People do say we operate like a bank; our answer to them is "we operate better than banks". We have two types of deposit; fixed and flexible deposit.</p>
							</div>
						</div>
					</div>
					<!-- single intro -->
					<div class="col-md-4">
						<div class="single-intro">
							<div class="intro-img intro-bg3"></div>
							<div class="intro-details text-center">
								<h3>Thrift Package</h3>
								<p>Thrift package is one of the empowerment package we have at IMCS. It is in form of rotational contribution. The thrift package is of two types; the exclusive and ordinary.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- intro area end -->
	
		<!-- ::::::::::::::::::::: Accordian Section:::::::::::::::::::::::::: -->
		<section class="accordian-section section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="accorian-item">

							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<!-- accordian item-1 -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Vision
										</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											The vision of Irorunde Multipurpose Cooperative and Empowerment Society (IMCES) is to be a friendly financial institution where our members can earn inestimable financial gains.
										</div>
									</div>
								</div>
								
								<!-- accordian item-2 -->
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Mission Statement
										</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											Constantly providing convenient credit facilities for our members and to empower them and their children through financial literacy empowerment schemes for the purpose of reaching financial independence.
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- accordian right text block -->
						<div class="accordian-right-content">
							<h2>Future Plans</h2>
							<p>To register IMCES with Ogun State Ministry of Cooperative and Social Development.</p>
							<p>To have an Event Centre among others for constant stream of all incomes.</p>
							<p>To give birth to IrorunDe Microfinance Bank</p>
						</div>
					</div>
				</div>
			</div>
		</section><!-- end accordian section -->
	
		<!-- :::::::::::::::::::::  Client Section:::::::::::::::::::::::::: -->
		<section class="client-logo darker-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="all-client-logo">
							<a href="#"><img src="assets/img/cling-logo/1.jpg" alt="" /></a>
							<a href="#"><img src="assets/img/cling-logo/2.jpg" alt="" /></a>
							<a href="#"><img src="assets/img/cling-logo/3.jpg" alt="" /></a>
							<a href="#"><img src="assets/img/cling-logo/4.jpg" alt="" /></a>
							<a href="#"><img src="assets/img/cling-logo/5.jpg" alt="" /></a>
						</div>
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- end client section -->
@stop