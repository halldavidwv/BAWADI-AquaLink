<?php
include('db.php');

$step_value = $_POST['stepValue'];
$step_id = $_POST['stepID'];

if(isset($step_value)) {
    switch($step_value) {
        case 'Phase-2-Step-1':
            echo '<form action="next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<input id="prerequisite-checkbox-1" type="checkbox"><label for="phase-2-step-1-checkbox1">The applicant is already informed.</label>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div></form>';
            break;
    }
}