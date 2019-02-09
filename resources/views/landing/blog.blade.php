@extends('layouts.landing')

@section('title') Communication Centre @stop

@section('home') @stop
@section('news') @stop
@section('about') dropdown active @stop
@section('account') dropdown @stop

@section('body')
<!-- ::::::::::::::::::::: Page title:::::::::::::::::::::::::: -->
		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- breadcrumb content -->
						<div class="page-breadcrumbd">
							<h2>Press &amp; News</h2>
							<p><a href="/">Home</a> / Blog</p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
		</section><!-- end breadcrumb -->
	
	
	
		<!-- ::::::::::::::::::::: Blog Section:::::::::::::::::::::::::: -->
		<section class="blog section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
						<!-- blog title -->
						<div class="template-title text-center">
							<h2>News Blog</h2>
							<p>Catch up on all our news from our various platform via our news centre.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					@foreach($news as $blog)
					<!-- single blog item -->
					<div class="col-sm-6 col-md-4">
						<div class="blog-item">
							<!-- blog thumbnail -->
							<div class="blog-thumb">
								<img src="{{ $blog->thumb }}" alt="{{ $blog->title }}" />
							</div>
							<div class="blog-content">
								<!-- blog title -->
								<header class="blog-header">
									<div class="tag">
										<ul>
											<li><a href="#">Comms. Unit</a></li>
										</ul>
									</div>
									<div class="blog-title">
										<h2 class="entry-title"><a href="blog-details?post={{ $blog->id }}">{{ ucwords($blog->title) }}</a></h2>
									</div>
								</header>
								
								<!-- blog content -->
								<div class="entry-content">
									<p>{!! substr($blog->posts,0,50) !!}.....</p>
									<a href="blog-details?post={{ $blog->id }}">Read More</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<br><center>{{ $news->onEachSide(5)->links() }}</center>
				</div>
			</div>
		</section><!-- end blog section -->
@stop