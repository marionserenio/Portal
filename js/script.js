//Script for Login Drop down
$(function(){
           var LoginUser = $('select#SelectUser');
              var CampaignSelect = $('#Campaign');

              CampaignSelect.hide();

              $(LoginUser).change(function(){
                    if((LoginUser.val()) == 'Agent' 
                      || (LoginUser.val()) == 'Client'
                      || (LoginUser.val()) == 'QA') {
                        $(CampaignSelect).slideDown(400);
                        console.log(this);
                    }else{ $(CampaignSelect).slideUp(400); }
              });
 });

// Ajax Load script for AdminUi
$(function AdminUiAjaxLoad(){
           $('#AdminOptions ul').find('a').on('click', function(e){
            var href  =   $(this).attr('href');
            var container = $('div#AdminFormContainer');
            container.load(href);
            e.preventDefault();
         })
});
//Select Placeholder

$(function SaveAgents(){
       $('form#AddAgentForm').live('submit', function(submitForm){
              $.ajax({
                  type:'POST',
                  url:'includes/AdminSaveAgent.php',
                  data:$(this).serialize(),
                  success: function(data){
                    console.log(data);
                        $(function ValidateShow(){
                            var ErrorContainer = $('#Append');
                            ErrorContainer.show().
                            empty().
                            append(data);
                        });
                  }
              })
          submitForm.preventDefault();
          });
});

function SaveAnotherAgent(){
      $('a#RemoveInput').live('click', function(){
            var container = $('div#AdminFormContainer');
            container.empty();  
            container.load('includes/AdminAddAgent.php');
      })
};

$(function SaveCampaign(){
       $('form#AddCampaignForm').live('submit', function(submitForm){
              $.ajax({
                  type:'POST',
                  url:'includes/AdminSaveCampaign.php',
                  data:$(this).serialize(),
                  success: function(data){
                    console.log(data);
                        $(function ValidateShow(){
                            var ErrorContainer = $('#Append');
                            ErrorContainer.show().
                            empty().
                            append(data);
                        });
                  }
              })
          submitForm.preventDefault();
          });
});


$(function SaveFFGScript(){
          $('form#FFG-Campaign').live('submit', function(FFGSave){
          $.ajax({
              type:'POST',
              url:'includes/saveFFG.php',
              data:$(this).serialize(),
              success:function(data){
                  $('#FFG-ErrorContainer').empty().
                  append(data);
                  console.log(data);
                  $('button#SaveFFGbutton').attr('id', 'SaveFFGbuttonAnother').
                  html('Refresh');
              }
          })
          FFGSave.preventDefault();
      });
});



$(function AdminRemoveInput(){
   $('a#RemoveInput').live('click', function(){
     var container = $('div#AdminFormContainer');
     container.empty();  
     container.load('includes/AdminAddAgent.php');
  });
});

$(function LoginScript(){
      $('form').live('submit', function(e){
            $.ajax({
                type: 'POST',
                url: 'includes/Login-redirect.php',
                data: $(this).serialize(),
                success: function(data){
                  $('#LoginErrorContainer').empty().append(data);
                }
            })
        e.preventDefault();
      });
});

$(function LoginOutScript(){
          $('button#MetaLogoutUser').on('click', function(){
          $.ajax({url:'includes/logout.php',
                success:function(){
                    alert('logout completed');
                    window.location.replace('index.php');
                }
          });
      });
});

// $(function LoadFFGLeadsQaRecordings(){
//             $('form#FFGQueryPhoneNumberFORM-QA').live('submit', function(SubmitFFGFormQA){
//       var input = $('form#FFG-Campaign input');
//           var InputArray = $.makeArray(input);
//             $.ajax({
//               type: 'POST',
//               url: 'includes/GetRecordings-FFG.php',
//               data :$(this).serialize(),
//               success: function(data){
//                   $(InputArray).each(function(){
//                       $(this).removeAttr('disabled');
//                   })
//             })
//             SubmitFFGFormQA.preventDefault();
//       });
// });

