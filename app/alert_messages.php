<?php

session_start();

if (isset($_SESSION['next_step_complete'])) {
    echo '<div class="callout success" data-closeable>';
    echo "<h5>Test</h5>";
    echo '<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>';
    echo "</div>";
    unset($_SESSION['next_step_complete']);
}

?>