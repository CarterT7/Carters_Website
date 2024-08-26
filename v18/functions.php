<?php

# connect to database
function db_connect($db) {
	
	$username = "[redacted]"; // username redacted from GitHub for privacy
	$password = "[redacted]"; // password redacted from GitHub for privacy
	$host = "localhost";
	
	$dblink = new mysqli($host, $username, $password, $db);
	return $dblink;
}

function redirect($uri) {
	?>
	<script type="text/javascript">
		<!--
		document.location.href="<?php echo $uri; ?>";
		-->
	</script>
<?php die;
}

?>