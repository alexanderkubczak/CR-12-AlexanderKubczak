	<?php
	$currentname = $_SESSION['user'];
	$sql = "SELECT * FROM relationships where (user_id_a = '$currentname') OR (user_id_b = '$currentname')";
	$result = $connect->query($sql);


   include 'components/header.php';	


	if ($result->num_rows > 0) {    
	echo "

	  <table class='freunde'>
	  <thead>
	    <tr>
	      <th scope='col'>ID</th>
	      <th scope='col'>Person 1</th>
	      <th scope='col'>Person 2</th>
	    </tr>
	  </thead>";

	while($row = $result->fetch_assoc()) {
		echo
			'<tr class="my-5">
				<td>' .$row["user_id"]. '</td>
				<td>' .$row["user_id_a"]. '</td>
				<td>' .$row["user_id_b"]. '</td>
		    </tr>';
	    
	  }  
	echo '</table>';
	}
	?>
