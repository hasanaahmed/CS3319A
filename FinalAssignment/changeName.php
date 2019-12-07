<?php 
      //file to change name of hospital


      //connect to db
      include "connect.php";
      //assign user inputted name to variable 
      $newName = $_POST["newname"];
      
      //store id value of hospital being altered
      $oldId = $_POST["pickhosp"];

      //set up query to update hospital table name attribute 
      $query = "UPDATE hospital SET hospname = '$newName' WHERE hospcode = '$oldId';";

      //connect to database and send query
      $result = mysqli_query($connection, $query);

      //if query fails
      if (!$result) {
      	 die("database query failed.");
	 }
      //if query is successfull 
      else {
      	 echo("Name change successfull!");
      }

      //disconnect from db
      mysqli_close($connection);
?>