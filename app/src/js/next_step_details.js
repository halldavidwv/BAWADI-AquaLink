$(document).ready(function () {
    $(document).on('click', "a[id^='next-step-button-']", function () {
      $("#next_step").empty();
      var stepValue = $(this).data('value');
      var stepID = $(this).attr('data-id');
      console.log(stepValue);
      console.log(stepID);
      $.ajax ({
        url: 'next_step_details.php',
        method: 'POST',
        data: {
          stepValue:stepValue,
          stepID:stepID
        },
        success: function (data) {
          $("#next_step").empty();
          $("#next_step").html(data);
          $("#next_step").html(data).foundation();
          $("#next_step").html(data).foundation('open');
        }
      });
      });
  });
  
  