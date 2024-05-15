<?php
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$email_subject = $_POST['email_subject'];
$email_content = $_POST['email_content'];

// This is the footer for the email content
$email_footer = "<br><br><br>" . 
                "--------------------------------<br>" .
                "<b>Baguio City Water District</b><br>" .
                "<b>Telefax: (074) 442 3456</b><br>" .
                "<b>Email: baguiowaterdistrictgmo@gmail.com</b><br>" .
                "<b>Website: https://baguiowaterdistrict.gov.ph</b><br>";
                
// This functionality will get the details of the user, and send an email from the details in the email_window.php
// Note: PHPMailer is used for this functionality.
if(isset($_GET['id'])) {
    include("connect_database.php");
    include("credentials.php");
    $id = $_GET['id'];
    $query = $conn->prepare("SELECT first_name, last_name, middle_name, email_address FROM water_installation WHERE id = $id");
    if(!$query) {
        echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
    }
    $query->execute();

    $result = $query->get_result();

    $row = mysqli_fetch_assoc($result);
    $customer_name = $row['last_name'] . ", " .  $row["first_name"] . " " . $row["middle_name"];
    $email_address = $row['email_address'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = $send_message_email_address;
    $mail->Password = $send_message_app_password;
    $mail->SMTPSecure = 'ssl';
    $mail->setFrom($send_message_email_address);
    $mail->addAddress($email_address, $customer_name);
    $mail->isHTML(true);
    $mail->Subject = $email_subject;
    $mailContent = $email_content . $email_footer;
    $mail->Body = $mailContent;

    if($mail->send()) {
        header('Location: ../../index.php?email=success');
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: '.$mail->ErrorInfo;
    }
}
