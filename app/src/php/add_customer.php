<?php

include('connect_database.php');

if (isset($_POST['add_customer'])) {
  $tracking_number = random_int(10000000,99999999);
  $first_name = strtoupper($_POST['first_name']);
  $middle_name = strtoupper($_POST['middle_name']);
  $last_name = strtoupper($_POST['last_name']);
  $home_address = $_POST['home_address'];
  $email_address = $_POST['email_address'];
  $step = 'Phase-2-Step-1';

  $sql = $conn->prepare("INSERT INTO water_installation(tracking_number, first_name, last_name, middle_name, home_address, email_address, step) VALUES($tracking_number, '$first_name', '$last_name', '$middle_name', '$home_address', '$email_address', '$step')");
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
