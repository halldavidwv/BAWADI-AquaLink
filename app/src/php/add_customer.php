<?php

include('connect_database.php');

if (isset($_POST['add_customer'])) {
  $tracking_number = random_int(10000000,99999999);
  $customer_name = $_POST['customer_name'];
  $email_address = $_POST['email_address'];
  $step = 'Phase-2-Step-1';

  $sql = $conn->prepare("INSERT INTO water_installation(tracking_number, customer_name, email_address, step) VALUES(?, ?, ?, ?)");
  $sql->bind_param("isss", $tracking_number, $customer_name, $email_address, $step);
  $sql->execute();

  if (!$sql) {
    die('Query Failed');
  } else {
    header('Location: ../../index.php');
  }
} else {
  die('Connection Failed!');
}


?>
