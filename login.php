<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['user'])!="") {
 header("Location: index.php");
 exit;
}

$error = false;
if(isset($_POST['btn-login'])) {

$email = trim($_POST['user_email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);
$pass = trim($_POST['user_password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

if(empty($email)) {
  $error = true;
  $emailError = "Please enter your email address.";
} else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $emailError = "Please enter valid email address.";
}

if (empty($pass)) {
$error = true;
$passError = "Please enter your password." ;
}

 if (!$error) { 
  $password = hash( 'sha256', $pass);

  $res=mysqli_query($connect, "SELECT * FROM users WHERE user_email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res);
 
  if($row['user_password']==$password ) {    
       $_SESSION['user'] = $row['user_id'];
       header( "Location: index.php");
  } else {
   $errMSG = "Are you sure about that?" ;
  } 
 }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
  <body class="regloginbody text-white">
    <div class="reglogbox">
      <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
        <h2>Find Events in Vienna!</h2 >
        <hr/>             
        <?php if (isset($errMSG)) {
        echo  $errMSG;}
        ?>  
        <input type="email" name="user_email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40"/>       
        <span class="text-danger"><?php  echo $emailError;?></span>         
        <input type="password" name="user_password"  class="form-control" placeholder ="Your Password" maxlength="15"/>       
        <span class="text-danger"><?php echo $passError; ?></span>
        <hr/>
        <button class="btn btn-light" type="submit" name="btn-login">Log In</button>
        <hr/> 
        <button class="btn btn-light"><a class="text-dark" href="register.php">Register</a></button>       
      </form>
    </div>
  </body>
</html>
<?php ob_end_flush(); ?>