@extends('layouts.landing')

@section('title') Our Services @stop

@section('home') @stop
@section('news') @stop
@section('about') dropdown active @stop
@section('account') dropdown @stop

@section('body')
<!-- ::::::::::::::::::::: Page Title:::::::::::::::::::::::::: -->
		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- breadcrumb content -->
						<div class="page-breadcrumbd">
							<h2>Portfolio Details</h2>
							<p><a href="index.html">Home</a> / <a href="#">Portfolio</a> / Portfolio Details</p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
		</section><!-- end breadcrumb -->
	
	
	<!-- start portfolio single -->
	<section class="single-portfolio-wrapper section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- single portfolio images -->
					<div class="single-portfolio-images">
						<img class="img-responsive" src="assets/img/portfolio-details.jpg" alt="" />
					</div>
				</div>
				<div class="col-md-4">
					<!-- single portfolio info -->
					<div class="single-portfolio-inner">
						<header class="single-portfolio-title">
							<a>ISO Design</a>
							<h2>IOS Game Design prototype</h2>
						</header>
						<div class="portfolio-details-panel">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
							
							<ul class="portfolio-meta">
								<li><span> Client </span> Themeforest</li>
								<li><span> Created by </span> John Doe</li>
								<li><span> Completed on </span> 17 Oct 2016</li>
								<li><span> Skills </span> HTML5 / PHP / CSS3</li>
								<li><span> Share </span> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
						<a class="btn btn-primary" href="#."> Visit website </a>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop