<?php
      //this file retireves list of doctors licensed before a specific date

      //require database connection
      require "connect.php";

      //assign date entered to variable 
      $theDate = $_POST["datecheck"];
      
      //query to select the doctors with filter
      $query = "
      SELECT firstname, lastname, specialty, date 
      FROM doctor
      WHERE date < STR_TO_DATE('$theDate', '%Y-%m-%d');";

      //connect to database and send query 
      $result = mysqli_query($connection, $query);
      
      //if query fails
      if (!$result) {
         die("Query search failed.");
      }

      //print out doctor information retireved 
      while($row = mysqli_fetch_assoc($result)) {
         echo "<br>" . "FIRST NAME: ";
         print_r($row[firstname]);
         echo "<br>" . "LAST NAME: ";
         print_r($row[lastname]);
         echo "<br>" . "SPECIALTY: ";
         print_r($row[specialty]);
	 echo "<br>" . "DATE: ";
	 print_r($row[date]);
         echo "<br>";
         echo "</pre>";
      }
      
      //free the result from query 
      mysqli_free_result($result);
?>





