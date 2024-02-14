<div class="grid-x grid-padding-x">
    <div class="reveal" id="add_button" data-reveal>
        <form action="add_customer.php" method="post">
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
        <br>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="reveal" id="next_step" data-reveal>

    </div>

    <div class="reveal" id="email_window" data-reveal>
        <form action="initiate_email.php?id=<?php echo $_GET['id']; ?>" method="post">
            <div class="text-center">
                <h1>Message Customer</h1>
                <br>
                <label for="email_subject">
                    <input type="text" name="email_subject" id="email_subject" placeholder="Email Subject">
                </label>
                <label for="email_content">
                    <textarea name="email_content" id="email_content" placeholder="Email Content" cols="70"
                        rows="10"></textarea>
                </label>
                <button class="submit success button" name='update' value='update'>Send</button>
                <a data-close aria-label="Close modal" class='button'>Go Back</a>
            </div>
        </form>
    </div>

</div>