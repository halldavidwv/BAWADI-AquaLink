<?php

include('connect_database.php');

// This functionality will get the user details according to the ID, and change the details from the redirected page.
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = $conn->prepare("SELECT first_name, last_name, middle_name, home_address_street, home_address_city, step FROM water_installation WHERE id = ?");
  if(!$sql) {
        echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
  }
  $sql->bind_param("i", $id);
  $sql->execute();

  $result = $sql->get_result();
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $middle_name = $row['middle_name'];
    $home_address_street = $row['home_address_street'];
    $home_address_city = $row['home_address_street'];
    $step = $row['step'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $first_name = strtoupper($_POST['first_name']);
  $middle_name = strtoupper($_POST['middle_name']);
  $last_name = strtoupper($_POST['last_name']);
  $home_address_street = strtoupper($_POST['home_address_street']);
  $home_address_city = strtoupper($_POST['home_address_city']);
  $email_address = $_POST['email_address'];

  $result = $conn->prepare("UPDATE water_installation SET first_name = ?, last_name = ?, middle_name = ?, home_address_street = ?, home_address_city = ?, email_address = ? WHERE id = ?");
  $result->bind_param('ssssssi', $first_name, $last_name, $middle_name, $home_address_street, $home_address_city, $email_address, $id);
  $result->execute();

  if (!$result) {
    die('Query Failed');
  } else {
    header('Location: ../../index.php');
  }
} else {
  die('Connection Failed!');
}
