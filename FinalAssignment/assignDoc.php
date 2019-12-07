<?php
   // file to assign patient to doctor 


   // connect do db 
   include "connect.php";

   //get ohip number of patient
   $pat = $_POST["patfree"];
   
   //get license number of patient
   $doc = $_POST["doclist"];

   //set query to insert values into assignd table
   $query = "INSERT INTO assigned (ohipcode, licenseno) VALUES ($pat, '$doc');";

   //connect to database and send query
   $result = mysqli_query($connection, $query);

   //if query fails
   if (!$result) {
      die("database query failed");
   }
   //if query is successfull 
   else {
   	echo "<br>";
	echo "Success!";
   }

   //disconnect from db
   mysqli_close($connection);
?>