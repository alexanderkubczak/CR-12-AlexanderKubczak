<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
   <title>add friend</title>
</head>
<?php
$friend = $_GET['user_id'];
$sql = "SELECT * FROM users where user_id = $friend";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
?>
   <body>
      <h3>Are you sure you want to add <?php echo $row["user_name"] ?> as a F R I E N D?</h3>
      <form action ="actions/a_addnewfriend.php" method="get">
         <input type="hidden" name= "user_id" value="<?php echo $_GET['user_id'] ?>"/>
         <button type="submit">I'm 100% sure!</button >
         <a href="index.php"><button type="button">Now that I think about it... Go back!</button></a>
      </form>
   </body>
</html>