<?php
include("db.php");
require 'vendor/autoload.php';

use Carbon\Carbon;

// Function for expected time, by parsing the timestamp from the query, then add the expected days variable inside the step, and format it using date_format to proper data format for easier readability
function expected_time ($timestamp, $add_days) {
    $deadline_date_minimum = Carbon::parse($timestamp);
    $deadline_date_maximum = Carbon::parse($timestamp);
    
    $deadline_date_minimum->addDays($add_days);
    $add_days++;
    $deadline_date_maximum->addDays($add_days);

    $deadline_day_minimum = date_format($deadline_date_minimum, 'F d, Y');
    $deadline_day_maximum = date_format($deadline_date_maximum, 'F d, Y');

    echo $deadline_day_minimum . " - " . $deadline_day_maximum;
}

if (isset($_GET['tracking_number'])) {
    $tracking_number = $_GET['tracking_number'];
    $query = "SELECT * FROM water_installation WHERE tracking_number = $tracking_number";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 0) {
        echo "<h3>Tracking Number Does Not Exist</h3>";
    } else {
        $customer_name = $row['customer_name'];
        $step = $row['step'];
        $time_updated = $row['time_updated'];

        echo "<br>";
        echo "<h3>Customer Details</h3>";
        echo "<br>";
        echo "<text><b>Customer Name:</b> $customer_name</text>";
        echo "<br>";
        switch ($step) {
            case 'Phase-2-Step-1':
                $expected_days = 1;
                echo "<text><b>Step: </b>Phase 2: Initial Inspection</b></text>";
                echo "<p><i>Conduct inspection and advise/inform the applicant the standards in the proper lay-out of service line from tapping point to residence.</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-2-Step-2':
                echo "<text><b>Step: </b>Phase 2: Initial Inspection</b></text>";
                echo "<p><i>Please comply with all the requirements and remarks indicated therein.</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>Depends on Customer-Applicant Schedule</text><br>";
                break;
            case 'Phase-2-Step-3':
                $expected_days = 1;
                echo "<text><b>Step: </b>Phase 2: Initial Inspection</b></text>";
                echo "<p><i>Validating service line lay-out. Expect new process after business day</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-2-Step-4-Incomplete':
                $expected_days = 1;
                echo "<text><b>Step: </b>Phase 2: Initial Inspection</b></text>";
                echo "<p><i>Inspecting service line laid out. Please wait for an email.</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-2-Step-4-Complete':
                $expected_days = 1;
                echo "<text><b>Step: </b>Phase 2: Initial Inspection</b></text>";
                echo "<p><i>Service line approved. Please wait for the updated step</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-3-Step-1':
                $expected_days = 1;
                echo "<text><b>Step: </b>Phase 3: Payment of Fees</b></text>";
                echo "<p><i>Please go to the Tellers' Booth to sign the contract for Water Services and pay the corresponding water connection fees. Click the View Bill button for Bill Details.</i></p>";
                echo '<a class="button" data-open="installation_bill_window">View Bill</a><br>';
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-4-Step-1-Existing-Tapping':
                $expected_days = 9;
                echo "<text><b>Step: </b>Phase 4: Installation</text>";
                echo "<p><i>The service connection installation is ongoing. Expect completion until 7 working days.</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;
            case 'Phase-4-Step-1-Proposed-Tapping':
                $expected_days = 17;
                echo "<text><b>Step: </b>Phase 4: Installation</text>";
                echo "<p><i>The service connection installation is ongoing. Expect completion until 15 working days.</i></p>";
                echo "<text><b>Expect Day to Finish:</b></text><br>" ;
                echo "<text>" . expected_time($time_updated, $expected_days) . "</text><br>";
                break;      
            case 'Complete':
                echo "<text><b>Step: </b>Water Installation Complete</b></text>";
                echo "<br>";
                break;
        }
        
        // Carbon is used to parse the TIMESTAMP from the query and format it to a proper date format for easier readability.
        echo "<text><b>Day Updated: </b>" . date_format(Carbon::parse($time_updated), 'F d, Y') . "</text>";
    }
}
