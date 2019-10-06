<?php 

require_once 'dbconnect.php';

if ($_GET['eventID']) {
   $id = $_GET['eventID'];

   $sql = "SELECT * FROM events WHERE eventID = {$id}" ;
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

   $connect->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title >Edit User</title>

   <style type= "text/css">
       fieldset {
           margin : auto;
           margin-top: 100px;
            width: 50%;
       }

       table  tr th {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset>
   <legend>Update user</legend>

   <form action="actions/a_update.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>Name</th>
               <td><input type="text"  name="name" placeholder ="First Name" value="<?php echo $data['name'] ?>"  /></td>
           </tr>    
           <tr>
               <th>Date</th>
               <td><input type= "text" name="eventdate"  placeholder="Last Name" value ="<?php echo $data['eventdate'] ?>"/></td >
           </tr>
           <tr>
               <th>Genre</th>
               <td><input type ="text" name= "genre" placeholder= "Date of birth" value= "<?php echo $data['genre'] ?>" /></td >
           </tr>
           <tr>
               <input type= "hidden" name= "eventID" value= "<?php echo $data['eventID']?>" />
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "index.php"><button  type="button">Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body>
</html >

<?php
}
?>