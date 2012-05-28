<?php session_start(); ?>
<?php if($_SESSION['User'] != "Admin"){
	Header('Location: index.php');
} ?>
<?php include('includes/URL-block.php'); ?>
<?php include('includes/header.php'); ?>

					
	<div id="AdminContainer">
			<div id="AdminUI">
					<div id="AgentMeta">
						<p><strong><?php echo $_SESSION['Level']; ?> - </strong><span class="user"><?php echo $_SESSION['User']; ?></span></p>
						<button class="btn button" id="MetaLogoutUser">Logout <i class="icon-home icon-white"></i></button>
					</div><!-- End of #AgentMeta -->
					<?php include('includes/AdminOptions.php'); // Add Admin options ; AddAgents, AddCampaigns, EditAgents ?>
					<div id="AdminFormContainer">
					

						
					</div><!-- End of AdminFormContainers -->

			</div><!-- End of AdminUI -->

	</div>
	<!-- End of AdminContainer -->
<?php include ('includes/footer.php') ?>

