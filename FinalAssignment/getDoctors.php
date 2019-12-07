<?php
 //this file returns list of doctors sorted by user preferences 


 //connect to db
 include "connect.php";
 
 //store preference of sorting 
 $sort = $_POST["sort"];

 //store preference of ordering 
 $order = $_POST["order"]; 

 //query to retrieve list as preferred 
 $query = "SELECT * FROM doctor ORDER BY " .$sort ." " .$order .";";

 //connect to database and send query 
 $result = mysqli_query($connection,$query);

 //if query fails 
 if (!$result) {
 die("databases query failed.");
 }

 //loop through the result and print out doctor information 
 echo "<form action = '' method = 'POST'><br>";
 while ($row = mysqli_fetch_assoc($result)) {
  echo "<input type = 'radio' name = 'pick'  value ='" .$row["licenseno"]."'>" ."Dr. " .$row["firstname"] ." " .$row["lastname"] ."</option>";
 echo "<br>"; 
 }

 echo "<br>";
 echo "<input type = 'submit'>";
 echo "</form>";

 //if user selects a doctor to see more info
 if(isset($_POST["pick"])){
    echo "hit";
    include "getDocInfo.php";
 }

 //free result
 mysqli_free_result($result);

 //close connection
 mysqli_close($connection);
?>