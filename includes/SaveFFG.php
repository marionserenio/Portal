<?php 
require('functions.php');
session_start();

  $FirstName = $_POST['FFG-FirstName'];
  $MiddleName = $_POST['FFG-MiddleName'];
  $LastName = $_POST['FFG-LastName'];
  $CompanyName = $_POST['FFG-CompanyName'];
  $Address = $_POST['FFG-Address'];
  $City = $_POST['FFG-City'];
  $State = $_POST['FFG-State'];
  $ZIPCode = $_POST['FFG-ZIP'];
  $Working = $_POST['FFG-Working'];
  $AgeGroup = $_POST['FFG-AgeGroup'];
  $IncomeGroup = $_POST['FFG-YearlyIncome'];
  $Email = $_POST['FFG-Email'];
  $DAppointment = $_POST['FFG-DateAppointment'];
  $TAppointment = $_POST['FFG-TimeAppointment'];
  $Comments = $_POST['FFG-Comments'];
  $PhoneNumber = $_SESSION['PhoneNumberGLobal'];



if(!UpdateFFG($FirstName, $MiddleName,$LastName, $CompanyName, $Address, $City, $State, $ZIPCode, $Working, $AgeGroup, $IncomeGroup, $Email, $DAppointment, $TAppointment, $Comments, $PhoneNumber)){
	echo "<div class=\"alert alert-success\"><strong>Lead Saved</strong></div>";
}else{
	echo "bad";
}

 ?>