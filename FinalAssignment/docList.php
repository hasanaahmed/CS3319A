<?php
 //this file get a list of all doctor with all fields 


 //connect to db 
 include "connect.php";

 //query to retrieve information 
 $query = "SELECT * FROM doctor;";

 //connect to database and send query 
 $result = mysqli_query($connection,$query);
 
 //if the query fails 
 if (!$result) {
    die("databases query failed.");
 }

 //loop through array and print out doctor information
 while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value ='" .$row["licenseno"] ."'>" ."Dr. " .$row["firstname"] ." " .$row["lastname"] ."</option>";
 }

 //free result 
 mysqli_free_result($result);

 //disconnect from db
 mysqli_close($connection);
?>