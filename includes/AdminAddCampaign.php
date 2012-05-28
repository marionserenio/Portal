<div id="AdminAddCampaign">
	<h3>Add Campaign</h3>
	<!-- Added WAT to disable script -->
		<form id="AddCampaignFormWAT" action="adminSaveCampaign.php">
				<label>Campaign Name</label>
			<div class="input-prepend AddCampaignInputContainer">
				<span class="add-on"><i class="icon-bookmark"></i></span>
				<input type="text" name="AdminAddCampaignName">
			</div>

				<label>Campaign Description</label>
			<div class="input-prepend AddCampaignInputContainer">
				<span class="add-on"><i class="icon-pencil"></i></span>
				<input type="text" name="AdminAddCampaignDescription">
			</div>

				<label>Number of Fields</label>
			<div class="input-prepend AddCampaignInputContainer">
				<span class="add-on"><i class="icon-list-alt"></i></span>
				<input type="text" name="AdminAddCampaignFields" id="NumberOfFields">
			</div>
			<br><br>
			<button class="btn button adminbutton" type="submit" id="AddCampaignContinue">Continue</button>
		</form><!-- End of  #AddCampaignForm-->
</div><!-- ENd of #AdminAddCampaign -->
<div id="Append"></div>