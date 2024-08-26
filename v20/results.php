<script src="assets/js/jquery-3.7.1.js"></script>

<div id="about" class="about-main pad-top-100 pad-bottom-100">
  <div class="container" style="height: 100vh">
	<div class="row">
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			<?php
			$session_id = $_REQUEST['sid'];
			
			if (isset($session_id) && $session_id != '')
			{
				$dblink = db_connect("user_data");
				$session_id = $dblink->real_escape_string($session_id);
				
				$sql = "SELECT `auto_id` FROM `accounts` WHERE `session_id`='$session_id';";
				$result = $dblink->query($sql) or
					die("<p>Something went wrong with $sql<br>".$dblink->error."</p>");
				
				if ($result->num_rows <= 0)
					redirect("index.php?page=login&errMsg=InvalidSID");
					
				echo '<div class="container">';
				echo   '<table class="table">';
				echo     '<thead>';
				echo       '<tr>';
				echo         '<th scope="col">First Name</th>';
				echo         '<th scope="col">Last Name</th>';
				echo         '<th scope="col">Email</th>';
				echo         '<th scope="col">Phone</th>';
				echo         '<th scope="col">Comments</th>';
				echo       '</tr>';
				echo     '</thead>';
				echo     '<tbody id="results">'; // this #results tag is how Javascript knows where to put the data
				echo     '</tbody>';
				echo   '</table>';
				echo '</div>';
			}
			else
			{
				redirect("index.php?page=login&errMsg=NullSID");
			}
			?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
	// function to refresh the data on the page
	function refresh_data() {
		$.ajax({
			type: 'post', // type of call
			url: '[site URL has been redacted from GitHub for privacy].../query_contacts.php', // location of call - query_contacts.php
			success: function (data) { // what to do when we have a successful call
				$('#results').html(data);
			}
		})
	}
	
	// execute refresh_data every 1000 milliseconds
	setInterval(function() { refresh_data(); }, 1000);
</script>