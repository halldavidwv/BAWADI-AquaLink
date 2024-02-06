$(document).ready(function () {
    $('#next-step-button').click(function () {
      var stepValue = $("a[id^='step-button-']").val();
      console.log(stepValue);
      switch(stepValue) {
        case "Phase-1-Step-1":
            $("#next_step").append("Test");
            break;
      }
      });
  });
  
  