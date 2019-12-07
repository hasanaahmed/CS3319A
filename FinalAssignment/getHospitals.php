<?php
 //this file returns the list of hospitals with head doctor info


 //connect to db
 include "connect.php";

 //query to find hospital and doctor information 
 $query = "
 SELECT 
      hospname, 
      firstname, 
      lastname, 
      startdate 
 FROM 
      hospital INNER JOIN doctor ON headdoc = licenseno 
 ORDER BY hospname ASC;";

 //connect to database and sedn query 
 $result = mysqli_query($connection,$query);

 //if query fails 
 if (!$result) {
    die("databases query failed.");
 }

 //loop through the result and print out info formatted 
 while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value = '" ."$row[hospcode]"."'>" .$row["hospname"];
    echo " - ";
    echo "Head Doctor: Dr. " .$row["firstname"] ." " .$row["lastname"] ." -  " ."Start Date: " .$row["startdate"] ."</option>";
 }

 //free result
 mysqli_free_result($result);

 //disconnect from db
 mysqli_close($connection);
?>