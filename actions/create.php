<?php 

require_once '../dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $date = $_POST['date'];
   $genre = $_POST['genre'];
   
   $sql = "INSERT INTO events (name, eventdate, genre) VALUES ('$name', '$date', '$genre')";
    if($connect->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }

   $connect->close();
}

?>