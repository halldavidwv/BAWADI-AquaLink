$(document).ready(function () {
    $(document).on('click', 'input[id^="prerequisite-checkbox-"]', function () {
        if ($(this).is(':checked')) {
            $('button#next_step_confirm').prop('disabled', false);
        } else {
            $('button#next_step_confirm').prop('disabled', true);
        }
    });
});