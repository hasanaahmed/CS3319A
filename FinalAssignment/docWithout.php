<?php
      //this file retrieves list of doctors without patients 


      //requires connection file 
      require "connect.php";
      
      //query to retrieve doctor attributes 
      $query = "
      SELECT firstname, lastname 
      FROM doctor
      WHERE licenseno NOT IN (SELECT licenseno FROM assigned);";
     
      //connect to database and send query 
      $result = mysqli_query($connection, $query);
      //if query fails 
      if (!$result) {
         die("Query search failed.");
      }

      //loop through result and print doctor name 
      while($row = mysqli_fetch_assoc($result)) {
	 echo "Dr. "  .$row[firstname] ." " .$row[lastname] ."</br>";
      }
      
      //disconnect from db
      mysqli_close($connection);
?>