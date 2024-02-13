<?php
include("db.php");

// Get the search value from the search box
$search_value = $_POST['search'];

// When there's a value in the search box
if (isset($search_value)) {
    // If the search value is a string for searching Customer Names
    if (is_string($search_value)) {
        $phase_2_step_4_complete_sql = "SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete', customer_name LIKE '%$search_value%' LIMIT 16";
    }

    // Query for the needed values for the table.
    $phase_2_step_4_complete_sql = "SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete', customer_name LIKE '%$search_value%' LIMIT 8";

    // Sending the query to the database using MySQLi
    $phase_2_step_4_complete_result = mysqli_query($conn, $phase_2_step_4_complete_sql);

    // The output for the Main Table 
    if (mysqli_num_rows($phase_2_step_4_complete_result) > 0) {
        while ($row = mysqli_fetch_assoc($phase_2_step_4_complete_result)) {
        // Output for Phase 2 Step 4 Complete Table
        echo "<thead>";
        echo "<tr>
                <th>Tracking Number</th>
                <th>Customer Name</th>
                <th>Email Address</th>
                <th>Step/Progress</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
            </thead>
        ";
        echo "";
        echo "<tr>";
        echo "<td>" 
                . $row['tracking_number'] . 
            "</td>";
        echo "<td>"
                . $row['customer_name'] . 
            "</td>";
        echo "<td>"
                . $row['email_address'] .
            "</td>";
        echo "<td>"
                . $row['step'] . " 
              <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
                <i class='fa-solid fa-circle-info fa-2xl'></i>
              </a>
              </td>";
        echo "<td>" 
                . $row['time_updated'] . 
             "</td>";
        echo "<td>
                <div class='tiny button-group align-center-middle'>
                  <a id='next-step-button-" . $row['id'] . "' class='button' data-value='" . $row['step'] . "' data-id='". $row['id'] . "'>
                    <i class='fa-solid fa-forward-step fa-2xl'></i>
                  </a>
                  <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td>
            </tr>";
        }
    }
    // The output of all the data if there's no value in search box
} else {
    $phase_2_step_4_complete_sql = "SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete'";

    $phase_2_step_4_complete_result = mysqli_query($conn, $phase_2_step_4_complete_sql);

    if (mysqli_num_rows($phase_2_step_4_complete_result) > 0) {
        while ($row = mysqli_fetch_assoc($phase_2_step_4_complete_result)) {
          echo "<h3>Phase 2 Step 4 Complete Table</h3>";
        echo "<thead>";
        echo "<tr>
                <th>Tracking Number</th>
                <th>Customer Name</th>
                <th>Email Address</th>
                <th>Step/Progress</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
        ";
        echo "";
        echo "<tr>";
        echo "<td>" 
                . $row['tracking_number'] . 
            "</td>";
        echo "<td>"
                . $row['customer_name'] . 
            "</td>";
        echo "<td>"
                . $row['email_address'] .
            "</td>";
        echo "<td>"
                . $row['step'] . " 
              <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
                <i class='fa-solid fa-circle-info fa-2xl'></i>
              </a>
              </td>";
        echo "<td>" 
                . $row['time_updated'] . 
             "</td>";
        echo "<td>
                <div class='tiny button-group align-center-middle'>
                  <a id='next-step-button-" . $row['id'] . "' class='button' data-value='" . $row['step'] . "' data-id='". $row['id'] . "'>
                    <i class='fa-solid fa-forward-step fa-2xl'></i>
                  </a>
                  <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td>
            </tr>";
        }
    }
}
