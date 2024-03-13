<?php include("src/php/connect_database.php"); ?>

<?php include("includes/index_header.php"); ?>

<body>
    <div class="grid-container">
        <div class="grid-y" style="background-image: url(includes/trybg.png);">
            <h1>
                <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img src="https://baguiowaterdistrict.gov.ph/wp-content/uploads/2020/10/masthead.png" /></a>
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
                        <input name='tracking_number_search' id="tracking_number_search" type="search" placeholder="Name / Tracking Number">
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="grid-container full">
            <div class="grid-x grid-margin-x" id="content">
                <div class="cell auto">
                    <label class="text-left" for="">
                        Table Filter:
                    </label>
                    <select class="" name="select_display_table" id="select_display_table" style="width: 90vh;">
                        <option value="main-table">Main Table</option>
                        <option value="archive-table">Archive Table</option>
                        <option value="phase-2-step-1-table">Phase 2 Step 1 Table</option>
                        <option value="phase-2-step-2-table">Phase 2 Step 2 Table</option>
                        <option value="phase-2-step-3-table">Phase 2 Step 3 Table</option>
                        <option value="phase-2-step-4-incomplete-table">Phase 2 Step 4 Incomplete Table</option>
                        <option value="phase-2-step-4-complete-table">Phase 2 Step 4 Complete Table</option>
                        <option value="phase-3-step-1-table">Phase 3 Step 1 Table</option>
                        <option value="phase-4-step-1-existing-tapping-table">Phase 4 Step 1 Existing Tapping Point Table</option>
                        <option value="phase-4-step-1-proposed-tapping-table">Phase 4 Step 1 Proposed Tapping Point Table</option>
                        <option value="water-installation-completed-table">Water Installation Completed Table</option>
                    </select>
                    <br>
                    <div class="cell auto" id="current-table">
                        
                    </div>
                </div>
            </div>
        </div>
        <?php include("src/php/reveal.php") ?>
    </div>
</body>

<?php include("includes/index_footer.php"); ?>