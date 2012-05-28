
<?php 
session_start();
require 'functions.php';

$drive = "F:/";
$MainFolder = "Recordings";
$date =  $_POST['date'];

$Phonenumber = $_SESSION['PhoneNumberGLobal'];


$RecordingArray = GetRecordingLink($Phonenumber);

foreach ($RecordingArray as $link) {
	echo "<li>File:///".$drive."/".$MainFolder."/".$date."/".$link.".mp3</li>";
}


?>
