<?php

include('connect_database.php');

// This functionality is to add customer according to the data sent by the admin in the system.
if (isset($_POST['add_customer'])) {
  $tracking_number = random_int(10000000,99999999);
  $first_name = strtoupper($_POST['first_name']);
  $middle_name = strtoupper($_POST['middle_name']);
  $last_name = strtoupper($_POST['last_name']);
  $home_address_street = strtoupper($_POST['home_address_street']);
  $home_address_city = strtoupper($_POST['home_address_city']);
  $email_address = $_POST['email_address'];
  $step = 'Phase-2-Step-1';

  $sql = $conn->prepare("INSERT INTO water_installation(tracking_number, first_name, last_name, middle_name, home_address_street, home_address_city, email_address, step) VALUES($tracking_number, '$first_name', '$last_name', '$middle_name', '$home_address_street', '$home_address_city', '$email_address', '$step')");
  if(!$sql){
    echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
  }
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
