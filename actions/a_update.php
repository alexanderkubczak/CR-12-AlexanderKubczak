<?php 

require_once '../dbconnect.php';

if ($_POST) {
  $name = $_POST['name'];
   $date = $_POST['eventdate'];
   $genre = $_POST['genre'];

   $sql = "UPDATE events SET name = '$name', eventdate = '$date', genre = '$genre' WHERE name = {$name}" ;
   if($connect->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../index.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $connect->error;
   }

   $connect->close();

}

?>