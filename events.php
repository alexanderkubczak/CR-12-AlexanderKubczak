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
<title>Events</title>
</head>
<body>
<?php include 'components/header.php'; ?>
<?php include 'components/showallusers.php'; ?>

</body>
</html>