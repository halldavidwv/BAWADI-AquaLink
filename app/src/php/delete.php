<?php
include("connect_database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare("DELETE FROM water_installation WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();

    if ($sql) {
        header('Location: ../../index.php');
    } else
        header('refresh:3;url:http://localhost/index.php');
        echo('Wrong ID!');
        echo("Click <a href='index.php'>here</a> to go back to main page.");
} else
    header('refresh:3;url:http://localhost/index.php');
    echo("ID not found!<br>");
    echo("Click <a href='index.php'>here</a> to go back to main page.");