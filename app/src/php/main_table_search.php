<?php
include("connect_database.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
  // If the search value is a string for searching Customer Names
  if (is_string($search_value)) {
    $all_sql = $conn->prepare("SELECT * FROM water_installation WHERE customer_name LIKE '%$search_value%' LIMIT 16");
  // If the search values is numeric for the searching tracking number.
  } if (is_numeric($search_value)) {
    $all_sql = $conn->prepare("SELECT * FROM water_installation WHERE tracking_number LIKE '%$search_value%' LIMIT 8");
  }

  $all_sql->execute();
  // Sending the query to the database using MySQLi
  $all_result = $all_sql->get_result();;

  // The output for the Main Table 
  if (!empty($all_result)) {
    while ($row = mysqli_fetch_assoc($all_result)) {
      // Output for the Complete Step
      if ($row['step'] == "Complete") {
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
                  <a href='src/php/edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='src/php/delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td></tr>";
      } else {
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
                  <a href='src/php/edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='src/php/delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td>
            </tr>";
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
      if ($row['step'] == "Complete") {
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
                  <a href='src/php/edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='src/php/delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td></tr>";
      } else {
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
                  <a href='src/php/edit_button.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-regular fa-pen-to-square fa-2xl'></i>
                  </a>
                  <a href='src/php/delete.php?id=" . $row['id'] . "' class='button'>
                    <i class='fa-solid fa-trash fa-2xl'></i>
                  </a>
                </div>
              </td>
            </tr>";
      }
    }
  }
}
