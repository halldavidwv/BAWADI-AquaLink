<?php include("src/php/connect_database.php"); ?>

<?php include("includes/index_header.php"); ?>

<body>
    <div class="grid-container">
        <div class="grid-y" style="background-image: url(includes/trybg.png);">
            <h1>
                <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img
                        src="https://baguiowaterdistrict.gov.ph/wp-content/uploads/2020/10/masthead.png" /></a>
            </h1>
        </div>
        <div class="container-banner banner-pads">
            <div class="grid-y text-center">
                <header>
                    <h1 class="entry-title">Water Installation Tracker Admin Dashboard</h1>
                </header>
            </div>
        </div>
        <br>
        <div class="top-bar stacked-for-medium">
            <div class="top-bar-left">
                <ul class="menu">
                    <li>
                        <a data-open="add_button">
                            Add New Customer
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li>
                        <input name='tracking_number_search' id="tracking_number_search" type="search"
                            placeholder="Name / Tracking Number">
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="grid-container full">
            <div class="grid-y grid-margin-y" id="content">
                <div class="cell small-4 medium-6 large-2">
                    <label for="">Table Filter:
                        <select name="select_display_table" id="select_display_table">
                            <option value="main-table">Main Table</option>
                            <option value="phase-2-step-1-table"></option>
                            <option value="phase-2-step-2-table"></option>
                            <option value="phase-2-step-3-table"></option>
                            <option value="phase-2-step-4-incomplete-table"></option>
                            <option value="phase-2-step-4-complete-table"></option>
                            <option value="phase-3-step-1-table"></option>
                            <option value="phase-4-step-1-table"></option>
                            <option value=""></option>
                        </select>
                    </label>
                </div>
                <div class="cell small-4">
                    <?php
                    $phase_2_step_4_complete_sql = "SELECT * FROM water_installation WHERE step = 'Phase-2-Step-4-Complete'";
                    $phase_2_step_4_complete_result = mysqli_query($conn, $phase_2_step_4_complete_sql);
                    if (!empty($phase_2_step_4_complete_result)) {
                        ?>
                        <h3>Phase 2 Step 4 Complete Table</h3>
                    <?php } ?>
                    <table class="table responsive stack" id="phase-2-step-4-complete-table"></table>
                </div>
                <div class="cell small-4">
                    <h3>Main Table</h3>
                    <table class="table responsive stack">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Customer Name</th>
                                <th>Email Address</th>
                                <th>Progress</th>
                                <th>Date Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="main-table">

                        </tbody>
                    </table>
                </div>
                <div class="cell small-4">
                    <?php
                    $archive_sql = "SELECT * FROM water_installation WHERE step = 'Complete' AND time_updated < NOW() - INTERVAL 2 DAY";
                    $archive_result = mysqli_query($conn, $archive_sql);
                    if (!empty($archive_result)) {
                        ?>
                        <h3>Archive</h3>
                    <?php } ?>
                    <table class="table responsive stack" id="archive-table"></table>
                </div>
            </div>
        </div>
        <?php include("src/php/reveal.php") ?>
    </div>
</body>

<?php include("includes/index_footer.php"); ?>