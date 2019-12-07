<!-- 
Hasan Ahmed 
CS3319
Assignment 3
Medical Database 
-->
<html>
<head>
        <!-- Set up title and link fonts and css -->  
	<title>OHIP Database</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
  <!-- Call scripts -->
  <script src = "patients.js"></script>
  <script src = "doctors.js"></script>
<!-- Main title -->
<h1>OHIP Command Centre</h1>
</br>
</hr>

<!-- 
DOCTOR SECTION 
-->
<h2>DOCTORS</h2>

<!-- 
TASK: List of doctors after uses chooses order and setting 
-->
<h4>LIST OF DOCTORS</h4>
<!-- Create form for input -->
<form action = "" method = "POST">
Sort By: <input type = "radio" name = "sort" value = "firstname">First Name
<input type = "radio" name = "sort" value = "lastname">Last Name
<br>
Order By: 
<input type = "radio" name = "order" value = "ASC">Ascending
<input type = "radio" name = "order" value = "DESC">Descending
<br><input type ="submit">
</form>
<!-- Send orders and retrieve list -->
<?php
   if(isset($_POST["sort"]) && (isset($_POST["order"]))) {
      include "getDoctors.php";
   }

   if(isset($_POST["pick"])) {
      include "getDocInfo.php";
   }
?>
</br>

<!-- 
TASK: List of doctors who were licensed after a user specified date 
-->
<h4>SEARCH DOCTORS BASED ON LICENSE DATE</h4>
<!-- Form for user to enter date -->
<form action = "" method = "POST">
<input type = "date" name = "datecheck" id = "datecheck" value = "" placeholder\
 = "YYYY-MM-DD"/>
</form>
<!-- Send date and retireve list -->
<?php
   if(isset($_POST["datecheck"])) {
      include "checkDoc.php";
   }
?>
</br>

<!-- 
TASK: List of doctors without any patients 
-->
<h4>LIST OF DOCTORS WITH NO PATIENTS</h4>

<!-- Retrieve list -->
<?php
   include "docWithout.php";
?>
</br>

<!-- 
TASK: Add a doctor to database 
-->
<h4>ADD A DOCTOR</h4>
<!-- Form to enter doctor information -->
<form action = "" method = "POST">
<!-- License number of doctor -->
License Number: 
<input type = "text" name = "licenseno" id = "licenseno" value = "" placeholder = "Ex; XX00" /></br>
<!-- First name of doctor -->
First Name: 
<input type = "text" name = "firstname" id = "firstname" value = "" placeholder = "Ex; Hasan" /></br>
<!-- Last name of doctor -->
Last Name:
<input type = "text" name = "lastname" id = "lastname" value = "" placeholder = "Ex; Ahmed" /></br> 
<!-- Specialty of doctor -->
Specialty: 
<input type = "text" name = "specialty" id = "specialty" value = "" placeholder = "Ex; Cardiologist" /></br>
<!-- Date of license of doctor -->
Date Licensed: 
<input type = "date" name = "date" id = "date" value = "" placeholder = "YYYY-MM-DD" /></br>
<!-- Hospital code of where doctor works -->
<!-- Retrieve list of hospitals to choose from -->
Hospital Code: 
<select name = "workfrom" id = "workfrom">
<option value = "1">Select Here</option>
<?php
   include "pickHosp.php";
?>
</br>
<br>
<input type = "submit" />
</form>
<!-- If hospital is chosen from and submit button is clicked, add info -->
<?php 
  if(isset($_POST["workfrom"])){
   include "docAdd.php";
}
?>
</br>
</br>

<!-- 
TASK: Delete doctor and check if patients assigned 
-->
<h4>DELETE A DOCTOR</h4>
Choose a doctor to delete: 
<form action = "" method = "POST">
<select name = "deletedoc" id = "deletedoc">
<option value = "1">Select here</option>
<!-- Retrieve list of doctors -->
<?php
   include "docList.php"; 
?>
</select>
<input type = "submit"/>
</form>
<!-- Call delete doctor code -->
<?php 
   if($_POST["deletedoc"] !== NULL){      
      include "deleteDoc.php";
   }
   if(isset($_POST["check"])){
      include "deleteHelp.php";
   }
?>
</br>

<!-- 
TASK: Assign/remove doctor to/from patient 
-->
<h4>ASSIGN/REMOVE A DOCTOR TO/FROM PATIENT</h4>
<!-- Section to get list of patients with no doctor -->
Assign a Doctor to a Patient:
<form action = "" method = "POST">
Patient To Assign:
<select name = "patfree" id = "patfree">
<option value = "1">Select Here</option>
<!-- Retrieve list of patients without doctor -->
<?php 
      include "patFree.php";
?>
</select>
</br>
</br>
<!-- Section to get list of patients with doctor -->
Remove a Doctor From a Patient:
</br>
<!-- Retrieve list of patients with doctor -->
Patient to Remove:
<select name = "pattaken" id = "pattaken">
<option value = "1">Select Here</option>
<?php
   include "patTaken.php";
?>
</select>
</br>
</br>
<!-- Section to choose doctor who is associated -->
Choose Doctor Associated
</br>
Doctor:
<select name = "doclist" id = "doclist">
<option value = "1">Select Here</option>
<!-- Retrieve list of doctors -->
<?php
   include "docList.php";
?>
</select>
</br>
<!-- Submit form -->
<input type = "submit">
</form>
<!-- Call appropriate function by redirecting to appropriate PHP file -->
<?php
   // Call assignment code 
   if($_POST["pattaken"] == 1) { 
      include "assignDoc.php";
   }
   // Call removal code 
   elseif($_POST["patfree"] == 1) {
      include "removeDoc.php";
   }
?>
</hr>

<!-- 
PATIENT SECTION 
-->
<h2>PATIENTS</h2>

<!-- 
TASK: Search for Patient by entering OHIP code 
-->
<h4>SEARCH FOR A PATIENT</h4>
<!-- Form to enter OHIP no. of patient -->
<form action ="" method="POST">
<input type = "number" name = "pickpatients" id = "pickpatients" value = "" placeholder = "OHIP no." />
</form>
<!-- Call PHP code to load the patient information if exists -->
<?php
   if (isset($_POST["pickpatients"])) {
      include "loadPatients.php";
   }
?>
</br>
</hr>

<!-- 
HOSPITAL SECTION
 -->
<h2>HOSPITALS</h2>

<!-- 
TASK: retrieve list of hospitals with head doctor information 
-->
<h4>LIST OF HOSPITALS</h4>
<!-- Call PHP function to retrieve lists -->
<?php
   include "getHospitals.php";
?>
</br>

<!-- 
TASK: Update a current hospitals name
 -->
<h4>UPDATE HOSPITAL NAME</hr>
</br>
</br>
<!-- Retrieve list of current hospitals -->
<form action = "" method = "POST">
<select name = "pickhosp", id = "pickhosp">
  <option value = "1">Select Here</option>
<!-- Call PHP code to get hospitals -->
<?php 
   include "pickHosp.php";
?>
</select>
</br>
</br>
to 
</br>
</br>
<!-- Input for new name desired -->
<input type = "text" name = "newname" id = "newname" value = "" placeholder = "New Name"/>
<input type = "submit"/>
<!-- Call PHP function to change name -->
<?php 
   if(isset($_POST["newname"])){
      include "changeName.php";
   }
?>
</form>
</br>
</hr>
</body>
</html>
