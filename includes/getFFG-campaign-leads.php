<?php 
session_start();
require 'functions.php';

$PhoneNumber = mysql_real_escape_string($_POST['GetFFGLeads']);

$_SESSION['PhoneNumberGLobal'] = $_POST['GetFFGLeads'];

if(GetAllFFGLeads($PhoneNumber)){
	$Leads = GetAllFFGLeads($PhoneNumber);

	// print_r($Leads);

	$FirstName = $Leads[2];
	$MiddleName = $Leads[3];
	$LastName = $Leads[4];
	$CompanyName = $Leads[5];
	$Address = $Leads[6];
	$City = $Leads[7];
	$State = $Leads[8];
	$ZIPCODE = $Leads[9];
	$Working = $Leads[10];
	$AgeGroup = $Leads[11];
	$IncomeGroup = $Leads[12];
	$Email = $Leads[13];
	$DAppointment = $Leads[14];
	$TAppointment = $Leads[15];
	$Comments = $Leads[16];
	$ListName = $Leads[17];
	$LeadType = $Leads[18];


	echo "
	<script>function AppViewModel() {
	    this.FirstName = ko.observable('".$FirstName."');
	    this.MiddleName = ko.observable('".$MiddleName."');
	    this.LastName = ko.observable('".$LastName."');
	    this.CompanyName = ko.observable('".$CompanyName."');
	    this.Address = ko.observable('".$Address."');
	    this.City = ko.observable('".$City."');
	    this.State = ko.observable('".$State."');
	    this.ZIPCODE = ko.observable('".$ZIPCODE."');
	    this.Working = ko.observable('".$Working."');
	    this.AgeGroup = ko.observable('".$AgeGroup."');
	    this.IncomeGroup = ko.observable('".$IncomeGroup."');
	    this.Email = ko.observable('".$Email."');
	    this.DAppointment = ko.observable('".$DAppointment."');
	    this.TAppointment = ko.observable('".$TAppointment."');
	    this.Comments = ko.observable('".$Comments."');
	    this.ListName = ko.observable('".$ListName."');
	    this.LeadType = ko.observable('".$LeadType."');

	}
	ko.applyBindings(new AppViewModel());
	</script>

	";
}else{
	echo "bad";
}

?>
