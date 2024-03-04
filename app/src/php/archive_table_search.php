<?php
include("connect_database.php");

// Get the search value from the search box
$search_value = $_POST['searchData'];

// When there's a value in the search box
if (isset($search_value)) {
  // If the search value is a string for searching Customer Names
  if (is_string($search_value)) {
    $archive_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Complete' AND time_updated < NOW() - INTERVAL 2 DAY AND customer_name LIKE '%$search_value%' LIMIT 16");
  // If the search values is numeric for the searching tracking number.
  } if (is_numeric($search_value)) {
    $archive_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Complete' AND time_updated < NOW() - INTERVAL 2 DAY AND tracking_number LIKE '%$search_value%' LIMIT 8");
  }

  $archive_sql->execute();
  // Sending the query to the database using MySQLi
  $archive_result = $archive_sql->get_result();;

  // The output for the Main Table 
  if (!empty($archive_result)) {
    echo "<thead><tr>
                <th>Tracking Number</th>
                <th>Customer Name</th>
                <th>Email Address</th>
                <th>Step/Progress</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
            </thead>";
    while ($row = mysqli_fetch_assoc($archive_result)) {
      // Output for the Complete Step
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
    }
  }
  // The output of all the data if there's no value in search box
} else {
  $all_sql = $conn->prepare("SELECT * FROM water_installation WHERE step = 'Complete' AND time_updated < NOW() - INTERVAL 2 DAY");
  $all_sql->execute();

  $all_result = $all_sql->get_result();

  if (!empty($all_result)) {
    echo "<thead><tr>
                <th>Tracking Number</th>
                <th>Customer Name</th>
                <th>Email Address</th>
                <th>Step/Progress</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
            </thead>";
    while ($row = mysqli_fetch_assoc($all_result)) {
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
    }
  }
}
