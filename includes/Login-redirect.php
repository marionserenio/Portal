<?php session_start(); ?>
<?php 
require 'functions.php';

@$user = $_POST['LoginUser'];
@$Level =  $_POST['LoginLevel'];
@$Password =  $_POST['LoginPassword'];
@$Campaign =  $_POST['LoginCampaign'];


$EncodedPassword = CheckUserPassword($user);

$HashDatabase = $EncodedPassword[0];



@$check = $pwdHasher->CheckPassword($_POST['LoginPassword'], $HashDatabase);


if($Level == "NONE"){
	echo "<span class='badge'>Choose a level</span>";
}else if(!$user){
	echo "<span class='badge'>Input a user</span>";
}else if(!CheckUserName($user)){
	echo "<span class='badge'>UserName doesn't exist</span>";
}else if(CheckUserStatus($user) == "disabled"){
	echo "<span class='badge'>User name: ". $user . " is disabled</span>";
}else if(!$check){
	echo "<span class='badge'>Password is incorrect</span>";
}else if((CheckUserLevel($user) == 'Agent') && ($Campaign == GetUserCampaign($user)) && (CheckCampaignStatus($Campaign) == "Live")){  #Add else if here if adding campaigns
	echo "<script>window.location.replace('".GetUserCampaign($user)."-Campaign.php'); </script>";
	$_SESSION['User'] = $user;
	$_SESSION['Level'] = $Level;
}else if((CheckUserLevel($user) == 'QA') && ($Campaign == GetUserCampaign($user))){
	echo "<script>window.location.replace('".GetUserCampaign($user)."-Campaign-QA.php'); </script>";
	$_SESSION['User'] = $user;
	$_SESSION['Level'] = $Level;
}else if((CheckUserLevel($user) == 'Admin') && ($Campaign != "Admin")){
	echo "Wrong login credentials";
}else if((CheckUserLevel($user) == 'Admin') && (CheckCampaignStatus($Campaign) == "Live") && ($Campaign == "Admin")){
	echo "<script>window.location.replace('admin.php'); </script>";
	$_SESSION['User'] = $user;
	$_SESSION['Level'] = $Level;
}else if($Level == "Agent" && $Campaign !="Agent"){
	echo "<span class='badge'>Wrong login credentials</span>";
}else if($Level == "Admin" && CheckUserLevel($user) !="Admin"){
	echo "<span class='badge'>Wrong login credentials</span>";
}



/*check if username is existing, 
check status,
check if password,
check where campaign*/


 ?>