<?php
ob_start();
session_start();
// access only the pages yo uare allowed to
if (isset($_SESSION['admin'])!="") {
 header("Location: adminindex.php");
 exit;
}
if (isset($_SESSION['user'])!="") {
 header("Location: userindex.php");
 exit;
}
include_once 'dbconnect.php';
$error = false;
if (isset($_POST['btn-signup'])) {
 
$name = trim($_POST['user_name']);
$name = strip_tags($name);
$name = htmlspecialchars($name);
$email = trim($_POST['user_email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);
$pass = trim($_POST['user_password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

?>
// PLACEHOLDER CLASS 
<?php
  class TableUsers
    {
      public function registerfunction()
      {
        // basic name validation
         if (empty($name)) {
          $error = true ;
          $nameError = "Please enter your full name.";
          return $nameError;
         } else if  (strlen($name) < 3) {
          $error = true;
          $nameError = "Name must have at least 3 characters.";
          return $nameError;
         } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
          $error = true;
          $nameError = "Name must contain alphabets and space.";
          return $nameError;
         }
     
      }
    }
$vildan = new TableUsers();
$nameError = $vildan->registerfunction();
// TableUsers::firstfunction()
?>
<?php
 //basic email validation
  if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT user_email FROM users WHERE user_email='$email'";
  $result = mysqli_query($connect, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if(!$error) {
 
  $query = "INSERT INTO users(user_name,user_email,user_password) VALUES('$name','$email','$password')";
  $res = mysqli_query($connect, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  } 
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="css/pokestyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
  <body class="regloginbody bg-info text-white">
    <?php include 'components/header.php';?>
    <div class="reglogbox">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
        <h2>Set up your account!</h2 >
        <hr/>         
        <?php if (isset($errMSG)) { ?>
        <div  class="alert alert-<?php echo $errTyp ?>" >
        <?php echo  $errMSG; ?>
        </div>
        <?php } ?>
        <input type ="text"  name="user_name"  class ="form-control"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>"/>
        <span class = "text-danger"> <?php echo $nameError; ?></span>
        <input type = "email" name="user_email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>"/>
        <span class="text-danger"> <?php echo $emailError; ?> </span>
        <input type="password" name="user_password" class="form-control" placeholder="Enter Password" maxlength="15"/>
        <span class="text-danger"> <?php echo $passError; ?> </span>
        <hr/>
        <button type="submit" class="btn btn-block btn-warning" name="btn-signup">Register</button>
        <hr/>
        <button class="btn btn-block btn-warning"><a class="text-dark" href="login.php">Log in Here</a></button> 
      </form>
    </div>
  </body>
</html>
<?php  ob_end_flush(); ?>