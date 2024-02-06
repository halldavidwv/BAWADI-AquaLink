$(document).ready(function () {
    $(document).on('click', "a[id^='next-step-button-']", function () {
      $("#next_step").empty();
      var stepValue = $(this).data('value');
      console.log(stepValue);
      switch(stepValue) {
        case "Phase-2-Step-1":
            $("#next_step").append("<h3>Before Proceeding</h3>");
            $("#next_step").append('<p class="lead">The following prerequisites need to be done by the agency before proceeding:</p>');
            $("#next_step").append('<legend>Please mark the checkbox in order to proceed</legend>');
            $("#next_step").append('<input id="phase-2-step-1-checkbox1" type="checkbox"><label for="phase-2-step-1-checkbox1">The applicant is already informed.</label>');
            $("#next_step").append('<div class="button-group">');
            $("#next_step").append('<button class="submit success button" name="next_step" value="next_step">Confirm</button>');
            $("#next_step").append('</div>');
            $("#next_step").append('');
            break;
      }
      });
  });
  
  