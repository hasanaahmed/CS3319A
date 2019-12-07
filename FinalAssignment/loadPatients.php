<?php
      //this file loads the patients when OHIP code is entered 


      //require connection file  
      require "connect.php"; 

      //store the OHIP code submitted as variable 
      $whichPat = $_POST["pickpatients"];

      //query to retrieve information
      $query = "
      SELECT 
      	     patient.ohipcode, 
	     patient.firstname AS pfname, 
	     patient.lastname AS plname, 
	     doctor.firstname, 
	     doctor.lastname 
      FROM patient 
      	   INNER JOIN assigned ON assigned.ohipcode = patient.ohipcode 
      	   INNER JOIN doctor ON doctor.licenseno = assigned.licenseno 
      WHERE patient.ohipcode = ".$whichPat .";";
      
      //connect to database and send query      
      $result = mysqli_query($connection, $query);

      //if query fails 
      if (!$result) {
      	 die("Query search failed.");
      }
     
      //store returnal of query 
      $row = mysqli_fetch_assoc($result);

      //if information is present for OHIP then print info
      if (sizeof($row) != 0) {
      	 echo "<br>" . "Patient OHIP CODE: ";
      	 print_r($row[ohipcode]);
      	 echo "<br>" . "Patient FIRST NAME: ";
      	 print_r($row[pfname]);
      	 echo "<br>" . "Patient LAST NAME: ";
      	 print_r($row[plname]);
      	 echo "<br>" . "Treated by Dr. " .$row[firstname] ." " .$row[lastname];
	 echo "<br>";
      	 echo "</pre>";
      }

      //if OHIP code does not exist 
      else { 
         echo "Patient does not exist or is not currently being treated!";
      }

      //free result
      mysqli_free_result($result);

      //disconnect from db
      mysqli_close($connection);
?>