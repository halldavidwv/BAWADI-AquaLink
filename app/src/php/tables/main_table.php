<?php

include("../connect_database.php");

include("display_table_function.php");

$all_sql = $conn->prepare("SELECT * FROM water_installation");
$all_sql->execute();

$all_result = $all_sql->get_result();

if (!empty($all_result)) {
    echo "<h3>Main Table</h3>";
    while ($row = mysqli_fetch_assoc($all_result)) {
        if ($row['step'] == "Completed") {
            echo "<table>";
            display_table_header();
            display_table_body($row);
            echo "</table>";
        }
        if ($row['step'] == "Phase-2-Step-4-Complete") {
            echo "<table>";
            display_table_header();
            display_table_body($row);
            echo "</table>";
        } else {
            echo "<table>";
            display_table_header();
            display_table_body($row);
            echo "</table>";
        }
    }
} else {
    display_table_header();
}