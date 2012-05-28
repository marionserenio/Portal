
<?php session_start(); ?>
<?php require 'includes/functions.php' ?>

<?php include ('includes/header.php') ?>
	<div id="CampaignContainer">
				<div id="AgentMeta">
						<p><strong><?php echo $_SESSION['Level']; ?> - </strong><span class="user"><?php echo $_SESSION['User']; ?></span></p>
						<button class="btn button" id="MetaLogoutUser">Logout <i class="icon-home icon-white"></i></button>
				</div><!-- End of #AgentMeta -->
			<h2>FFG - Campaign  <?php if ($_SESSION['Level'] == "QA"){ echo "QA";} ?></h2>

				<form id="FFGQueryPhoneNumberFORM" type="POST">
				<input id="QueryPhoneNumberFFG" placeholder="Phone number" name="GetFFGLeads" maxlength="10" autocomplete="off"></input><br>
				<button class="btn button" id="SearchPhoneNumberFFG" type="submit">Search Phone </button>

			</form>
			<div id="FFG-CampaignContainer">
				<form id="FFG-Campaign" disabled="disabled">
						<label>First Name</label>
						<input class="span3" name="FFG-FirstName" data-bind="value: FirstName" disabled="disabled" autocomplete="off" ></input>
						<label>Middle Name</label>
						<input class="span2" name="FFG-MiddleName" data-bind="value: MiddleName" disabled="disabled" autocomplete="off" ></input>
						<label>Last Name</label>
						<input class="span3" name="FFG-LastName" data-bind="value: LastName" disabled="disabled" autocomplete="off" ></input>
						<hr>
						<label>Company Name</label>
						<input class="span4" name="FFG-CompanyName" data-bind="value: CompanyName" disabled="disabled" autocomplete="off" ></input>
						<label>Address</label>
						<input class="span7" name="FFG-Address" data-bind="value: Address" disabled="disabled"></input> <br>
						<label class="city">City</label>
						<label class="State">State</label>
						<label class="Zipcode">Zipcode</label>
						<div class="row addressList">
							<input class="span2" name="FFG-City" name="" data-bind="value: City" disabled="disabled" autocomplete="off" ></input>
							<input class="span2" name="FFG-State" name="" data-bind="value: State" disabled="disabled" autocomplete="off" ></input>
							<input class="span2" name="FFG-ZIP"  name="" data-bind="value: ZIPCODE" disabled="disabled" autocomplete="off" ></input>
						</div>
				

						<label class="ListName">List Name</label>
						<label class="LeadType">Lead Type</label>
						<div class="row LeadMeta">
								<input class="span2" name="FFG-ListName" id="ListName" data-bind="value: ListName" disabled="disabled" autocomplete="off" ></input>
								<input name="FFG-LeadType" class="span2" id="LeadType" data-bind="value: LeadType" disabled="disabled" autocomplete="off"></input>	
						</div>

						
			<div id="FFG-ErrorContainer">

			</div>				
				<div id="FFG-Campaign-Questions">
					<h3>Questions</h3>

					<p><strong>Are you working Fulltime or part time?</strong></p>
					<input id="FFG-Working" name="FFG-Working" type="text" data-bind="value: Working" disabled="disabled">
					<p><em>Full time / Part time</em></p> 
					</input>

					<p><strong>Which of the following age group applies to you?</strong><br> <em>18-24 / 25-39 / 40-49 / 50-59 / 60 above</em></p>
					<input type="text" id="FFG-AgeGroup" name="FFG-AgeGroup"  data-bind="value: AgeGroup" disabled="disabled">
		
					</input>

					<p><strong>Which of the range of the following household yearly income applies to you?</strong> <br>
						<em>29-39 / 40-44 / 45 above</em>
					</p>

					<input type="text" id="FFG-YearlyIncome" name="FFG-YearlyIncome" data-bind="value: IncomeGroup" disabled="disabled">
			
					</input>

					<p><strong>Email</strong></p>
					<input class="span3" id="FFG-Email" name="FFG-Email" autocomplete="off" data-bind="value: Email" disabled="disabled"></input> <br>

					<p><strong>Date of appointment</strong></p>
					<input class="span3" id="FFG-DateAppointment" name="FFG-DateAppointment" autocomplete="off" data-bind="value: DAppointment" disabled="disabled"></input> <br>
					

					<p><strong>Time of appointment</strong></p>
					<input class="span3" id="FFG-TimeAppointment" name="FFG-TimeAppointment" autocomplete="off" data-bind="value: TAppointment" disabled="disabled"></input> <br>

					<p><strong>Comments</strong></p>
					<textarea id="FFG-Comments" name="FFG-Comments" autocomplete="off" data-bind="value: Comments" disabled="disabled"></textarea> <br>
				</form>
				<form id="GetFFGRecording">
						<input name="date" placeholder="YYYY-MM-DD" class="span2" maxlength="10" id="GetFFGRecordingDate">
						<button class="button btn">Get Recording<i class="icon-headphones icon-white"></i></button>
				</form>		
			</div><!-- END of FFG-Campaign Container -->
			</div>
	</div>			
<section id="RecordingModal" class="modal hide fade">
	<div class="modal-header">
			<h2>Recording for Number </h2>	
	</div>
	<div class="modal-body">
			<ul>

			</ul>
	</div>
</section>
<?php include ('includes/footer.php') ?>
