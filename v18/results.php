<div id="about" class="about-main pad-top-100 pad-bottom-100">
  <div class="container" style="height: 100vh">
	<div class="row">
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			<?php
				$dblink=db_connect("contact_data");
				
				$sql = 'SELECT COUNT(*) AS "Count" FROM `contact_info`;';
				$result = $dblink->query($sql) or
					die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");
				$numRows = intval($result->fetch_array(MYSQLI_ASSOC)['Count']);
			
				$sql = 'SELECT `first_name`, `last_name`, `email`, `phone`, `comments` FROM `contact_info` LIMIT 1000;';
				$result = $dblink->query($sql) or
					die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");

				echo '<div class="container">';
				
				if ($numRows > 1000)
					echo '<br><p>For performance reasons, search results have been limited to 1,000 lines.</p>';
				if ($numRows <= 0)
					echo '<br><p>No results to display.</p>';
				else {
					echo '<table class="table">';
					echo   '<thead>';
					echo     '<tr>';
					echo       '<th scope="col">First Name</th>';
					echo       '<th scope="col">Last Name</th>';
					echo       '<th scope="col">Email</th>';
					echo       '<th scope="col">Phone</th>';
					echo       '<th scope="col">Comments</th>';
					echo     '</tr>';
					echo '</thead>';
					echo '<tbody>';

					while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
						echo '<tr>';
						echo   '<td>'.$data['first_name'].'</td>';
						echo   '<td>'.$data['last_name'].'</td>';
						echo   '<td>'.$data['email'].'</td>';
						echo   '<td>'.$data['phone'].'</td>';
						echo   '<td>'.$data['comments'].'</td>';
						echo '</tr>';
					}
				
					echo '</tbody>';
					echo '</table>';
					echo '</div>';
				}
			?>
        </div>
      </div>
    </div>
  </div>
</div>
