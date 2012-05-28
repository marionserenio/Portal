<?php 
require 'functions.php';

echo $_POST['AdminAddCampaignName'];
echo $_POST['AdminAddCampaignDescription'];
echo $_POST['AdminAddCampaignFields'];


$CampaignName = mysql_escape_string($_POST['AdminAddCampaignName']);
$CampaignDescription = mysql_escape_string($_POST['AdminAddCampaignDescription']);
$CampaignFields = mysql_escape_string($_POST['AdminAddCampaignFields']);


if(!$CampaignName){
	echo "No campaign";
}if(!$CampaignDescription){
	echo "No campaign description";
}if(!$CampaignFields){
	echo "No fields";
}else{
	if(!SaveCampaign($CampaignName, $CampaignDescription, $CampaignFields)){
		
	}
}


 ?>