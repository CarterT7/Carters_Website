<?php
// use a session to allow us to retain the data inside the POST superglobals, which get cleared upon redirection (PHP's header() function). More on this later in the code.
session_start();

if (!isset($_POST['submit'])) 
{
	echo '<form id="contactForm" method="post" action="">';
	echo   '<div id="about" class="about-main pad-top-100 pad-bottom-100">';
	echo     '<div class="container">';
	echo       '<div class="row">';
	echo         '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
	echo           '<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">';
	echo             '<h2 class="block-title">Contact</h2>';
	echo           '</div>';
	echo         '</div>'; // end col
	echo       '</div>'; // end row

	/* Note: 'id' attribute is used to identify an HTML element via CSS or JavaScript. Each 'id' must be unique.
			 'name' attribute is used by the server as a variable name to reference data submitted in a form element. 'name' may not be unique, for example, in the case of radio elements. */
				
	// For this app: 'id' attribute is for JavaScript; 'name' attribute is for PHP.
	echo '<div class="col-lg-4">';

	$errMsg = $_GET['errMsg'];

	// First name error checking
	if (isset($errMsg) && strstr($errMsg, "firstName")) {

		if (strstr($errMsg, "firstNameNull"))
			$msg = 'First name cannot be blank';
		else if (strstr($errMsg, "firstNameLength"))
			$msg = 'First name must be between 2 and 120 characters';
		else if (strstr($errMsg, "firstNameNoAlphaChars"))
			$msg = 'First name must contain at least one alphabetic character';
		else if (strstr($errMsg, "firstNameInvalidChar"))
			$msg = 'First name can only contain letters, hyphens, and apostrophes';

		echo '<div class="form-box has-error" id="fnBox">';
		echo 	'<label class="control-label" for="firstName">Enter first name:</label>';
		echo 	'<input type="text" class="form-control" id="firstName" name="firstName" value="'. $_SESSION['firstName'] .'"/>';
		echo 	'<div id="fnFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		// if session data exists for firstName, fill in the data and make box green
		if (isset($_SESSION['firstName'])) {
			echo '<div class="form-box has-success" id="fnBox">';
			echo   '<label class="control-label" for="firstName">Enter first name:</label>';
			echo 	 '<input type="text" class="form-control" id="firstName" name="firstName" value="'. $_SESSION['firstName'] .'"/>';
		}
		else {
			echo '<div class="form-box" id="fnBox">';
			echo   '<label class="control-label" for="firstName">Enter first name:</label>';
			echo 	 '<input type="text" class="form-control" id="firstName" name="firstName"/>';
		}
		echo   '<div id="fnFeedback"></div>';
		echo '</div>';
	}


	// last name error checking
	if (isset($errMsg) && strstr($errMsg, "lastName")) {
		if (strstr($errMsg, "lastNameNull"))
			$msg = 'Last name cannot be blank';
		else if (strstr($errMsg, "lastNameLength"))
			$msg = 'Last name must be between 2 and 120 characters';
		else if (strstr($errMsg, "lastNameNoAlphaChars"))
			$msg = 'Last name must contain at least one alphabetic character';
		else if (strstr($errMsg, "lastNameInvalidChar"))
			$msg = 'Last name can only contain letters, hyphens, and apostrophes';

		echo '<div class="form-box has-error" id="lnBox">';
		echo 	'<label class="control-label" for="lastName">Enter last name:</label>';
		echo 	'<input type="text" class="form-control" id="lastName" name="lastName" value="'. $_SESSION['lastName'] .'"/>';
		echo 	'<div id="lnFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['lastName'])) {
			echo '<div class="form-box has-success" id="lnBox">';
			echo 	'<label class="control-label" for="lastName">Enter last name:</label>';
			echo 	'<input type="text" class="form-control" id="lastName" name="lastName" value="' . $_SESSION['lastName'] . '"/>';
		}
		else {
			echo '<div class="form-box" id="lnBox">';
			echo 	'<label class="control-label" for="lastName">Enter last name:</label>';
			echo 	'<input type="text" class="form-control" id="lastName" name="lastName"/>';
		}
		echo 	'<div id="lnFeedback"></div>';
		echo '</div>';
	}


	// email error checking
	if (isset($errMsg) && strstr($errMsg, "email")) {
		if (strstr($errMsg, "emailNull"))
			$msg = 'Email cannot be blank';
		else if (strstr($errMsg, "emailInvalid"))
			$msg = 'Invalid email';

		echo '<div class="form-box has-error" id="emBox">';
		echo 	'<label class="control-label" for="email">Enter email:</label>';
		echo 	'<input type="text" class="form-control" id="email" name="email" value="'. $_SESSION['email'] .'"/>';
		echo 	'<div id="emFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['email'])) {
			echo '<div class="form-box has-success" id="emBox">';
			echo 	'<label class="control-label" for="email">Enter email:</label>';
			echo 	'<input type="text" class="form-control" id="email" name="email" value="'. $_SESSION['email'] .'"/>';
		}
		else {
			echo '<div class="form-box" id="emBox">';
			echo 	'<label class="control-label" for="email">Enter email:</label>';
			echo 	'<input type="text" class="form-control" id="email" name="email"/>';
		}
		echo 	'<div id="emFeedback"></div>';
		echo '</div>';
	}


	// phone number error checking
	if (isset($errMsg) && strstr($errMsg, "phoneNumber")) {
		if (strstr($errMsg, "phoneNumberNull"))
			$msg = 'Phone number cannot be blank';
		else if (strstr($errMsg, "phoneNumberNonNumeric"))
			$msg = 'Phone number must contain only numbers';
		else if (strstr($errMsg, "phoneNumberMismatch"))
			$msg = 'Phone number must be exactly 10 digits';

		echo '<div class="form-box has-error" id="phBox">';
		echo 	'<label class="control-label" for="phoneNumber">Enter phone number:</label>';
		echo 	'<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="'. $_SESSION['phoneNumber'] .'"/>';
		echo 	'<div id="phFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['phoneNumber'])) {
			echo '<div class="form-box has-success" id="phBox">';
			echo 	'<label class="control-label" for="phoneNumber">Enter phone number:</label>';
			echo 	'<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="' . $_SESSION['phoneNumber'] . '"/>';
		}
		else {
			echo '<div class="form-box" id="phBox">';
			echo 	'<label class="control-label" for="phoneNumber">Enter phone number:</label>';
			echo 	'<input type="text" class="form-control" id="phoneNumber" name="phoneNumber"/>';
		}
		echo 	'<div id="phFeedback"></div>';
		echo '</div>';
	}


	// username error checking
	if (isset($errMsg) && strstr($errMsg, "username")) {
		if (strstr($errMsg, "usernameNull"))
			$msg = 'Username cannot be blank';
		else if (strstr($errMsg, "usernameLength"))
			$msg = 'Username must be between 6 and 150 characters';

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
	if (isset($errMsg) && strstr($errMsg, "password")) {
		if (strstr($errMsg, "passwordNull"))
			$msg = 'Password cannot be blank';
		else if (strstr($errMsg, "passwordLength"))
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

	// comments error checking
	if (isset($errMsg) && strstr($errMsg, "comments")) {
		if (strstr($errMsg, "commentsNull"))
			$msg = 'Comments section cannot be blank';
		else if (strstr($errMsg, "commentsLength"))
			$msg = 'Comments section must not exceed 2500 characters';

		echo '<div class="form-box has-error" id="comBox">';
		echo 	'<label class="control-label" for="comments">Enter your comments here:</label>';
		echo 	'<textarea type="text" class="form-control" id="comments" name="comments" rows="5">'.$_SESSION['comments']. '</textarea>';
		echo 	'<div id="comFeedback" class="help-block">'.$msg.'</div>';
		echo '</div>';
	}
	else {
		if (isset($_SESSION['comments'])) {
			echo '<div class="form-box has-success" id="comBox">';
			echo 	'<label class="control-label" for="comments">Enter your comments here:</label>';
			echo 	'<textarea type="text" class="form-control" id="comments" name="comments" rows="5">'.$_SESSION['comments']. '</textarea>';
		}
		else {
			echo '<div class="form-box" id="comBox">';
			echo 	'<label class="control-label" for="comments">Enter your comments here:</label>';
			echo 	'<textarea type="text" class="form-control" id="comments" name="comments" rows="5"></textarea>';
		}
		echo 	'<div id="comFeedback"></div>';
		echo '</div>';

	}

	// Submit button
	echo '<div class="reserve-book-btn">';
	echo	'<button class="hvr-underline-from-center" type="submit" name="submit">Send</button>';
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
	unset($_SESSION['firstName']);
	unset($_SESSION['lastName']);
	unset($_SESSION['email']);
	unset($_SESSION['phoneNumber']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['comments']);

	// begin processing newly submitted data

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$comments = $_POST['comments'];


	// check first name
	if ($firstName == NULL)
		$errors .= "firstNameNull";
	else if (strlen($firstName) < 2 || strlen($firstName) > 120)
		$errors .= "firstNameLength";
	else if (preg_match("/[a-zA-Z]/", $firstName) !== 1)
		$errors .= "firstNameNoAlphaChars";
	else if (preg_match("/^[a-zA-Z-']{2,120}$/", $firstName) !== 1)
		$errors .= "firstNameInvalidChar";

	$_SESSION['firstName'] = $firstName;


	// check last name
	if ($lastName == NULL)
		$errors.="lastNameNull";
	else if (strlen($lastName) < 2 || strlen($lastName) > 120)
		$errors .= "lastNameLength";
	else if (preg_match("/[a-zA-Z]/", $lastName) !== 1)
		$errors .= "lastNameNoAlphaChars";
	else if (preg_match("/^[a-zA-Z-']{2,120}$/", $lastName) !== 1)
		$errors .= "lastNameInvalidChar";

	$_SESSION['lastName'] = $lastName;


	// check email
	if ($email == NULL)
		$errors.="emailNull";
	else if (preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email) !== 1)
		$errors .= "emailInvalid";

	$_SESSION['email'] = $email;


	// check phone number
	if ($phoneNumber == NULL)
		$errors.="phoneNumberNull";
	else if (!ctype_digit($phoneNumber))
		$errors .= "phoneNumberNonNumeric";
	else if (strlen($phoneNumber) != 10)
		$errors .= "phoneNumberMismatch";

	$_SESSION['phoneNumber'] = $phoneNumber;


	// check username
	if ($username == NULL)
		$errors.="usernameNull";
	else if (strlen($username) < 6 || strlen($username) > 150)
		$errors .= "usernameLength";

	$_SESSION['username'] = $username;


	// check password
	if ($password == NULL) {
		$errors .= "passwordNull";
	}
	else if (strlen($password) < 6 || strlen($password) > 250)
		$errors .= "passwordLength";

	$_SESSION['password'] = $password;


	// check comments
	if ($comments == NULL) {
		$errors .= "commentsNull";
	}
	else if (strlen($comments) > 2500)
		$errors .= "commentsLength";

	$_SESSION['comments'] = $comments;


	// if there are errors, redirect (basically to same page, since using this code in index.php?page=contact) with appropriate error message
	if ($errors != NULL)
		header("Location: index.php?page=contact&errMsg=$errors");

	// if we reach this point, there are no errors, so print the contact form data
	echo '<div id="about" class="about-main pad-top-100 pad-bottom-100">';
	echo   '<div class="container">';
	echo 	 '<div class="row">';
	echo 	   '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
	echo 		 '<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">';
	echo 		   '<h2 class="block-title">Contact Form Data</h2>';
	echo 		   '<p><b>First Name:</b> ' . $_POST['firstName'] . '</p>';
	echo 		   '<p><b>Last Name:</b> ' . $_POST['lastName'] . '</p>';
	echo 		   '<p><b>Email:</b> ' . $_POST['email'] . '</p>';
	echo 		   '<p><b>Phone Number:</b> ' . $_POST['phoneNumber'] . '</p>';
	echo 		   '<p><b>Username:</b> ' . $_POST['username'] . '</p>';
	echo 		   '<p><b>Password:</b> ' . $_POST['password'] . '</p>';
	echo 		   '<p><b>Comments:</b> ' . $_POST['comments'] . '</p>';
	echo		 '</div>'; // end "wow fadeIn" div
	echo	   '</div>'; // end col
	echo 	 '</div>'; // end row
	echo   '</div>'; // end container
	echo '</div>'; // end "about" div
}
?>
<script src="assets/js/event-listener.js"></script>