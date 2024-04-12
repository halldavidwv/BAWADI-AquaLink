<?php

    $display_table_header = "<thead><tr>
                <th>Tracking Number</th>
                <th>Customer Name</th>
                <th>Home Address</th>
                <th>Email Address</th>
                <th>Progress</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
            </thead>";


    function display_table_body($row) {
      echo "<tr>";
        echo "<td>" 
                . $row['tracking_number'] . 
            "</td>";
        echo "<td>"
                . $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'] .   
            "</td>";
        echo "<td>"
                . $row['home_address_street'] . ", " . $row['home_address_city'] . 
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

    function display_table_body_with_email($row) {
      echo "<tr>";
        echo "<td>" 
                . $row['tracking_number'] . 
            "</td>";
        echo "<td>"
                . $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'] .
            "</td>";
        echo "<td>"
                . $row['home_address'] . 
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
                  <a id='email-window-button-" . $row['id'] . "' class='button' data-open='email_window' data-id='". $row['id'] . "'>
                    <i class='fa-solid fa-envelope fa-2xl'></i>
                  </a>
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

    function display_table_body_completed($row) {
      echo "<tr>";
        echo "<td>" 
                . $row['tracking_number'] . 
            "</td>";
        echo "<td>"
                . $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'] .
            "</td>";
        echo "<td>"
                . $row['home_address'] . 
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
              </td>
            </tr>";
    }
    function display_table_title($title) {
      echo "<h3>" . $title . "</h3>";
    }

    function generate_table($all_result) {
      $table = "";
    
      if (!empty($all_result)) {
        $table .= "<table>";
        display_table_header(); // Assuming this function exists to display headers
    
        while ($row = mysqli_fetch_assoc($all_result)) {
          if ($row['step'] == "Completed") {
            $table .= display_table_body_completed($row); // Assuming this function exists to display completed rows
          } else if ($row['step'] == "Phase-2-Step-4-Complete") {
            $table .= display_table_body_with_email($row); // Assuming this function exists to display rows with email
          } else {
            $table .= display_table_body($row); // Assuming this function exists to display regular rows
          }
        }
        $table .= "</table>";
      } else {
        $table = "<table>";
        display_table_header(); // Assuming this function exists to display headers
        $table .= "</table>";
      }
    
      return $table;
    }

?>