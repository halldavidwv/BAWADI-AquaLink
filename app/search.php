<?php
include("db.php");

$search_value = $_POST['search'];

if (isset($search_value)) {
  if (is_string($search_value)) {
    $sql = "SELECT * FROM water_installation WHERE customer_name LIKE '%$search_value%' LIMIT 16";
  }

  $sql = "SELECT * FROM water_installation WHERE tracking_number LIKE '%$search_value%' LIMIT 8";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['step'] == "Complete") {
        echo "<tr>";
        echo "<td>" . $row['tracking_number'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['step'] . " 
        <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
          <i class='fa-solid fa-circle-info fa-2xl'></i>
        </a>
        </td>";
        echo "<td>" . $row['time_updated'] . "</td>";
        echo "<td>
      <div class='tiny button-group align-center-middle'>
        <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-regular fa-pen-to-square fa-2xl'></i>
        </a>
        <a href='delete.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-solid fa-trash fa-2xl'></i>
        </a>
      </div>
    </td>";
        echo "</tr>";
      } else {
        echo "<tr>";
        echo "<td>" . $row['tracking_number'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['step'] . " 
        <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
          <i class='fa-solid fa-circle-info fa-2xl'></i>
        </a>
        </td>";
        echo "<td>" . $row['time_updated'] . "</td>";
        echo "<td>
      <div class='tiny button-group align-center-middle'>
        <a id='next-step-button' class='button'>
          <i class='fa-solid fa-forward-step fa-2xl'></i>
        </a>
        <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-regular fa-pen-to-square fa-2xl'></i>
        </a>
        <a href='delete.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-solid fa-trash fa-2xl'></i>
        </a>
      </div>
    </td>";
        echo "</tr>";
      }
    }
  }
} else {
  $sql = "SELECT * FROM water_installation";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['step'] == "Complete") {
        echo "<tr>";
        echo "<td>" . $row['tracking_number'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['step'] . " 
        <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
          <i class='fa-solid fa-circle-info fa-2xl'></i>
        </a>
        </td>";
        echo "<td>" . $row['time_updated'] . "</td>";
        echo "<td>
      <div class='tiny button-group align-center-middle'>
        <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-regular fa-pen-to-square fa-2xl'></i>
        </a>
        <a href='delete.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-solid fa-trash fa-2xl'></i>
        </a>
      </div>
    </td>";
        echo "</tr>";
      } else {
        echo "<tr>";
        echo "<td>" . $row['tracking_number'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['step'] . " 
        <a id='step-button-" . $row['id'] . "' data-open='step_details_window' data-value='" . $row['step'] . "'>
          <i class='fa-solid fa-circle-info fa-2xl'></i>
        </a>
        </td>";
        echo "<td>" . $row['time_updated'] . "</td>";
        echo "<td>
      <div class='tiny button-group align-center-middle'>
        <a id='next-step-button-" . $row['id'] . "' data-open='next_step_window' data-value='" . $row['step'] . "'>
          <i class='fa-solid fa-forward-step fa-2xl'></i>
        </a>
        <a href='edit_button.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-regular fa-pen-to-square fa-2xl'></i>
        </a>
        <a href='delete.php?id=" . $row['id'] . "' class='button'>
          <i class='fa-solid fa-trash fa-2xl'></i>
        </a>
      </div>
    </td>";
        echo "</tr>";
      }
    }
  }
}
