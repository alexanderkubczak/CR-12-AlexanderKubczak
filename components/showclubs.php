<?php
$sql = "SELECT name, adress, genre FROM location";
$result = $connect->query($sql);
if ($result->num_rows > 0) {    
  echo "
	<p class='connecthead'>Clubs in Vienna</p>
	  <table class='allclubs'>
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
			<td class="tablename">' .$row["name"]. '</td>
			<td class="tabledate">' .$row["adress"]. '</td>
			<td class="tablegenre">' .$row["genre"]. '</td>
						</td>		
	    </tr>';
    
  }  
echo '</table>';
}
?>