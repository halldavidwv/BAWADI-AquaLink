<?php
include("../connect_database.php");

include("display_table_function.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
  // If the search value is a string for searching Customer Names
  if (is_string($search_value)) {
    $all_sql = $conn->prepare("SELECT * FROM water_installation WHERE customer_name LIKE '%$search_value%' LIMIT 16");
    // If the search values is numeric for the searching tracking number.
  }
  if (is_numeric($search_value)) {
    $all_sql = $conn->prepare("SELECT * FROM water_installation WHERE tracking_number LIKE '%$search_value%' LIMIT 8");
  }

  $all_sql->execute();
  // Sending the query to the database using MySQLi
  $all_result = $all_sql->get_result();
  ;

  // The output for the Main Table 
  if (!empty($all_result)) {
    while ($row = mysqli_fetch_assoc($all_result)) {
      // Output for the Complete Step
      if ($row['step'] == "Completed") {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      }
      if ($row['step'] == "Phase-2-Step-4-Complete") {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      } else {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      }
    }
  }
  // The output of all the data if there's no value in search box
} else {
  $all_sql = $conn->prepare("SELECT * FROM water_installation");
  $all_sql->execute();

  $all_result = $all_sql->get_result();

  if (!empty($all_result)) {
    while ($row = mysqli_fetch_assoc($all_result)) {
      if ($row['step'] == "Completed") {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      }
      if ($row['step'] == "Phase-2-Step-4-Complete") {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      } else {
        echo "<table>";
        display_table_header();
        display_table_body($row);
        echo "</table>";
      }
    }
  }
}
