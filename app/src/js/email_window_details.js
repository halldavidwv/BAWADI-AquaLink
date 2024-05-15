// This functionality is for building the window for email window whenever the email button is pressed.

$(document).ready(function () {
    $(document).on('click', "a[id^='email-window-button-']", function () {
      $("#email_window").empty();
      var stepID = $(this).attr('data-id');
      console.log(stepID);
      $.ajax ({
        url: 'src/php/email_window.php',
        method: 'POST',
        data: {
          stepID:stepID
        },
        success: function (data) {
          $("#email_window").empty();
          $("#email_window").html(data);
          $("#email_window").html(data).foundation();
          $("#email_window").html(data).foundation('open');
        }
      });
      });
  });
  
  