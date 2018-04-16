$(document).ready(function(){

    // Show login form:
    $('#loginButton').click(function(){
      $('#inputCredentialsForm').show();
      $('#loginButton').hide();
      $('#signupButton').hide();
      $('#userName').focus();
    });

    // Show edit info form:
    $('#editInfoButton').click(function(){
      $('#inputNewInfo').toggle();
      $('#description').focus();
    });

    // Show edit user button:
    $('#editUserButton').click(function(){
      $('#editInfo').toggle();
    });

    // Show add event button:
    $('#addEventButton').click(function(){
      $('#addEventForm').toggle(); // show the form
      $('#eventYear').focus(); // position cursor at event year

      // clear the text boxes
      $('#addEventForm').find('.text').each(function(){
        $(this).val('');
      });
    });
}); // End JScript
