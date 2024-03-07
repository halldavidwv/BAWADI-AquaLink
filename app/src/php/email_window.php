<?php
    $step_id = $_POST['stepID'];
?>

<form action="src/php/initiate_email.php?id=<?php echo $step_id ?>" method="post">
    <div class="text-center">
        <h1>Message Customer</h1>
        <br>
        <label for="email_subject">
            <input type="text" name="email_subject" id="email_subject" placeholder="Email Subject">
        </label>
        <label for="email_content">
            <textarea name="email_content" id="email_content" placeholder="Email Content" cols="70" rows="10"></textarea>
        </label>
        <button class="submit success button" name='update' value='update'>Send</button>
        <a data-close aria-label="Close modal" class='button'>Go Back</a>
    </div>
</form>