<html>
<head>
   <title >PHP CRUD  |  Add User</title>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset>
   <legend>Add Media</legend>

   <form action="actions/create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="name"  placeholder="name"/></td >
           </tr>    
           <tr>
               <th>Date</th>
               <td><input  type="text" name= "date" placeholder="date"/></td>
           </tr>
           <tr>
               <th>Genre</th>
               <td><input type="text"  name="genre" placeholder ="genre"/></td>
           </tr>
        
               <td><button type ="submit">Add new Media</button></td>
               <td ><a href= "index.php"><button  type="button">Back</button></a></td>
           </tr>
       </table>
   </form>

</fieldset >

</body>
</html>