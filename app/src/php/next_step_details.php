<?php
include('connect_database.php');

$step_value = $_POST['stepValue'];
$step_id = $_POST['stepID'];

if(isset($step_value)) {
    switch($step_value) {
        case 'Phase-2-Step-1':
            echo '<br>';
            echo '<div class="cell auto">';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-2-step-1-checkbox-1">
                    <input id="prerequisite-checkbox-1" type="checkbox">
                    <b>The applicant is already informed.</b>
                </label>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div></form>';
            echo '</div>';
            break;
        case 'Phase-2-Step-2':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-2-step-2-checkbox-1">
                    <input id="prerequisite-checkbox-2" type="checkbox">
                    <b>The applicant passed the service line lay out.</b>
                </label><br>';
            echo '<label for="phase-2-step-2-checkbox-2">
                    <input id="prerequisite-checkbox-3" type="checkbox">
                    <b>The applicant passed all the requirements.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-2-Step-3':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-2-step-3-checkbox-1">
                    <input id="prerequisite-checkbox-4" type="checkbox">
                    <b>The applicant finished lay-out his/her service line.</b>
                </label><br>';
            echo '<label for="phase-2-step-3-checkbox-2">
                        <input id="prerequisite-checkbox-5" type="checkbox">
                        <b>The agency already transmitted the service line validation form to Production & Division for Inspection.</b>
                    </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-2-Step-4-Incomplete':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-2-step-4-incomplete-checkbox-1">
                    <input id="prerequisite-checkbox-5" type="checkbox">
                    <b>The agency completed the inspection of service line.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-2-Step-4-Complete':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-2-step-4-complete-checkbox-1">
                    <input id="prerequisite-checkbox-6" type="checkbox">
                    <b>The agency has contacted the applicant that the inspection of service line is complete.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-3-Step-1':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox and choose the tapping point that was proposed in the service line inspection in order to proceed</legend>';
            echo '<label for="phase-4-step-1-checkbox-1">Tapping Point</label>';
            echo '<select name="tapping-point" id="tapping-point" value="existing-tapping-point"">
                    <option value="existing-tapping-point">Existing Tapping Point</option>
                    <option value="proposed-tapping-point">Proposed Tapping Point</option>
                </select>';
            echo '<label for="phase-3-step-1-checkbox-1">
                    <input id="prerequisite-checkbox-7" type="checkbox">
                    <b>The applicant has signed the Contract for Water Services and Pays the corresponding water connection fees.</b>
                </label><br>';
            echo '<label for="phase-3-step-1-checkbox-2">
                    <input id="prerequisite-checkbox-8" type="checkbox">
                    <b>The agency accepts/receives payments.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-4-Step-1-Existing-Tapping':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-4-step-1-checkbox-1">
                    <input id="prerequisite-checkbox-9" type="checkbox">
                    <b>The agency installed the water service connection of the applicant.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
        case 'Phase-4-Step-1-Proposed-Tapping':
            echo '<br>';
            echo '<form action="src/php/next_step.php?id=' . $step_id . '" method="POST">';
            echo '<p class="lead">The following prerequisites need to be done by the agency/applicant before proceeding:</p>';
            echo '<legend>Please mark the checkbox in order to proceed</legend>';
            echo '<label for="phase-4-step-1-checkbox-1">
                    <input id="prerequisite-checkbox-9" type="checkbox">
                    <b>The agency installed the water service connection of the applicant.</b>
                </label><br>';
            echo '<div class="button-group">';
            echo '<button class="submit success button" id="next_step_confirm" name="next_step_confirm" value="next_step_confirm" disabled>Confirm</button></div>';
            echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></form>';
            break;
    }
}