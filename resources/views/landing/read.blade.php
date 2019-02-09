@extends('layouts.landing')

@section('title') {{ ucwords($news->title) }} @stop

@section('home') @stop
@section('news') active @stop
@section('about') dropdown @stop
@section('account') dropdown @stop

@section('body')
<!-- ::::::::::::::::::::: start breadcrumb:::::::::::::::::::::::::: -->
		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- breadcrumb content -->
						<div class="page-breadcrumbd">
							<h2>News &amp; Press</h2>
							<p><a href="/">Home</a> / <a href="/blog">Blog</a> / {{ ucwords($news->title) }}</p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
		</section><!-- end breadcrumb -->

		<!-- ::::::::::::::::::::: single-blog section:::::::::::::::::::::::::: -->
		<section class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- post wrapper -->
						<div class="post-wrapper clearfix">
							<!-- post thumbnail -->
							<div class="single-thumb">
								<a href="">
									<img src="{{ $news->thumb }}" alt="{{ $news->title }}" />
								</a>
							</div>
							
							<!-- start single blog content -->
							<div class="blog-content">
								<!-- start single blog header -->
								<header class="single-header">
									<div class="single-post-title">
										<h2><a href="#">{{ ucwords($news->title) }}</a></h2>
									</div>
									<!-- post meta -->
									<div class="post-meta">
										<ul>
											<li>
												<a href="#">
													<i class="fa fa-user"></i>
													Comms. Unit
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fa fa-calendar"></i>
													 {{ date("F d Y",strtotime($news->created_at)) }} 
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fa fa-comment"></i>
													{{ $news->counts }}
												</a>
											</li>
										</ul>
									</div>
								</header><!-- /.end single blog header -->
								
								<!-- start single blog entry content -->
								<div class="entry-content">
									<p>{!! $news->posts !!}</p>
								</div><!-- /.end single blog entry content -->
								
								<!-- start social link -->
								<div class="social-link">
									<ul>
										<li><a class="facebook" href="#">
											<i class="fa fa-facebook"></i>
											<span>1.6k</span>
										</a></li>
										<li><a class="twitter" href="#">
											<i class="fa fa-twitter"></i>
											<span>1.6k</span>
										</a></li>
										<li><a class="google" href="#">
											<i class="fa fa-google-plus"></i>
											<span>1.6k</span>
										</a></li>
										<li><a class="linkedin" href="#">
											<i class="fa fa-linkedin"></i>
											<span>1.6k</span>
										</a></li>
										<li><a class="pinterest" href="#">
											<i class="fa fa-pinterest-p"></i>
											<span>400</span>
										</a></li>
										<li><a class="reddit" href="#">
											<i class="fa fa-reddit-alien"></i>
											<span>400</span>
										</a></li>
										<li><a class="message" href="#">
											<i class="fa fa-envelope"></i>
											<span>400</span>
										</a></li>
									</ul>
								</div><!-- /.end social link -->
								
								
								
							</div><!-- /.end single blog content -->
							
							<!-- start comments wrapper -->
							<div class="comments-wrapper">
								<div class="single-post-title comment-title">
									<h2>write your comment</h2>
								</div>


								<form class="contact-form" id="contactForm" name="contact-form" action="sendemail.php" method="POST">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="sr-only" for="name">Name</label>
			                    				<input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="sr-only" for="email">Email</label>
					                          	<input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="sr-only" for="subject">Subject</label>
					                          	<input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="sr-only" for="message">Message</label>
				                        <textarea name="message" class="form-control" id="message" placeholder="Your Message"></textarea>
									</div>
									<div class="text-right">
										<button type="submit" name="submit" class="btn btn-primary input-btn"><span>Submit</span></button>
									</div>
								</form>


							</div><!-- /.end comments wrapper -->
							
							<div class="comments-responsed-wrapper">
								<div class="single-post-title comment-title">
									<h2>Commets (5)</h2>
								</div>
								<!-- post comments -->
								<div class="comments-media">
									<!-- 1st comment -->
									<ol>
										<li>
											<div class="comment-inner">
												<div class="comment-avatar">
													<img src="assets/img/comments/1.jpg" alt="" />
												</div>
												<div class="comment-section">
													<header>
														<h2>Josef Milton</h2>
														<span> 15 minutes ago </span>
													</header>
													<div class="comment-content">
														<p>The challenge is to ensure that when a client visits your website they feel positive about your company. </p>
														<a href="#" class="btn-comment-replay">Replay</a>
													</div>
												</div>
											</div>
											
											<ul>
												<li>
													<div class="comment-inner">
														<div class="comment-avatar">
															<img src="assets/img/comments/2.jpg" alt="" />
														</div>
														<div class="comment-section">
															<header>
																<h2>Jonathon Bin</h2>
																<span> 10 minutes ago </span>
															</header>
															<div class="comment-content">
																<p>The challenge is to ensure that when a client visits your website they feel positive about your company. </p>
																<a href="#" class="btn-comment-replay">Replay</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="comment-inner">
														<div class="comment-avatar">
															<img src="assets/img/comments/1.jpg" alt="" />
														</div>
														<div class="comment-section">
															<header>
																<h2>Josef Milton</h2>
																<span> 5 minutes ago </span>
															</header>
															<div class="comment-content">
																<p>The challenge is to ensure that when a client visits your website they feel positive about your company. </p>
																<a href="#" class="btn-comment-replay">Replay</a>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
									</ol>
									<!-- 2nd comment -->
									<ol>
										<li>
											<div class="comment-inner">
												<div class="comment-avatar">
													<img src="assets/img/comments/3.jpg" alt="" />
												</div>
												<div class="comment-section">
													<header>
														<h2>Tomas Udoya</h2>
														<span> 20 minutes ago </span>
													</header>
													<div class="comment-content">
														<p>The challenge is to ensure that when a client visits your website they feel positive about your company. </p>
														<a href="#" class="btn-comment-replay">Replay</a>
													</div>
												</div>
											</div>
											
											<ul>
												<li>
													<div class="comment-inner">
														<div class="comment-avatar">
															<img src="assets/img/comments/2.jpg" alt="" />
														</div>
														<div class="comment-section">
															<header>
																<h2>Josef Milton</h2>
																<span> 15 minutes ago </span>
															</header>
															<div class="comment-content">
																<p>The challenge is to ensure that when a client visits your website they feel positive about your company. </p>
																<a href="#" class="btn-comment-replay">Replay</a>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
									</ol>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- ./end single-blog section -->
@stop