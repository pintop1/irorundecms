@extends('layouts.landing')

@section('title') Frequently Asked Questions @stop

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
							<h2>FAQs</h2>
							<p><a href="/">Home</a> / FAQs</p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
		</section><!-- end breadcrumb -->
	
		<!-- ::::::::::::::::::::: Accordian Section:::::::::::::::::::::::::: -->
		<section class="accordian-section section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
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