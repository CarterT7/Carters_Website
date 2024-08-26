<?php
	$var_home = "";
	$var_school = "";
	$var_hobbies = "";
	$var_work = "";
	$var_pbj = "";
	$var_contact = "";
	//$var_results = "";
	$var_register = "";
	$var_login = "";

	if (!isset($_GET['page']))
		$page = "home";
	else 
		$page = $_GET['page'];

	switch ($page) {
		case "school":
			$var_school = ' class="active"';
			break;
		case "hobbies":
			$var_hobbies = ' class="active"';
			break;
		case "work":
			$var_work = ' class="active"';
			break;
		case "pbj":
			$var_pbj = ' class="active"';
			break;
		case "contact":
			$var_contact = ' class="active"';
			break;
		case "results":
			//$var_results = ' class="active"';
			break;
		case "register":
			//$var_register = ' class="active"';
			break;
		case "login":
			$var_login = ' class="active"';
			break;
		default:
			$var_home = ' class="active"';
			break;
	}

	echo '<div id="navbar" class="navbar-collapse collapse">';
	echo   '<ul class="nav navbar-nav navbar-right">';
	echo 	 '<li'.$var_home.'><a href="index.php">Home</a></li>';
	echo 	 '<li'.$var_school.'><a href="index.php?page=school">School Info</a></li>';
	echo 	 '<li'.$var_hobbies.'><a href="index.php?page=hobbies">Hobbies &amp; Interests</a></li>';
	echo 	 '<li'.$var_work.'><a href="index.php?page=work">Work</a></li>';
	echo 	 '<li'.$var_pbj.'><a href="index.php?page=pbj">PB&amp;J</a></li>';
	echo 	 '<li'.$var_contact.'><a href="index.php?page=contact">Contact</a></li>';
	//echo 	 '<li'.$var_results.'><a href="index.php?page=results">Results</a></li>';
	//echo 	 '<li'.$var_register.'><a href="index.php?page=register">Register</a></li>';
	echo 	 '<li'.$var_login.'><a href="index.php?page=login">Login</a></li>';
	echo   '</ul>';
	echo '</div>';

?>




