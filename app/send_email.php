<?php include('includes/header.php'); ?>

<body>
    <div class="grid-container">
        <div class="grid-y" style="background-image: url(includes/trybg.png);">
            <h1>
                <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img
                        src="https://baguiowaterdistrict.gov.ph/wp-content/uploads/2020/10/masthead.png" /></a>
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
            <form action="initiate_email.php?id=<?php echo $_GET['id']; ?>" method="post">
                <div class="text-center">
                    <h1>Edit Email</h1>
                    <br>
                    <h3>Email Details</h3>
                    <label for="email_subject">
                        <input type="text" name="email_subject" id="email_subject" placeholder="Email Subject">
                    </label>
                    <label for="email_content">
                        <textarea name="email_content" id="email_content" placeholder="Email Content" cols="70"
                            rows="10"></textarea>
                    </label>
                    <button class="submit success button" name='update' value='update'>Send</button>
                    <a href="index.php" class='button'>Go Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include('includes/footer.php'); ?>