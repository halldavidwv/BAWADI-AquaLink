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
        <div class="top-bar">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                        <a data-open="add_button">
                            Add New Customer
                        </a>
                    </li>
                    <li>
                        <a href="user_reports.php">
                            User Reports
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><input name='tracking_number_search' id="tracking_number_search" type="search"
                            placeholder="Tracking Number"></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="grid-container full">
            <div class="grid-x grid-margin-x" id="content">
                <br>
                <div class="cell auto">
                    <?php
                    $query = "SELECT * FROM water_installation where step = 'Phase-2-Step-4-Complete'";
                    $result = mysqli_query($conn, $query);
                    if (!mysqli_num_rows($result) == 0) { ?>
                        <h3>Phase 2 Line Inspection Complete Table</h3>
                        <table class="responsive">
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
                            <tbody>
                                <?php
                                $query = "SELECT * FROM water_installation where step = 'Phase-2-Step-4-Complete'";
                                $result_tasks = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                    <tr id="phase-2-step-4-table">
                                        <td>
                                            <?php echo $row['tracking_number']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['customer_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email_address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['step']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['time_updated']; ?>
                                        </td>
                                        <td>
                                            <div class="tiny button-group align-center-middle">
                                                <a href="edit_button.php?id=<?php echo $row['id'] ?>" class="button">
                                                    <i class="fa-regular fa-pen-to-square fa-2xl"></i>
                                                </a>
                                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="button">
                                                    <i class="fa-solid fa-trash fa-2xl"></i>
                                                </a>
                                                <a href="send_email.php?id=<?php echo $row['id'] ?>" class="button">
                                                    <i class="fa-solid fa-envelope fa-2xl"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <h3>Main Table</h3>
                    <table class="responsive">
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
        <div class="reveal" id="add_button" data-reveal>
            <form action="add_customer.php"" method="post">
                <h1 class="text-center">Add New Customer</h1>
                <br>
                <h3>Customer Details</h3>
                <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name; ?>"
                    placeholder="Customer Name" autofocus>
                <input type="text" name="email_address" class="form-control" value="<?php echo $email_address; ?>"
                    placeholder="Email Address" autofocus>
                <button class="submit success button" name='add_customer'>Save</button>
                <a class='button' data-close aria-label="Close modal">Go Back</a>
            </form>
        </div>
        <div class="reveal" id="step_details_window" data-reveal>
            <div class="cell auto" id="step_details"></div>
            <script type="text/javascript" src="step_details.js"></script>
        </div>
    </div>
</body>

<?php include("includes/footer.php"); ?>