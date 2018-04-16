$(document).ready(function(){

  //Open the add fourm
  $('#showComment').click(function(){
    $('#commentForm').toggle();
    $('#commentContent').focus();
  });

  //Adding a comment
  $('#submitComment').click(function( event ){
    //Stop reload?
    event.preventDefault();
    // grab the data from the form
    var comment = $('#commentContent').val();

    // send form data via Ajax
    $.post(
      window.location.href + '/comment/add/process/',
      {
        comment: comment
      },
      function(data){
        if(data.success == 'success') {
          //var completedComment = $('<span class="columnSpan"><b>' + date + ' - ' + title + '</b></span><br>');
          //var fullContent = $('<span class="details">' + content + '</span><br><br>');
          //$('#insideInfoBox').load(document.URL +  ' #insideInfoBox');

          location = location;

          //$('#insideInfoBox').prepend(comment).prepend(data.comment_id);
          // add new content to events list
          //$('#events').prepend(fullContent).prepend(fullTitle);

          // now that we've submitted the form, hide it
          $('#commentForm').hide();
          $('#commentContent').value = '';
        } else {
          // server data wasn't saved successfully
          alert('Server error: ' + data.error);
        }
      })
      .fail(function(){
        // the Ajax call failed
        alert("Ajax call failed");
      });
   });

   //Deleting a comment
   $('.fieldOrderDel').click(function(){
     // grab the data from the form
     var button = $(this);
     var id = $(this).attr('id');

     // send form data via Ajax
     $.post(
       window.location.href + '/comment/delete/process/',
       {
         idCM: id
       },
       function(data){
         if(data.success == 'success') {
           // hide deleted
           $('#addEventForm').hide();
           button.hide();
         } else {
           // server data wasn't saved successfully
           alert('Server error: ' + data.error);
         }
       })
       .fail(function(){
         // the Ajax call failed
         alert("Ajax call failed");
       });
    });
});
