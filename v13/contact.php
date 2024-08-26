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
                                    <li class="active"><a href="contact.php">Contact</a></li>
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
	
	<?php
	if (!isset($_POST['submit'])) 
	{
	?>
		<form id="contactForm" method="post" action="">
			<div id="about" class="about-main pad-top-100 pad-bottom-100">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
								<h2 class="block-title">Contact</h2>
							</div>
						</div>
						<!-- end col -->
					</div>
					<!-- end row -->

					<!-- Note: 'id' attribute is used to identify an HTML element via CSS or JavaScript. Each 'id' must be unique. 'name' attribute is used by the server as a variable name to reference data submitted in a form element. 'name' may not be unique, for example, in the case of radio elements. -->
				
					<!-- For this app: 'id' attribute is for JavaScript; 'name' attribute is for PHP. -->
					<div class="col-lg-4">
						<!-- first name -->
						<div class="form-box" id="fnBox">
							<label class="control-label" for="firstName">Enter first name:</label>
							<input type="text" class="form-control" id="firstName" name="firstName"/>
							<div id="fnFeedback"></div>
						</div>
						<!-- last name -->
						<div class="form-box" id="lnBox">
							<label class="control-label" for="lastName">Enter last name:</label>
							<input type="text" class="form-control" id="lastName" name="lastName"/>
							<div id="lnFeedback"></div>
						</div>
						<!-- email -->
						<div class="form-box" id="emBox">
							<label class="control-label" for="email">Enter email:</label>
							<input type="text" class="form-control" id="email" name="email"/>
							<div id="emFeedback"></div>
						</div>
						<!-- phone number -->
						<div class="form-box" id="phBox">
							<label class="control-label" for="phoneNumber">Enter phone number:</label>
							<input type="text" class="form-control" id="phoneNumber" name="phoneNumber"/>
							<div id="phFeedback"></div>
						</div>
						<!-- username-->
						<div class="form-box" id="unBox">
							<label class="control-label" for="username">Create a username:</label>
							<input type="text" class="form-control" id="username" name="username"/>
							<div id="unFeedback"></div>
						</div>
						<!-- password -->
						<div class="form-box" id="pwBox">
							<label class="control-label" for="password">Create a password:</label>
							<input type="password" class="form-control" id="password" name="password"/>
							<div id="pwFeedback"></div>
						</div>
						<!-- comments -->
						<div class="form-box" id="comBox">
							<label class="control-label" for="comments">Enter your comments here:</label>
							<textarea type="text" class="form-control" id="comments" name="comments" rows="5"></textarea>
							<div id="comFeedback"></div>
						</div>
		<!--				<input type="submit" value="Sign up!" />-->
						<div class="reserve-book-btn">
							<button class="hvr-underline-from-center" type="submit" name="submit">Send</button>
						</div>
					</div>
				</div>
				<!-- end container -->
			</div>
		</form>
	<?php
	}
	else {
	?>
		<div id="about" class="about-main pad-top-100 pad-bottom-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
							<?php
									echo '<h2 class="block-title">Contact Form Data</h2>';
									echo '<p><b>First Name:</b> ' . $_POST['firstName'] . '</p>';
									echo '<p><b>Last Name:</b> ' . $_POST['lastName'] . '</p>';
									echo '<p><b>Email:</b> ' . $_POST['email'] . '</p>';
									echo '<p><b>Phone Number:</b> ' . $_POST['phoneNumber'] . '</p>';
									echo '<p><b>Username:</b> ' . $_POST['username'] . '</p>';
									echo '<p><b>Password:</b> ' . $_POST['password'] . '</p>';
									echo '<p><b>Comments:</b> ' . $_POST['comments'] . '</p>';
							?>
						</div>
					</div>
				</div> <!-- end row -->
			</div> <!-- end container -->
		</div>
	<?php
	}
	?>
	<a href="#" class="scrollup" style="display: none;">Scroll</a>
	
	<!-- ALL JS FILES -->
	<script src="assets/js/all.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/event-listener.js"></script>
	<!-- ALL PLUGINS -->
	<script src="assets/js/custom.js"></script>
	</body>
	
</html>