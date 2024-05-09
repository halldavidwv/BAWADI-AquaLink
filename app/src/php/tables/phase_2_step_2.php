<?php
include("../connect_database.php");

include("display_table_function.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
  // If the search value is a string for searching Customer Names
  if (is_string($search_value)) {
    $phase_2_step_2_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-2' AND (first_name LIKE '%$search_value%') OR (last_name LIKE '%$search_value%') OR (middle_name LIKE '%$search_value%') ORDER BY time_updated DESC");
    // If the search values is numeric for the searching tracking number.
  }
  if (is_numeric($search_value)) {
    $phase_2_step_2_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-2' AND tracking_number LIKE '%$search_value%' ORDER BY time_updated DESC");
  }

  $phase_2_step_2_sql->execute();
  // Sending the query to the database using MySQLi
  $phase_2_step_2_result = $phase_2_step_2_sql->get_result();;

  // The output for the Main Table 
  if (!empty($phase_2_step_2_result)) {
    echo "<h3>Phase 2 Step 2 Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    while ($row = mysqli_fetch_assoc($phase_2_step_2_result)) {
      display_table_body($row);
    }
    echo "</table>";
  } else {
    echo "<h3>Phase 2 Step 2 Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    echo "</table>";
  }
  // The output of all the data if there's no value in search box
} else {
  $phase_2_step_2_all_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Phase-2-Step-2' ORDER BY time_updated DESC");
  $phase_2_step_2_all_sql->execute();

  $phase_2_step_2_all_result = $phase_2_step_2_all_sql->get_result();

  if (!empty($phase_2_step_2_all_result)) {
    echo "<h3>Phase 2 Step 2 Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    while ($row = mysqli_fetch_assoc($phase_2_step_2_all_result)) {
      display_table_body($row);
    }
    echo "</table>";
  } else {
    echo "<h3>Phase 2 Step 2 Table</h3>";
    echo "<br>";
    echo "<table>";
    display_table_header();
    echo "</table>";
  }
}
