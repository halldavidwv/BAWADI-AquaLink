<?php

include('db.php');

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM water_installation WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $customer_name = $row['customer_name'];
    $step = $row['step'];
  }
}

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
	  $customer_name = $_POST['customer_name'];
    $email_address = $_POST['email_address'];

    $result = "UPDATE water_installation SET customer_name = '$customer_name', email_address = '$email_address' WHERE id = $id";
    $query = mysqli_query($conn, $result);

    if (!$query) {
      die('Query Failed');
    } else {
      header('Location: index.php');
    }
  } else {
    die('Connection Failed!');
  }

?>