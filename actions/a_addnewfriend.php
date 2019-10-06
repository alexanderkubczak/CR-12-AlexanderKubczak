<?php
  ob_start();
  session_start();
?>
<?php 
echo "You are now friends with: ";
echo $_GET['user_id'];
require '../dbconnect.php';
if ($_GET) {
  $id1 = $_SESSION['user'];
  $id2 = $_GET['user_id'];
   $sql = "INSERT INTO relationships (user_id_a, user_id_b) VALUES ('$id1', '$id2')";

    if($connect->query($sql) === TRUE) {
        //    redirect to index via http-header
   } else {
       echo "Error updating record : " . $connect->error;
   }
}
?>