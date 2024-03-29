<?php

include('connect_database.php');

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = $conn->prepare("SELECT customer_name, step FROM water_installation WHERE id = ?");
  $sql->bind_param("i", $id);
  $sql->execute();

  $result = $sql->get_result();
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

    $result = $conn->prepare("UPDATE water_installation SET customer_name = ?, email_address = ? WHERE id = ?");
    $result->bind_param('ssi', $customer_name, $email_address, $id);
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