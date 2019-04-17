<?php 
require_once 'action/koneksi.php';
session_start();
?>

<?php require_once 'page/header.php' ?>

<div class="gtco-loader"></div>

<div id="page">

	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">

				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<?php
							if (isset($_SESSION['user'])) {
									$username = $_GET["username"];
								echo "<div id='gtco-logo'><a href='index.php?username=$username'>MyPlane</a></div>";
							}else{
									echo "<div id='gtco-logo'><a href='index.php?'>MyPlane</a></div>";
								}
						?>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<?php
							if (isset($_SESSION['user'])) {
									$username = $_GET["username"];
									echo "<li><a href='index.php?username=$username'>Search Flight</a></li>";
									echo "<li><a href='list_order.php?username=$username'>List Order</a></li>";
									echo "<li><a href='pricing.php?username=$username'>Pricing</a></li>";
									echo "<li class='active'><a href='contact.php?username=$username'>Contact</a></li>";

							}else{
									echo "<li><a href='index.php'>Search Flight</a></li>";
									echo "<li><a href='pricing.php'>Pricing</a></li>";
									echo "<li><a href='contact.php'>Contact</a></li>";
								}
							?>
							<!-- <li><a href="pricing.php">Pricing</a></li>	
							<li><a href="contact.php">About Us</a></li> -->
							<?php
								
								if (isset($_SESSION['user'])) {
									$username = $_GET["username"];
								    echo "<li><a href='logout.php'>Logout</a></li>";
								   	echo "<li>".$username."</li>";
								}else{
									echo "<li class='active'><a href='login.php?pesan=Login'>Log in</a></li>";
								}
							?>
					</div>
				</div>

			</div>
		</nav>
		
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(assets/images/airport_3.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						

						<div class="row row-mt-15em">
							<div class="col-md-5 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1>Lets Flight With Us!</h1>	
							</div>
							<div class="col-md-6 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
												<?php
												// $pesan="";
												$pesan=$_GET["pesan"];
												echo "<h3 c>".$pesan."</h3>";
												$failed = $_GET["failed"];
												echo "<h3 class='failed'>".$failed."</h3>";
												?>
												
												<form action="proses_login.php" method="POST">

													<div class="row form-group">
														<div class="col-md-12">
															<h4>Username</h4>
															<input type="text" class="form-control" name="username">
														</div>
													</div>

													<div class="row form-group">
														<div class="col-md-12">
															<h4>Password</h4>
															<input type="password" class="form-control" name="password">
														</div>
													</div>

													<input type="hidden" name="pesan" value="Login">

													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" class="btn btn-primary btn-block" value="Login">
														</div>
													</div>

													<div class="row form-group">
														<a href="create_user.php?failed=" class="create">Create your Account</a>
													</div>

												</form>	
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</header>

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
						<h2>Most Popular Destination</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row">

					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_1.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_1.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>New York, USA</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_2.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_2.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Seoul, South Korea</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_3.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_3.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Paris, France</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>


					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_4.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_4.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Sydney, Australia</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_5.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_5.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Greece, Europe</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="assets/images/img_6.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="assets/images/img_6.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Spain, Europe</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>

				</div>
			</div>
		</div>

		<div id="gtco-features">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
						<h2>How It Works</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>1</i>
							</span>
							<h3>Lorem ipsum dolor sit amet</h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>2</i>
							</span>
							<h3>Consectetur adipisicing elit</h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>3</i>
							</span>
							<h3>Dignissimos asperiores vitae</h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>


				</div>
			</div>
		</div>


		<div class="gtco-cover gtco-cover-sm" style="background-image: url(assets/images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container text-center">
				<div class="display-t">
					<div class="display-tc">
						<h1>We have high quality services that you will surely love!</h1>
					</div>	
				</div>
			</div>
		</div>

		<div id="gtco-counter" class="gtco-section">
			<div class="gtco-container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
						<h2>Our Success</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>

				<div class="row">

					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Destination</span>

						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Hotels</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Travelers</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Happy Customer</span>

						</div>
					</div>

				</div>
			</div>
		</div>



		<div id="gtco-subscribe">
			<div class="gtco-container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
						<h2>Subscribe</h2>
						<p>Be the first to know about the new templates.</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2">
						<form class="form-inline">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-default btn-block">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<footer id="gtco-footer" role="contentinfo">
			<div class="gtco-container">
				<div class="row row-p	b-md">

					<div class="col-md-4">
						<div class="gtco-widget">
							<h3>About Us</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
						</div>
					</div>

					<div class="col-md-2 col-md-push-1">
						<div class="gtco-widget">
							<h3>Destination</h3>
							<ul class="gtco-footer-links">
								<li><a href="#">Europe</a></li>
								<li><a href="#">Australia</a></li>
								<li><a href="#">Asia</a></li>
								<li><a href="#">Canada</a></li>
								<li><a href="#">Dubai</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-2 col-md-push-1">
						<div class="gtco-widget">
							<h3>Hotels</h3>
							<ul class="gtco-footer-links">
								<li><a href="#">Luxe Hotel</a></li>
								<li><a href="#">Italy 5 Star hotel</a></li>
								<li><a href="#">Dubai Hotel</a></li>
								<li><a href="#">Deluxe Hotel</a></li>
								<li><a href="#">BoraBora Hotel</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-md-push-1">
						<div class="gtco-widget">
							<h3>Get In Touch</h3>
							<ul class="gtco-quick-contact">
								<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
								<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
								<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="row copyright">
					<div class="col-md-12">
						<p class="pull-left">
							<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
							<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
						</p>
						<p class="pull-right">
							<ul class="gtco-social-icons pull-right">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
				</div>

			</div>
			<?php require_once 'page/footer.php' ?>