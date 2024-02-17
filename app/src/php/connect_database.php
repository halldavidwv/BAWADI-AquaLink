<?php

require_once "credentials.php";

$conn = mysqli_connect(
  $DB_HOST,
  $DB_USERNAME,
  $DB_PASSWORD,
  $DB_NAME
) or die(mysqli_error($mysqli));

?>
