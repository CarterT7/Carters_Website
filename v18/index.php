<?php
	include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
	
	<!-- Site Metas -->
	<title>Welcome to Carter's Website!</title>
	
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
							<div class="logo">
								<a class="navbar-brand js-scroll-trigger logo-header" href="#">
									<h3 class="navbar-collapse collapse website-title">Carter's Website</h3>
								</a>
							</div>
						</div>
						
						<?php
							include("navigation.php");
						?>
						
					</nav> <!-- end navbar -->
				</div> <!-- end main menu -->
			</div> <!-- end row -->
		</div> <!-- end container-fluid -->
	</header> <!-- end header -->
	</div> <!-- end site-header -->

    <?php
	if (!isset($_GET['page']))
		$page = "home";
	else 
		$page = $_GET['page'];
		
	switch ($page) {
		case "school":
			include("school.php");
			break;
		case "hobbies":
			include("hobbies.php");
			break;
		case "work":
			include("work.php");
			break;
		case "pbj":
			include("pbj.php");
			break;
		case "contact":
			include("contact.php");
			break;
		case "results":
			include("results.php");
			break;
		default:
			include("home.php");
			break;
	}
	
	?>
            
<!-- website template copyright info
<div id="copyright" class="copyright-main">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h6 class="copy-title"> Copyright &copy; 2018 Food Funday is powered by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></h6>
</div></div></div></div>-->

    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <!-- ALL JS FILES -->
    <script src="assets/js/all.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="assets/js/custom.js"></script>
	<!-- Greeting -->
	<script src="assets/js/add-content.js"></script>
</body>

</html>