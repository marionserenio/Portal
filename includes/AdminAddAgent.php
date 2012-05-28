<?php 
include('functions.php');
$results = getCampaigns();
 ?>


<div id="AdminAddAgent">
	<h3>Add User</h3>
		<form id="AddAgentForm" action="#">
				<label>Username</label>
			<div class="input-prepend AddAgentInputContainer">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="AdminAddAgentUserName">
			</div>
				<label>Full Name</label>
			<div class="input-prepend AddAgentInputContainer">
				<span class="add-on"><i class="icon-leaf"></i></span>
				<input type="text" name="AdminAddAgentFullName">
			</div>

				<label>Password</label>
			<div class="input-prepend AddAgentInputContainer">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="AdminAddAgentPassword1">
			</div>

				<label>Retype Password</label>
			<div class="input-prepend AddAgentInputContainer">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" name="AdminAddAgentPassword2">
			</div>

			<label>Agent Level</label>
			<div class="input-prepend AddAgentSelectContainer"><span class="add-on">
				<i class="icon-list-alt"></i></span>		
				<select id="AdminAddAgentLevel" name="AddAgentSelectLevel">
                         <?php include('User-Levels.php') ?>			
						</select></div>

		<label>Agent Campaign</label>
			<div class="input-prepend AddAgentSelectContainer"><span class="add-on">
				<i class="icon-list-alt"></i></span>		
				<select id="AdminAddAgentSelect" name="AddAgentSelect">
						<option disabled="disabled" selected="selected" value="0">-- Select --</option>
							<?php if(isset($results)): ?>
							<?php 
							foreach ($results as $Campaigns){
								echo "<option value='{$Campaigns->CampaignName}'>{$Campaigns->CampaignName}</option>";	
							} ?>
						<?php endif; ?>
				</select></div>
				<br><br>




			<button class="btn button adminbutton" type="submit">Save Username</button>
		</form><!-- End of  #AddAgentForm-->
</div><!-- ENd of #AdminAddAgent -->

<div id="Append"></div>