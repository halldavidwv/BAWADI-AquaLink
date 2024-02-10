$(document).ready(function () {
    $(document).on('click', '#next_step', function () {

        var checkboxes = $(this).find('input[id^="prerequisite-checkbox-"]');
        var confirm_button = $("#next_step_confirm");

        if (checkboxes.length === 1) {
            confirm_button.prop('disabled', !checkboxes.is(":checked"));
        } else {
            var allChecked = true;

            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked) {
                  allChecked = false;
                  break;
                }
              }
              confirm_button.prop('disabled', !allChecked);

        }
    });
});