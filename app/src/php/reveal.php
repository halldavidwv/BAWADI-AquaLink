<div class="grid-x grid-padding-x">
    <div class="reveal" id="add_button" data-reveal>
        <form action="src/php/add_customer.php" method="post" data-abide novalidate>
            <h1 class="text-center">Add New Customer</h1>
            <br>
            <h3>Customer Details</h3>
            <label>
                <input type="text" required name="customer_name" class="form-control" value="<?php echo $customer_name; ?>" placeholder="Customer Name" autofocus>
                <span class="form-error" data-form-error-on="required">This field is required.</span>
            </label>
            <input type="text" name="Address" class="form-control" value="<?php echo $address; ?>" placeholder="Address" autofocus>
            <label>
                <input type="text" required pattern="email" name="email_address" class="form-control" value="<?php echo $email_address; ?>" placeholder="Email Address" autofocus>
                <span class="form-error" data-form-error-on="required">
                    Email Address is required.
                </span>
                <span class="form-error" data-form-error-on="pattern">
                    Invalid Email
                </span>
            </label>
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

    </div>

</div>