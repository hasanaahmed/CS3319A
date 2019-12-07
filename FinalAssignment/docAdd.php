<?php
   //this file adds a doctor to the database 


   //connect to database 
   include "connect.php";

   //store licenseno
   $license = $_POST["licenseno"];
   //store first name 
   $fname = $_POST["firstname"];
   //store last name 
   $lname = $_POST["lastname"];
   //store specialty 
   $spec = $_POST["specialty"];
   //store date licensed 
   $date = $_POST["date"];
   //store hospital doctor works at 
   $hosp = $_POST["workfrom"];

   //check if doctor license no. currently exists 
   $check = "SELECT licenseno FROM doctor;";

   //connect to database and check if number exists 
   $insert = mysqli_query($connection, $check);
   //if check query fails 
   if(!insert){
      die("connection failed.");
   }

   //set counter for license number existing 
   $count = 0;

   //iter counter when same license number pops up 
   while($row = mysqli_fetch_assoc($insert)) {
      if($row["licenseno"] == $license) {
         $count += 1;
      }
   }

   //if license number does not currently exist 
   if ($count == 0) {
      //query to insert doctor into database 
      $query = "INSERT INTO doctor (licenseno, firstname, lastname, specialty, date, workfrom) VALUES ('$license', '$fname', '$lname', '$spec', '$date', '$hosp');";
      //connect to database and send query
      $result = mysqli_query($connection, $query);
      //if query fails 
      if (!$result) {
         die("database query failed.");
      }

      //if query addition is successfull 
      else {
   	echo "Doctor successfully added";
      }
   }
   
   //if doctor license number already exists 
   else {
      echo "Doctor already exists with that license!";
   }

   //disconnect from db
   mysqli_close($connection);
?>