<?php

include('connect_database.php');

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = $conn->prepare("SELECT first_name, last_name, middle_name, home_address, step FROM water_installation WHERE id = ?");
  $sql->bind_param("i", $id);
  $sql->execute();

  $result = $sql->get_result();
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $middle_name = $row['middle_name'];
    $home_address = $row['home_address'];
    $step = $row['step'];
  }
}

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
	  $first_name = strtoupper($_POST['first_name']);
    $last_name = strtoupper($_POST['last_name']);
    $middle_name = strtoupper($_POST['middle_name']);
    $home_address = $_POST['home_address'];
    $email_address = $_POST['email_address'];

    $result = $conn->prepare("UPDATE water_installation SET first_name = ?, last_name = ?, middle_name = ?, home_address = ?, email_address = ? WHERE id = ?");
    $result->bind_param('sssssi', $first_name, $last_name, $middle_name, $home_address, $email_address, $id);
    $result->execute();

    if (!$result) {
      die('Query Failed');
    } else {
      header('Location: ../../index.php');
    }
  } else {
    die('Connection Failed!');
  }

?>