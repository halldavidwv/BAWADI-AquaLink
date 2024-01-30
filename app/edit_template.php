<?php
    if (isset($_POST['email_subject'], $_POST['email_content'])) {
        $new_data = "<?php\n\$email_subject = '{$_POST['email_subject']}';\n\$email_content = '{$_POST['email_content']}';\n?>";
        file_put_contents('initiate_email.php', $new_data);
    }
?>