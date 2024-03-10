<?php
include("../connect_database.php");

include("display_table_function.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
    // If the search value is a string for searching Customer Names
    if (is_string($search_value)) {
      $phase_3_step_1_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete' AND customer_name LIKE '%$search_value%' LIMIT 16");
    // If the search values is numeric for the searching tracking number.
    } if (is_numeric($search_value)) {
      $phase_3_step_1_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete' AND tracking_number LIKE '%$search_value%' LIMIT 8");
    }

    $phase_3_step_1_sql->execute();
    // Sending the query to the database using MySQLi
    $phase_3_step_1_result = $phase_3_step_1_sql->get_result();;

    // The output for the Phase 2 Step 4 Complete Table when search value is not empty 
    if (!empty($phase_3_step_1_result)) {
      echo "<h3>Phase 2 Step 4 Complete Table</h3>";
      echo "<table>";
      display_table_header();
      while ($row = mysqli_fetch_assoc($phase_3_step_1_result)) {
          display_table_body_with_email($row);
      }
      echo "</table>";
    }
    // The output of all the data from Phase 2 Step 4 Complete if there's no value in search box
} else {
    $phase_3_step_1_all_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete'");
    $phase_3_step_1_all_sql->execute();

    $phase_3_step_1_all_result = $phase_3_step_1_all_sql->get_result();;

    if (!empty($phase_3_step_1_all_result)) {
      echo "<h3>Phase 2 Step 4 Complete Table</h3>";
      echo "<table>";
      display_table_header();
      while ($row = mysqli_fetch_assoc($phase_2_step_4_complete_all_result)) {
          display_table_body_with_email($row);
      }
      echo "</table>";
    } else {
      echo "<h3>Phase 2 Step 4 Complete Table</h3>";
      echo "<table>";
      display_table_header();
      echo "</table>";
    }
}
