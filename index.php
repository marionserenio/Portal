<?php require 'includes/functions.php' ?>
<?php 

$CampaignResults = getCampaigns();


if(getCampaigns()){
  echo "good";
}
 ?>
<?php include('includes/header.php'); ?>
  <div id="MainContainer">
<form id="Login">

    <h1>Portal <span class="version">v1.0</span></h1>
        <div id="LoginForm">
              <div>
                     <div class="input-prepend LoginInputContainer">
                      <span class="add-on"><i class="icon-cog"></i></span>
                        <select class="span4 foo" id="SelectUser" name="LoginLevel">
                            <?php include('includes/User-Levels.php') ?>
                        </select>
                    </div>
                </div>
              <div>

              <div class="input-prepend LoginInputContainer">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span4" type="text" name="LoginUser">
                  </div>
              </div>

              <div>
                  <div class="input-prepend LoginInputContainer">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input class="span5"  type="password" placeholder="*******"  name="LoginPassword">
                  </div>
              </div>
              
              <div class="input-prepend LoginInputContainer" id="Campaign">
                  <span class="add-on"><i class="icon-th-large"></i></span>
                  <select class="span4" name="LoginCampaign">
                          <optgroup>
                              <?php if(isset($CampaignResults)): ?>
                              <?php foreach($CampaignResults as $Campaigns){
                                   echo "<option value='{$Campaigns->CampaignName}'>{$Campaigns->CampaignName}</option>";
                              } ?>
                            <?php endif; ?>
                          </optgroup>
                  </select>                  
              </div>

        </div>
      <button class="btn span2" id="loginbutton" type="submit">Login</button>
      </form>
      <div id="LoginErrorContainer">

      </div>    

<?php include ('includes/footer.php') ?>