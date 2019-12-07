<?php
   //this file returns the patients who are assigned a doctor 


   //connect to db
   include "connect.php";

   //query to retrieve patient information 
   $query = "SELECT * FROM patient WHERE ohipcode IN (SELECT ohipcode FROM assigned);";

   //connect to database and send query 
   $result = mysqli_query($connection, $query);
   //if query fails 
   if (!$result) {
      die("database query failed.");
   }

   //loop through patients and print information 
   while ($row = mysqli_fetch_assoc($result)) {
         echo "<option value = '" ."$row[ohipcode]"."'>" .$row["firstname"] ." " .$row["lastname"] ."</option>";
   }

   //free result
   mysqli_free_result($result);

   //disconnect from db 
   mysqli_close($connection);
?>