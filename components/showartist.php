<?php
$sql = "SELECT name, genre, portfolio FROM artist";
$result = $connect->query($sql);
if ($result->num_rows > 0) {    
  echo "
	<p class='connecthead'>Artists</p>
	  <table class='allclubs'>
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Genre</th>
   	      <th>Portfolio</th>

	    </tr>
	  </thead>";
while($row = $result->fetch_assoc()) {
	echo
		'<tr>
			<td class="tablename">' .$row["name"]. '</td>
			<td class="tablegenre">' .$row["genre"]. '</td>
			<td class="tabledate">' .$row["portfolio"]. '</td>

						</td>		
	    </tr>';
    
  }  
echo '</table>';
}
?>