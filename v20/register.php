<?php
// use a session to allow us to retain the data inside the POST superglobals, which get cleared upon redirection (PHP's header() function). More on this later in the code.
session_start();

if (!isset($_POST['submit'])) 
{
	echo '<form id="contactForm" method="post" action="">';
	echo   '<div id="about" class="about-main pad-top-100 pad-bottom-100">';
	echo     '<div class="container" style="height: 100vh">';
	echo       '<div class="row">';
	echo         '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
	echo           '<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">';
	echo             '<h2 class="block-title">Register</h2>';
	echo           '</div>';
	echo         '</div>'; // end col
	echo       '</div>'; // end row

	/* Note: 'id' attribute is used to identify an HTML element via CSS or JavaScript. Each 'id' must be unique.
			 'name' attribute is used by the server as a variable name to reference data submitted in a form element. 'name' may not be unique, for example, in the case of radio elements. */
				
	// For this app: 'id' attribute is for JavaScript; 'name' attribute is for PHP.
	echo '<div class="col-lg-4">';

	$errMsg = $_GET['errMsg'];
	
	// username error checking
	if (isset($errMsg) && strstr($errMsg, "Username")) {
		if (strstr($errMsg, "UsernameNull"))
			$msg = 'Username cannot be blank';
		else if (strstr($errMsg, "UsernameLength"))
			$msg = 'Username must be between 6 and 32 characters';
		else if (strstr($errMsg, "UsernameTaken"))
			$msg = 'The username you entered is taken. Please choose a different one, or if this is your account, you can log in <a href="index.php?page=login">here</a>.';

		echo '<div class="form-box has-error" id="unBox">';
		echo 	'<label class="control-label" for="username">Create a username:</label>';
		echo 	'<input type="text" class="form-control" id="username" name="username" value="'. $_SESSION['username'] .'"/>';
		echo 	'<div id="unFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['username'])) {
			echo '<div class="form-box has-success" id="unBox">';
			echo 	'<label class="control-label" for="username">Create a username:</label>';
			echo 	'<input type="text" class="form-control" id="username" name="username" value="' . $_SESSION['username'] . '"/>';
		}
		else {
			echo '<div class="form-box" id="unBox">';
			echo 	'<label class="control-label" for="username">Create a username:</label>';
			echo 	'<input type="text" class="form-control" id="username" name="username"/>';
		}
		echo 	'<div id="unFeedback"></div>';
		echo '</div>';
	}

	// password error checking
	if (isset($errMsg) && strstr($errMsg, "Password")) {
		if (strstr($errMsg, "PasswordNull"))
			$msg = 'Password cannot be blank';
		else if (strstr($errMsg, "PasswordLength"))
			$msg = 'Password must be between 6 and 250 characters';

		echo '<div class="form-box has-error" id="pwBox">';
		echo 	'<label class="control-label" for="password">Create a password:</label>';
		echo 	'<input type="password" class="form-control" id="password" name="password" value="'. $_SESSION['password'] .'"/>';
		echo 	'<div id="pwFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['password'])) {
			echo '<div class="form-box has-success" id="pwBox">';
			echo 	'<label class="control-label" for="password">Create a password:</label>';
			echo 	'<input type="password" class="form-control" id="password" name="password" value="' . $_SESSION['password'] . '"/>';
		}
		else {
			echo '<div class="form-box" id="pwBox">';
			echo 	'<label class="control-label" for="password">Create a password:</label>';
			echo 	'<input type="password" class="form-control" id="password" name="password"/>';
		}
		echo 	'<div id="pwFeedback"></div>';
		echo '</div>';
	}

	// Submit button
	echo '<div class="reserve-book-btn">';
	echo	'<button class="hvr-underline-from-center" type="submit" name="submit">Register</button>';
	echo '</div>';

	echo '</div>'; // end col
	echo '</div>'; // end container
	echo '</div>'; // end "about" div
	echo '</form>';

}

else {

	// even though we have JavaScript to notify user of incorrect fields (and even if we had it set up to reject the "Submit button for incorrect inputs using JS)", we still need to validate the input data on server-side, because JavaScript can be disabled on a web browser.

	// clear out previous errors
	$errors = "";

	// clear any previous session data (?? doesn't work)
	unset($_SESSION['username']);
	unset($_SESSION['password']);

	// begin processing newly submitted data
	
	# connect to database
	$dblink = db_connect("user_data");

	$username = $_POST['username']; // special characters will be escaped before inserting into database
	$passText = $_POST['password'];

	$_SESSION['username'] = $username;
	
	// check username for correct format
	if ($username == NULL)
		$errors.="UsernameNull";
	else if (strlen($username) < 6 || strlen($username) > 32)
		$errors .= "UsernameLength";
	
	/* check if username exists in database */
	# protect against sql injection by escaping special characters in username. The "addslashes" function is not enough. Note that this function will not escape _ (underscore) and % (percent) signs, which have special meanings in LIKE clauses.
	$username = $dblink->real_escape_string($username);
	
	$sql = "SELECT `auto_id` FROM `accounts` WHERE `username`='$username';";
	$result = $dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");

	if ($result->num_rows > 0)
		redirect("index.php?page=register&errMsg=UsernameTaken");
	/* * * */
	
	// check password
	if ($passText == NULL) {
		$errors .= "PasswordNull";
	}
	else if (strlen($passText) < 6 || strlen($passText) > 250)
		$errors .= "PasswordLength";


	// if there are errors, redirect (to the same page) with appropriate error message
	if ($errors != NULL)
		redirect("index.php?page=register&errMsg=$errors");
	else 
	{
		# salt the user's password to increase security when hashing
		$salt = "S£cR3tS@£†";
		$password = hash('sha256', $salt.$passText.$username);
		
		# Create the account by inserting the data into the database
		$sql = "INSERT INTO `accounts` (`username`, `auth_hash`) VALUES ('$username', '$password');";

		$dblink->query($sql) or
			die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");
		
		redirect("index.php?page=login&reg=success");
	}	
}
?>
<script src="assets/js/event-listener2.js"></script>