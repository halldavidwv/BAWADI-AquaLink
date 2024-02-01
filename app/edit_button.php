<?php include('includes/header.php'); ?>

<body>
    <div class="grid-container">
        <div class="grid-y" style="background-image: url(includes/trybg.png);">
            <h1>
                <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img src="https://baguiowaterdistrict.gov.ph/wp-content/uploads/2020/10/masthead.png" /></a>
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
        include("db.php");

        $id = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM water_installation WHERE id = $id");

        $resultData = mysqli_fetch_assoc($result);

        $customer_name = $resultData['customer_name'];
        $email_address = $resultData['email_address'];
        $step = $resultData['step'];
        ?>

        <div class="grid-x grid-margin-x align-center">
            <div class="cell small-6" id="input">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
                    <div class="text-center">
                        <br>
                        <h1>Edit Customer</h1>
                        <br>
                        <h3>Customer Details</h3>
                        <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name; ?>" placeholder="Customer Name" autofocus>
                        <input type="text" name="email_address" class="form-control" value="<?php echo $email_address; ?>" placeholder="Email Address" autofocus>
                        <div class="button-group align-center">
                            <button class="submit success button" name='update' value='update'>Save</button>
                            <a href="index.php" class='button'>Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>