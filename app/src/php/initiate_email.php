<?php
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$email_subject = $_POST['email_subject'];
$email_content = $_POST['email_content'];

if(isset($_GET['id'])) {
    include("connect_database.php");
    $id = $_GET['id'];
    $query = $conn->prepare("SELECT customer_name, email_address FROM water_installation WHERE id = $id");
    $query->bind_param('i', $id);
    $query->execute();

    $result = $query->get_result();

    $row = mysqli_fetch_assoc($result);
    $customer_name = $row['customer_name'];
    $email_address = $row['email_address'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'hall.davidwv@gmail.com';
    $mail->Password = 'frfhefdytljhoclh';
    $mail->SMTPSecure = 'ssl';
    $mail->setFrom('hall.davidwv@gmail.com');
    $mail->addAddress($email_address, $customer_name);
    $mail->isHTML(true);
    $mail->Subject = $email_subject;
    $mailContent = $email_content;
    $mail->Body = $mailContent;

    if($mail->send()) {
        header('Location: ../../index.php?email=success');
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: '.$mail->ErrorInfo;
    }
}
