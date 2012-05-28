<?php require 'functions.php' ?>
<?php




function CheckPassBool(){
	$CheckPassBool = 0;
	if(!$_POST['AdminAddAgentPassword1'] || !$_POST['AdminAddAgentPassword2']){
		$CheckPassBool = 0;
	}else{
		$CheckPassBool = 1;
	}
	return $CheckPassBool;
}
function CheckPassSame(){
	$PassCheck = 0;
	if($_POST['AdminAddAgentPassword1'] == $_POST['AdminAddAgentPassword2']){
		$PassCheck = 1;
	}

	return $PassCheck;
}
//Form Validation Errors
if(!$_POST['AdminAddAgentUserName']){
	echo "<span class='label-important label'>UserName empty</span> </br>";
}else if(CheckUserName($_POST['AdminAddAgentUserName'])){
	echo "<span class='label-important label'>User name already exists</span>";
}else if(!$_POST['AdminAddAgentFullName']){
	echo "<span class='label-important label'>Full Name empty</span> </br>";
}else if(CheckPassBool() == 0){
	echo "<span class='label-important label'>Password box / boxes are empty</span> <br>";
}else if(CheckPassSame() == 0){
	echo "<span class='label-important label'>Password not the same</span> </br>";
}else if(!$_POST['AddAgentSelect']){
	echo "<span class='label-important label'>Please choose a campaign</span> </br>";
}else if($_POST['AddAgentSelectLevel'] == "NONE"){
	echo "<span class='label-important label'>Please choose a level</span> </br>";
}else{

	// $Password = crypt(mysql_real_escape_string($_POST['AdminAddAgentPassword1']));	


	$password = $_POST['AdminAddAgentPassword1'];
	$hash = $pwdHasher->HashPassword($password);
	
	$Status = "enabled";
	$UserName = mysql_real_escape_string($_POST['AdminAddAgentUserName']);
	$FullName = mysql_real_escape_string($_POST['AdminAddAgentFullName']);
	$Campaign = mysql_real_escape_string($_POST['AddAgentSelect']);

	$Level = $_POST['AddAgentSelectLevel'];
	if(!SaveAgents($UserName, $FullName, $hash, $Campaign, $Level, $Status)){
		echo "<span class='label-success label'>User Saved!</span> </br> </br>";
		echo "<a id='RemoveInput' class='btn button'>Save another user <i class='icon-plus-sign icon-white'></i></a>";
	}else{
		echo "<span class='label-warning label'>There was an error. Please try again</span> </br>";
	}
}
 ?>