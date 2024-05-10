<?php
include("../connect_database.php");

include("display_table_function.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
  // If the search value is a string for searching Customer Names
  if (is_string($search_value)) {
    $phase_2_step_4_incomplete_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Incomplete' AND (CONCAT(first_name, ' ', last_name, ' ', middle_name) LIKE '%$search_value%') ORDER BY time_updated DESC");
    // If the search values is numeric for the searching tracking number.
  }
  if (is_numeric($search_value)) {
    $phase_2_step_4_incomplete_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Incomplete' AND tracking_number LIKE '%$search_value%' ORDER BY time_updated DESC");
  }

  $phase_2_step_4_incomplete_sql->execute();
  // Sending the query to the database using MySQLi
  $phase_2_step_4_incomplete_result = $phase_2_step_4_incomplete_sql->get_result();;

  // The output for the Main Table 
  if (!empty($phase_2_step_4_incomplete_result)) {
    echo "<h3>Phase 2 Step 4 Incomplete Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    while ($row = mysqli_fetch_assoc($phase_2_step_4_incomplete_result)) {
      display_table_body($row);
    }
    echo "</table>";
  } else {
    echo "<h3>Phase 2 Step 4 Incomplete Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    echo "</table>";
  }
  // The output of all the data if there's no value in search box
} else {
  $phase_2_step_4_incomplete_all_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Incomplete' ORDER BY time_updated DESC");
  $phase_2_step_4_incomplete_all_sql->execute();

  $phase_2_step_4_incomplete_all_result = $phase_2_step_4_incomplete_all_sql->get_result();

  if (!empty($phase_2_step_4_incomplete_all_result)) {
    echo "<h3>Phase 2 Step 4 Incomplete Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    while ($row = mysqli_fetch_assoc($phase_2_step_4_incomplete_all_result)) {
      display_table_body($row);
    }
    echo "</table>";
  } else {
    echo "<h3>Phase 2 Step 4 Incomplete Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    echo "</table>";
  }
}
