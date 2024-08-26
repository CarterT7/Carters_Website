<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>Contact</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="assets/css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="assets/js/modernizer.js"></script>
</head>

<body>
	<div id="loader">
	    <div id="status"></div>
	</div>
	<div id="site-header">
  	<header id="header" class="header-block-top fixed-menu">
    	<div class="container">
    		<div class="row">
        		<div class="main-menu">
					<!-- navbar -->
					<nav class="navbar navbar-default" id="mainNav">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="logo">
								<a class="navbar-brand js-scroll-trigger logo-header" href="#">
<!--									<img src="images/logo.png" alt="">-->
									<h3 class="navbar-collapse collapse website-title">Carter's Website</h3>
								</a>
							</div>
						</div>
                            <div id="navbar" class="navbar-collapse collapse">
								<ul class="nav navbar-nav navbar-right">
									<li><a href="index.html">Home</a></li>
									<li><a href="school.html">School Info</a></li>
									<li><a href="hobbies.html">Hobbies &amp; Interests</a></li>
                                    <li><a href="work.html">Work</a></li>
                                    <li><a href="pbj.html">PB&amp;J</a></li>
                                    <li class="active"><a href="contact.html">Contact</a></li>
								</ul>
						</div>
						<!-- end nav-collapse -->
					</nav>
					<!-- end navbar -->
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- end container-fluid -->
	</header>
	<!-- end header -->
	</div>
	<!-- end site-header -->
	
	
	
	<div id="about" class="about-main pad-top-100 pad-bottom-100">
		<div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
						<?php
							if (isset($_GET['submit'])) {
								echo '<h2 class="block-title">Form Data</h2>';
								echo '<p><b>First Name:</b> ' . $_GET['firstName'] . '</p>';
								echo '<p><b>Last Name:</b> ' . $_GET['lastName'] . '</p>';
								echo '<p><b>Email:</b> ' . $_GET['email'] . '</p>';
								echo '<p><b>Phone Number:</b> ' . $_GET['phoneNumber'] . '</p>';
								echo '<p><b>Username:</b> ' . $_GET['username'] . '</p>';
								echo '<p><b>Password:</b> ' . $_GET['password'] . '</p>';
								echo '<p><b>Comments:</b> ' . $_GET['comments'] . '</p>';
							}
							else {
								echo '<p>Please go back to contact.html to fill out the form.</p>';
							}
						?>
					</div>
				</div>
            </div> <!-- end row -->
		</div> <!-- end container -->
	</div>
	
	<a href="#" class="scrollup" style="display: none;">Scroll</a>
	
	<!-- ALL JS FILES -->
	<script src="assets/js/all.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--<script src="assets/js/event-listener.js"></script>-->
	<!-- ALL PLUGINS -->
	<script src="assets/js/custom.js"></script>
	</body>
	
</html>