<?php
	include("functions.php");
	$dblink=db_connect("contact_data");

	$sql = 'SELECT COUNT(*) AS "Count" FROM `contact_info`;';
	$result = $dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");
	$numRows = intval($result->fetch_array(MYSQLI_ASSOC)['Count']);

	$sql = 'SELECT `first_name`, `last_name`, `email`, `phone`, `comments` FROM `contact_info` LIMIT 1000;';
	$result = $dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");

	if ($numRows > 1000)
		echo '<br><p>For performance reasons, search results have been limited to 1,000 lines.</p>';
	if ($numRows > 0) {
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<tr>';
			echo   '<td>'.$data['first_name'].'</td>';
			echo   '<td>'.$data['last_name'].'</td>';
			echo   '<td>'.$data['email'].'</td>';
			echo   '<td>'.$data['phone'].'</td>';
			echo   '<td>'.$data['comments'].'</td>';
			echo '</tr>';
		}
	}
	else
		echo '<br><p>No results to display.</p>';
?>