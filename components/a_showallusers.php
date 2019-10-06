<?php
$sql = "SELECT eventID, name, eventdate, genre FROM events";
$result = $connect->query($sql);
if ($result->num_rows > 0) {    
  echo "
	<p class='connecthead'>Events in Vienna</p>
	  <table class='allevents'>
	  <thead>
	    <tr>
	      <th>ID</th>
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
			
									</td>		
	    </tr>';
    
  }  
echo '</table>';
}
?>