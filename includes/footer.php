   <footer>
        <p><span class="Portal">Portal</span> - ICC Internal Tool - Created by Marion</p>
    </footer>
 </div> <!--! end of container-fluid -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="js/jquery-1.7.2.min.js"></script>
  <?php 
if(isset($_SESSION['Level'])){
    if(($_SESSION['Level']) == "Agent"){
    echo "<script type=\"text/javascript\" src=\"js\LoadFFGLeads.js\"></script>";
    } 
  }?>

  <?php 

   if(isset($_SESSION['Level'])){
    if(($_SESSION['Level']) == "QA"){
    echo "<script type=\"text/javascript\" src=\"js\LoadFFGLeadsQA.js\"></script>";
    } 
   }
   ?>


  <script src="js/bootstrap-modal.js"></script>
  <script src="js/bootstrap-transition.js"></script>
  <script src="js/knockout-2.0.0.js"></script> 
  <script>
      $('input#ListName').on('click', function(){
        $(this).attr('disabled', 'disabled');
      });

       $('input#LeadType').on('click', function(){
        $(this).attr('disabled', 'disabled');
      });

       $('button#SaveFFGbuttonAnother').live('click', function(){
        window.location.replace('FFG-Campaign.php');
      });



       $('form#GetFFGRecording').on('submit', function(e){
        var button = $('#GetFFGRecording button');
          $.ajax({
            type:'POST',
            url:'includes/GetRecordings-FFG.php',
            data:$(this).serialize(),
            success:function(data){
                $('#GetFFGRecordingDate').attr('disabled', 'disabled');
                $('section#RecordingModal .modal-body ul').append(data);
                button.attr('id', 'ModalRecordingButton');
                button.attr('data-toggle', 'modal');
                button.attr('href', '#RecordingModal');
                button.html('View Recording <i class="icon-headphones icon-white"></i>');
            }
          })
          e.preventDefault();
       });


       $('button#ModalRecordingButton').on('click', function(){
            $('section#RecordingModal').modal();
       });
  </script>
  <!--<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- <script type="text/javascript" src="js/jquersy.nivo.ssslider.pack.js"></script>-->
</body>
</html>

