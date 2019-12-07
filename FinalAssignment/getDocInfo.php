<?php
   //this file prints out the doctor information 


   //connect to db 
   include "connect.php";

   //store licenseno of doctor in variable 
   $licNo = $_POST["pick"];

   //setup query 
   $query = "SELECT licenseno, firstname, lastname, date, specialty, hospname FROM doctor INNER JOIN hospital ON workfrom = hospcode WHERE licenseno = '$licNo';";

   //connect and send query 
   $result = mysqli_query($connection, $query);
   
   //if query fails 
   if(!result) {
      die("connection failed.");
   }

   //get row values 
   $row = mysqli_fetch_assoc($result);
   
   //print out info
   echo "Dr. " .$row["firstname"] ." " .$row["lastname"];
   echo "<br>";
   echo "License No: " .$row["licenseno"] ." Issued on: " .$row["date"];
   echo "<br>";
   echo "Speciality: " .$row["specialty"];
   echo "<br>";
   echo "Works at: " .$row["hospname"];

   //close connection 
   mysqli_close($connection);
?>