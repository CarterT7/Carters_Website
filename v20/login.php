<?php
// start session
session_start();

if (!isset($_POST['submit']))
{
	echo '<form id="contactForm" method="post" action="">';
	echo   '<div id="about" class="about-main pad-top-100 pad-bottom-100">';
	echo     '<div class="container" style="height: 100vh">';
	echo       '<div class="row">';
	echo         '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
	echo           '<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">';
	echo             '<h2 class="block-title">Login</h2>';
	echo           '</div>';
	echo         '</div>'; // end col-lg-12
	echo       '</div>'; // end row
	
	if (isset($_GET['reg']) && $_GET['reg'] == 'success')
		echo '<div class="alert alert-success" role="alert">You have successfully registered. You may now log in on this page.</div>';
	
	$errMsg = $_GET['errMsg'];
	if (isset($errMsg))
	{
		switch ($errMsg)
		{
			case "FormIncomplete":
				echo '<div class="alert alert-danger" role="alert">One or more fields blank</div>';
				break;
			case "NullSID":
				echo '<div class="alert alert-danger" role="alert">No session ID. Please log in.</div>';
				break;	
			case "InvalidSID":
				echo '<div class="alert alert-danger" role="alert">Invalid session ID. Please log in.</div>';
				break;
			case "AccountNotFound":
				echo '<div class="alert alert-danger" role="alert">Invalid username and/or password</div>';
				break;
		}
	}
	
	echo '<div class="col-lg-4">';
	
	// Username
	echo '<div class="form-box" id="unBox">';
	echo 	'<label class="control-label" for="username">Username:</label>';
	echo 	'<input type="text" class="form-control" id="username" name="username"/>';
	echo '</div>';
	
	// Password
	echo '<div class="form-box" id="pwBox">';
	echo 	'<label class="control-label" for="password">Password:</label>';
	echo 	'<input type="password" class="form-control" id="password" name="password"/>';
	echo '</div>';
	
	// Submit button
	echo '<div class="reserve-book-btn">';
	echo	'<button class="hvr-underline-from-center" type="submit" name="submit">Login</button>';
	echo '</div>';
	
	echo '<br>';
	echo "<p>Don't have an account? Register <a href='index.php?page=register'>here</a>.</p>";

	echo '</div>'; // end col-lg-4
	echo '</div>'; // end container
	echo '</div>'; // end "about" div
	echo '</form>';
}
else
{
	$username = $_POST['username'];
	$passText = $_POST['password'];

	// check fields
	if ($username == NULL || $passText == NULL)
		redirect("index.php?page=login&errMsg=FormIncomplete");
	else if (strlen($username) > 32 || strlen($passText) > 250)
		redirect("index.php?page=login&errMsg=AccountNotFound");
	
	$_SESSION['username'] = $username;
	
	# connect to database
	$dblink = db_connect("user_data");

	# salt the user's password to increase security when hashing. We are not going to escape special characters in the password because hashing a string with extra characters will produce an entirely different hash.
	$salt = "S£cR3tS@£†";
	$password = hash('sha256', $salt.$passText.$username);

	// protect against sql injection by escaping special characters in username. The "addslashes" function is not enough. Note that this function will not escape _ (underscore) and % (percent) signs, which have special meanings in LIKE clauses.
	$username = $dblink->real_escape_string($username);

	# since the username is part of the salting of the password hash, we do not need to specify the username when looking up a user in the database.
	/* $sql = "SELECT `auto_id` FROM `accounts` WHERE `username`='$username' AND `auth_hash`='$password';"; */
	$sql = "SELECT `auto_id` FROM `accounts` WHERE `auth_hash`='$password';";

	$result = $dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");

	if ($result->num_rows > 0)
	{
		# use a random salt to create a session ID which will be different every time the user logs in
		$salt = microtime();
		$session_id = hash('sha256', $salt.$password);

		$sql = "UPDATE `accounts` SET `session_id`='$session_id' WHERE `auth_hash`='$password';";

		$dblink->query($sql) or
			die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");

		redirect("index.php?page=results&sid=$session_id");
	}
	else
		redirect("index.php?page=login&errMsg=AccountNotFound");
}
?>