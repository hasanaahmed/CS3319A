<?php
   //this file is the helper file for deleting a doctor


   //connect to db
   include "connect.php";

   //assign user response to confirmation in variable 
   $check = $_POST["check"];
   //store licenseno of doctor being deleted 
   $doc = $_POST["deletedoc"];
   //setup query to delete doctor 
   $query = "DELETE FROM doctor WHERE licenseno = '$check';";
   
   //if user still wants to delete doctor 
   if($check != "save"){
      //connect to database and send query 
      $result = mysqli_query($connection, $query);
      //if delete fails 
      if (!$result) {
         die("Delete Failed.");
      }
      //if delete succeeds 
      else {
         echo "Delete Successful";
      }
   }

   //if user decides to stop delete 
   else {
	echo "Delete stopped successfully";
	}

   //disconnect from db
   mysqli_close($connection);
?>