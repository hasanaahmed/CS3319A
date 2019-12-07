<?php
      //this file returns a list of hospitals


      //connect to db
      include "connect.php";

      //query to get hospital information
      $query = "SELECT * FROM hospital;";

      //connect to database and send query
      $result = mysqli_query($connection, $query);

      //if query fails
      if (!$result) {
      	 die("Query failed.");
      }

      //loop through hospitals and print information
      while ($row = mysqli_fetch_assoc($result)) {
     	    echo "<option value ='" ."$row[hospcode]"."'>" .$row["hospname"] ." in " .$row["hospprov"] ."</option>";
	    }

      //free result
      mysqli_free_result($result);

      //disconnect from db
      mysqli_close($connection);
?>
