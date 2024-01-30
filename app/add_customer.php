<?php

include('db.php');

if (isset($_POST['add_customer'])) {
  $tracking_number = random_int(10000000,99999999);
  $customer_name = $_POST['customer_name'];
  $email_address = $_POST['email_address'];
  $step = 'Phase-2-Step-1';

  $sql = "INSERT INTO water_installation(tracking_number, customer_name, email_address, step) VALUES('$tracking_number', '$customer_name', '$email_address', '$step')";
  $query = mysqli_query($conn, $sql);

  if (!$query) {
    die('Query Failed');
  } else {
    header('Location: index.php');
  }
} else {
  die('Connection Failed!');
}


?>
