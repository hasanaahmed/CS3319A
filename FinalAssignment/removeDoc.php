<?php
   //this file removes a patient from being assigned a doctor 


   //connect to db 
   include "connect.php";

   //store patient ohip being removed
   $pat = $_POST["pattaken"];
   //store doctor licenseno being removed 
   $doc = $_POST["doclist"];

   //query to remove from assigned table 
   $query = "DELETE FROM assigned WHERE ohipcode = $pat AND licenseno = '$doc';";

   //connect to database and send query 
   $result = mysqli_query($connection, $query);

   //if query fails 
   if (!$result) {
      die("database query failed");
   }

   //if query is successful 
   else {
      echo "Success!";
   }

   //disconnect from db 
   mysqli_close($connection);
?>