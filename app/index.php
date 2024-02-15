<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

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
                <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                        <a data-open="add_button">
                            Add New Customer
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><input name='tracking_number_search' id="tracking_number_search" type="search"
                            placeholder="Name / Tracking Number"></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="grid-container full">
            <div class="grid-x grid-margin-x" id="content">
                <br>
                <div class="cell auto">
                    <div id="phase-2-step-4-complete-table">

                    </div>
                    <h3>Main Table</h3>
                    <table class="table responsive stack">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Customer Name</th>
                                <th>Email Address</th>
                                <th>Step/Progress</th>
                                <th>Date Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="main-table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include("reveal.php") ?>
    </div>
</body>

<?php include("includes/footer.php"); ?>