<?php
$sql = "SELECT name, eventdate, genre FROM events";
$result = $connect->query($sql);
if ($result->num_rows > 0) {    
  echo "
	<p class='connecthead'>Events in Vienna</p>
	  <table class='allevents'>
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Date</th>
	      <th>Genre</th>
	    </tr>
	  </thead>";
while($row = $result->fetch_assoc()) {
	echo
		'<tr>
			<td class="tablename">' .$row["eventID"]. '</td>
			<td class="tablename">' .$row["name"]. '</td>
			<td class="tabledate">' .$row["eventdate"]. '</td>
			<td class="tablegenre">' .$row["genre"]. '</td>
			<td><form action="editevent.php" method="GET">
					  <input type="hidden" name="eventID" value="' .$row["eventID"]. '"/>
					  <button type="submit" class="btn btn-primary">Edit event
					  </button>
				</form>
										
	    </tr>';
    
  }  
echo '</table>';
}
?>