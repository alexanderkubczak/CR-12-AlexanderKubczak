<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if (isset($_SESSION['user'])=="") {
 header("Location: login.php");
 exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Party Organizer</title>

<body>






<?php include 'components/header.php';?>


<?php
$currentuser = $_SESSION['user'];
$sql = "SELECT * FROM users where user_id = $currentuser";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
echo '<h2 class="greeting"> Hello ' .$row["user_name"]. '! <br> Welcome to Viennas Event Organizer</h2>';
	?>

 

	

            <?php if($userRow['role' ]==1){ ?>
          <h1 class="welcome">Your role is user </h1>
          <?php include 'components/showclubs.php'; ?>
          <?php include 'components/showallusers.php'; ?>
          <?php include 'components/showartist.php'; ?>
		  <?php }
     	  else{ ?>
     	  	<h1 class="welcome">Your role is admin </h1>
     	  	<a href= "adddata.php"><button class="add" type="button">Add Event</button></a>
     	  	          <?php include 'components/a_showallusers.php'; ?>
                    <?php include 'components/showartist.php'; ?>
                              <?php include 'components/showclubs.php'; ?>

	

     	 <?php } ?>

<?php
$connect->close();
      ?>
</body>
</html>
<?php ob_end_flush(); ?>