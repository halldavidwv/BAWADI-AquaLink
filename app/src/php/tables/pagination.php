<?php

    include("../connect_database.php");

    if (isset($_GET['page_number']) && $_GET['page_number'] != "") {
        $page_number = $_GET['page_number'];

    } else {
        $page_number = 1;
    }

    $total_records_per_page = 10;

    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_number -1;
    $next_page = $page_number + 1;
    $adjacents = 2;

    $result_count = $conn->prepare("SELECT COUNT(*) AS total_records FROM water_installation");
    $result_count->execute();
    $result_count_executed = $result_count->get_result();

    $total_records = mysqli_fetch_array($result_count_executed);
    $total_records = $total_records['total_records'];
    $total_number_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_number_of_pages - 1;

    function display_current_page($page_number, $total_number_of_pages) {
        echo "Page ". $page_number . " of ". $total_number_of_pages;
    }

    function display_pagination($page_number, $total_number_of_pages) {
        echo '<nav aria-label="Pagination">
                <ul class="pagination">';
        if ($page_number > 1) {
            echo '';
        }
    }

?>