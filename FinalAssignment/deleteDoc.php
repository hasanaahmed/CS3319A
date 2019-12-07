<?php 
      //this file is for deleting a doctor


      //connect to db 
      include "connect.php";

      //assign the code of the doctor being deleted
      $doc = $_POST["deletedoc"];
      
      //query to check if doctor has patients 
      $check = "SELECT licenseno FROM assigned WHERE licenseno = '$doc';";
      
      //connect to database and send query
      $insert = mysqli_query($connection, $check);

      //if query insertion failed
      if(!insert) {
         die("connection failed");
      }

      //set counter of patients doctor has and initialize variable  
      $count = 0;
      while($row = mysqli_fetch_assoc($insert)) {
         if($row["licenseno"] == $doc) {
	    $count += 1;
         }
      }

      //if doctor has patients then ask for confirmation of deletion 
      if ($count >= 1) {
      echo "<br>";
      echo "This doctor has patients, are you sure you want to delete?";
      echo "<form action = '' method = 'POST'"; 
      echo "<br>";
      echo "<input type = 'radio' name = 'check' value = '$doc'>Yes";
      echo "<input type = 'radio' name = 'check' value = 'save'>No";
      echo "<br>";
      echo "<input type = 'submit'>";
      echo "</form>";
      
      //when user responds confirmation send values to helper file
         if (isset($_POST["check"])){
	    include "deleteHelp.php";
	  }
      }

      //if doctor has no patients 
      else {
      	 //query to delete doctor from database
         $query = "DELETE FROM doctor WHERE licenseno = '$doc';";
      	 //connect to database and send query
	 $result = mysqli_query($connection, $query);
 	 //if delete failed
	 if (!$result) {
            die("Delete failed.");
         }
      	 //if delete was successful
	 else {
            echo "Delete successful";
         }
      }    

      //close connection to db	
      mysqli_close($connection);    
?>