<?php include('includes/header.php');?>
<div class="row">
    <div class="large-9 columns">
        <h1 class="logo">
            <a href="https://baguiowaterdistrict.gov.ph/" title="Baguio Water District" rel="home"><img
                    src="https://baguiowaterdistrict.gov.ph/wp-content/uploads/2020/10/masthead.png" /></a>
        </h1>
    </div>

    <div class="large-3 columns">
        <div id="text-2" class="ear-content widget anchor widget_text">
            <div class="textwidget"></div>
        </div>
    </div>
</div>

<div class="container-banner banner-pads">
    <div class="row">
        <div class="large-9 columns container-main">
            <header>
                <h1 class="entry-title">Add New Customer</h1>
            </header>
        </div>
    </div>
</div>

<div class="row">
    <div id="input">
        <form action="add_customer.php" method="post">
            <div class="columns">
                <br>
                <h3>Customer Details</h3>
                <input type="text" id='customer_name' name="customer_name" class="form-control"
                    placeholder="Customer Name" autofocus>
                <input type="text" id='email_address' name="email_address" class="form-control"
                    placeholder="Email Address" autofocus>    
                <label for="step">Options: </label>
                <select name="step" id="step">
                    <optgroup label="Phase 2: Initial Inspection">
                        <option value="Phase-2-Step-1">Step 1</option>
                        <option value="Phase-2-Step-2">Step 2</option>
                        <option value="Phase-2-Step-3">Step 3</option>
                        <option value="Phase-2-Step-4-Incomplete">Step 4: Lay-out Inspection Needed</option>
                        <option value="Phase-2-Step-4-Complete">Step 4: Inspection Complete</option>
                    <optgroup label="Phase 3: Payment of Fees">
                        <option value="Phase-3-Step-1">Step 1</option>
                    <optgroup label="Phase 4: Installation">
                        <option value="Phase-4-Step-1">Step 1</option>
                </select>
                <button class="submit success button" name='add_customer'>Save</button>
                <a href="index.php" class='button'>Go Back</a>
            </div>
        </form>
    </div>
</div>