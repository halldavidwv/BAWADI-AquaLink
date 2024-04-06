<?php include('../../includes/php_header.php'); ?>

<body>
    <div class="grid-container">
        <div class="grid-y grid-margin-x" style="background-image: url(../../includes/trybg.png);">
            <h1>
                <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img src="../../includes/masthead.png" /></a>
            </h1>
        </div>
        <div class="container-banner banner-pads">
            <div class="row">
                <div class="columns large-9 text-center">
                    <header>
                        <h1 class="entry-title">Water Installation Tracker Admin Dashboard</h1>
                    </header>
                </div>
            </div>
        </div>
        <br>
        <?php
        include("connect_database.php");

        $id = $_GET['id'];

        $sql = $conn->prepare("SELECT first_name, last_name, middle_name, home_address_street, home_address_city, email_address, step FROM water_installation WHERE id = ?");
        $sql->bind_param('i', $id);
        $sql->execute();

        $result = $sql->get_result();
        $resultData = mysqli_fetch_assoc($result);

        $first_name = $resultData['first_name'];
        $last_name = $resultData['last_name'];
        $middle_name = $resultData['middle_name'];
        $home_address_street = $resultData['home_address_street'];
        $home_address_city = $resultData['home_address_city'];
        $email_address = $resultData['email_address'];
        ?>

        <div class="grid-x grid-margin-x align-center">
            <div class="cell small-6" id="input">
                <form action="edit_customer.php?id=<?php echo $_GET['id']; ?>" method="post" data-abide novalidate>
                    <div class="text-center">
                        <br>
                        <h1>Edit Customer</h1>
                        <br>
                        <h3>Customer Details</h3>
                        <div id="customer_name_content">
                            <div class="grid-x grid-margin-x">
                                <div class="cell small-4">
                                    <label>
                                        <input type="text" required name="last_name" class="form-control" value="<?php echo $last_name; ?>" placeholder="Last Name" autofocus>
                                        <span class="form-error" data-form-error-on="required">
                                            This field is required.
                                        </span>
                                    </label>
                                </div>
                                <div class="cell small-4">
                                    <label>
                                        <input type="text" required name="first_name" class="form-control" value="<?php echo $first_name; ?>" placeholder="First Name" autofocus>
                                        <span class="form-error" data-form-error-on="required">
                                            This field is required.
                                        </span>
                                    </label>
                                </div>
                                <div class="cell small-4">
                                    <label>
                                        <input type="text" required name="middle_name" class="form-control" value="<?php echo $middle_name; ?>" placeholder="Middle Name" autofocus>
                                        <span class="form-error" data-form-error-on="required">This field is required.
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="customer_home_address_content">
                            <div class="grid-x grid-margin-x">
                                <div class="cell small-6">
                                    <label>
                                        <input type="text" name="home_address_street" required class="form-control" value="<?php echo $home_address_street; ?>" placeholder="Street No./Building No./Barangay" autofocus>
                                        <span class="form-error" data-form-error-on="required">This field is required.</span>
                                    </label>
                                </div>
                                <div class="cell small-4">
                                    <label>
                                        <input type="text" name="home_address_city" required class="form-control" value="<?php echo $home_address_city; ?>" placeholder="City" autofocus>
                                        <span class="form-error" data-form-error-on="required">This field is required.</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <label>
                            <input type="text" required pattern="email" name="email_address" class="form-control" value="<?php echo $email_address; ?>" placeholder="Email Address" autofocus>
                            <span class="form-error" data-form-error-on="required">
                                Email Address is required.
                            </span>
                            <span class="form-error" data-form-error-on="pattern">
                                Invalid Email
                            </span>
                        </label>
                        <div class="button-group align-center">
                            <button class="submit success button" name='update' value='update'>Save</button>
                            <a href="../../index.php" class='button'>Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>