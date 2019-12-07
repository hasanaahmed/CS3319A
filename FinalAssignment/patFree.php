<?php
   //this file retrieves the list of patients who are not currently assigned to a doctor 


   //connect to db
   include "connect.php";

   //query to get patient info
   $query = "SELECT * FROM patient WHERE ohipcode NOT IN (SELECT ohipcode FROM assigned);";
   
   //connect to database and send query 
   $result = mysqli_query($connection, $query);
   
   //if query fails
   if (!$result) {		       
      die("database query failed.");
   }

   //loop through the patients and print name    
   while ($row = mysqli_fetch_assoc($result)) {
   	 echo "<option value = '" .$row["ohipcode"] ."'>" .$row["firstname"] ." " .$row["lastname"] ."</option>";
   }

   //free result
   mysqli_free_result($result);
   
   //disconnect from db
   mysqli_close($connection);
?>