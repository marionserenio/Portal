<?php 
require 'PasswordHash.php';
$pwdHasher = new PasswordHash(8, FALSE);

//connecting to DATABASE
$db_host = "localhost";
$db_user  ="root";
$db_password = "";
$database = "portal";
$db_recording = "asterisk";

$pdo = new PDO("mysql:host=$db_host;dbname=$database", "$db_user", "$db_password");

$pdo_recordings = new PDO("mysql:host=$db_host;dbname=$db_recording", "$db_user", "$db_password");

//get Campaigns : Index.php / AdminAddAgents.php
function getCampaigns(){	
	global $pdo;
	$stmt = $pdo ->prepare('SELECT CampaignName, 
					CampaignDescription FROM campaign');
	$stmt -> execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

//Store Agents function AdminAddAgents.php
function SaveAgents($UserName, $FullName, $Password, $Campaign, $Level, $Status){
	global $pdo;
	$InserAgentSql = "INSERT INTO `portal`.`users` (`ID`, `UserName`, `Name`, `Password`, `Campaign`, `Level`, `Status`) 
				 VALUES (NULL, :UserName, :FullName, :Password, :Campaign, :Level, :Status)";
	$stmt = $pdo ->prepare($InserAgentSql);
	$stmt -> execute(array(':UserName' => $UserName,
								   ':FullName' => $FullName,
								   ':Password' => $Password,
								   ':Campaign' => $Campaign,
								   ':Level' => $Level,
                   ':Status' => $Status));
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function SaveCampaign($CampaignName, $CampaignFields, $NumberFields){
	global $pdo;

	$InsertCampaignSQL = "INSERT INTO  `portal`.`campaign` (
					`ID` ,
					`CampaignName` ,
					`CampaignDescription` ,
					`NumberFields`
					)
					VALUES (
					NULL , :CampaignName, :CampaignDescription, :NumberFields)";
	$stmt = $pdo ->prepare($InsertCampaignSQL);
	$stmt -> prepare(array(':CampaignName' => $CampaignName,
							':CampaignDescription' => $CampaignDescription,
							':NumberFields' =>$NumberFields));
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

// function GetLeadInfoFFG($PhoneNumber){
// /*SELECT PhoneNumber, FirstName, MiddleName, LastName, CompanyName, Address, City, State, ZIPCODE
// FROM  `ffg-campaign` 
// WHERE PhoneNumber =  "1234567899"
// LIMIT 0 , 30*/

// 	global $pdo;
// 	$SQL_GetLeadInfoFFG = "SELECT PhoneNumber, FirstName, MiddleName, LastName, CompanyName, Address, City, State, ZIPCODE
// 							FROM  `ffg-campaign` 
// 							WHERE PhoneNumber = :PhoneNumber
// 							LIMIT 0 , 30";
// 	$stmt = $pdo ->prepare($SQL_GetLeadInfoFFG);
// 	$stmt -> execute(array('PhoneNumber' => $PhoneNumber));
// 	$row = $stmt->fetch();
// 	return $row;
// }

function UpdateFFG($FirstName, $MiddleName, $LastName, $CompanyName, $Address, $City, $State, $ZIPCode, $Working, $AgeGroup, $IncomeGroup, $Email, $DAppointment, $TAppointment, $Comments, $PhoneNumber){
	global $pdo;

	$SQL_UpdateFFG ="
		UPDATE `portal`.`ffgcampaign` SET  
		 `FirstName` =  	?,
		 `MiddleName` = 	?,
		 `LastName` =  		?,
		 `CompanyName` =	?,
		 `Address` = 		?,
		 `City` = 			?,
		 `State` = 			?,
		 `ZIPCode` =	    ?,
		 `Working` =	    ?,
		 `AgeGroup` =  		?,
		 `IncomeGroup` =	?,
		 `Email` = 		    ?,
		 `DAppointment` =   ?,
		 `TAppointment` =   ?,
		 `Comments` =  		?
		  WHERE  `ffgcampaign`.`PhoneNumber` = ?";

		$stmt = $pdo ->prepare($SQL_UpdateFFG);
		$stmt->execute(array($FirstName, $MiddleName, $LastName, $CompanyName, $Address, $City, $State, $ZIPCode, $Working, $AgeGroup, $IncomeGroup, $Email, $DAppointment, $TAppointment, $Comments, $PhoneNumber));
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function GetAllFFGLeads($PhoneNumber){
		global $pdo;
		$SQL_GetAllFFGLeads = "SELECT * 
			FROM  `ffgcampaign` 
			WHERE  `PhoneNumber` LIKE :PhoneNumber";

		$stmt = $pdo ->prepare($SQL_GetAllFFGLeads);
		$stmt ->execute(array(":PhoneNumber" => "%". $PhoneNumber ."%"));
		$row = $stmt->fetch();
		return $row;

}



function CheckUserName($UserName){
		global $pdo;

		$SQL_CheckUserName = "SELECT UserName
				FROM  `users` 
				WHERE UserName =?";
		$stmt = $pdo ->prepare($SQL_CheckUserName);
    $stmt ->execute(array($UserName));
    return $stmt->fetchAll(PDO::FETCH_OBJ);    
}

function CheckUserStatus($UserName){

    global $pdo;
    $SQL_CheckStatus = "SELECT STATUS FROM USERS
          WHERE UserName =?";

   $stmt = $pdo ->prepare($SQL_CheckStatus);
   $stmt ->execute(array($UserName));
   return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function CheckUserPassword($UserName){

  global $pdo;
  $SQL_CheckUserPassword ="SELECT PASSWORD FROM users
                        WHERE UserName =?";
   $stmt = $pdo ->prepare($SQL_CheckUserPassword);
   $stmt ->execute(array($UserName));
   $row = $stmt->fetch();
   return $row;
}

function CheckUserLevel($UserName){
  global $pdo;

  $SQL_CheckUserLevel ="SELECT Level
    FROM  `users` 
    WHERE UserName = ?";
  
   $stmt = $pdo ->prepare($SQL_CheckUserLevel);
   $stmt ->execute(array($UserName));
   $row = $stmt->fetch();
   return $Level = $row[0];
}
function CheckCampaignStatus($campaign){
  global $pdo;

  $SQL_CheckCampaignStatus = "SELECT STATUS FROM  `campaign` 
WHERE  `CampaignName` = ?";
   
   $stmt = $pdo ->prepare($SQL_CheckCampaignStatus);
   $stmt ->execute(array($campaign));
   $row = $stmt->fetch();
   return $Level = $row[0];
}

function GetUserCampaign($UserName){
	global $pdo;
	$GetUserCampaig_SQL = "SELECT  `Campaign` 
				FROM  `users` 
				WHERE  `UserName` =  ?";

   $stmt = $pdo ->prepare($GetUserCampaig_SQL);
   $stmt ->execute(array($UserName));
    $row = $stmt->fetch();
   return $Level = $row[0];
}
//throw new Exception('['. $stmt->errorCode().']'.$stmt->errorInfo()

function GetRecordingLink($PhoneNumber){

	global $pdo_recordings;

   $GetRecording_SQL = "SELECT filename 
		FROM  `recording_log` 
		WHERE  `filename` LIKE :PhoneNumber";


	$stmt = $pdo_recordings->prepare($GetRecording_SQL);
	$stmt ->execute(array(":PhoneNumber" => "%". $PhoneNumber ."%"));
	$row = $stmt->fetch();
	return $row;
}

?>