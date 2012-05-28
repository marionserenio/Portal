
$(function LoadFFGLeads(){
            $('form#FFGQueryPhoneNumberFORM').live('submit', function(SubmitFFGForm){
      var input = $('form#FFG-Campaign input');
          var InputArray = $.makeArray(input);
            $.ajax({
              type: 'POST',
              url: 'includes/getFFG-campaign-leads.php',
              data :$(this).serialize(),
              success: function(data){       
                  $('body').append(data);
                  $('#SearchPhoneNumberFFG').attr('disabled', 'disabled').
                  html('disabled');
                  $('#SaveFFGbutton').removeAttr('disabled').
                  html('save');
                  $('#QueryPhoneNumberFFG').attr('disabled', 'disabled');
              }
            })
            SubmitFFGForm.preventDefault();
      });
});
