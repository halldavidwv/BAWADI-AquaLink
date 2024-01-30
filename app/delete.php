<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM water_installation WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: index.php');
    } else
        header('refresh:3;url:http://localhost/index.php');
        echo('Wrong ID!');
        echo("Click <a href='index.php'>here</a> to go back to main page.");
} else
    header('refresh:3;url:http://localhost/index.php');
    echo("ID not found!<br>");
    echo("Click <a href='index.php'>here</a> to go back to main page.");