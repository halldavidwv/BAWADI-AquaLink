$(document).ready(function () {
  $(document).on("click", "a[id^='step-button-']", function () {
    var stepValue = $(this).data('value');
    console.log(stepValue);
    $('#step_details').empty();
    switch (stepValue) {
      case 'Phase-2-Step-1':
        $('#step_details').append('<h3>Phase 2: Initial Inspection</h3>');
        $('#step_details').append(
          '<p class="lead">Conduct inspection and advise/inform the applicant the standards in the proper lay-out of service line from tapping point to residence.</p>'
        );
        break;
      case 'Phase-2-Step-2':
        $('#step_details').append('<h3>Phase 2: Initial Inspection</h3>');
        $('#step_details').append(
          '<p class="lead">Upon receipt of the inspection report, applicant complies with all the requirements and remarks indicated therein (i.e., service line lay out)</p>'
        );
        break;
      case 'Phase-2-Step-3':
        $('#step_details').append('<h3>Phase 2: Initial Inspection</h3>');
        $('#step_details').append(
          '<p class="lead">Applicant lays-out his service line and informs CSA upon completion</p>'
        );
        break;
      case 'Phase-2-Step-4-Incomplete':
        $('#step_details').append('<h3>Phase 2: Initial Inspection</h3>');
        $('#step_details').append(
          '<p class="lead">Inspecting of service line</p>'
        );
        break;
      case 'Phase-2-Step-4-Complete':
        $('#step_details').append('<h3>Phase 2: Initial Inspection</h3>');
        $('#step_details').append(
          '<p class="lead">The inspection is complete. Please after selecting this step, send an email/sms to customer.</p>'
        );
        break;
      case 'Phase-3-Step-1':
        $('#step_details').append('<h3>Phase 3: Payment of Fees</h3>');
        $('#step_details').append(
          '<p class="lead">Applicant signs the Contract for Water Services and pays the corresponding water connection fees at the Tellers’ Booth</p>'
        );
        break;
      case 'Phase-4-Step-1':
        $('#step_details').append('<h3>Phase 4: Installation</h3>');
        $('#step_details').append(
          '<p class="lead">Applicant acknowledges the service connection installation</p>'
        );
        break;
      case 'Complete':
        $('#step_details').append('<h3>Water Installation Complete</h3>');
        $('#step_details').append(
          '<p class="lead">This indicates that the Water Installation Process is complete.</p>'
        );
        break;
      default:
        $('#step_details').append('<h3>Please Select a Step to show details.</h3>');
    }
  });
  $('#step_details').empty();
});