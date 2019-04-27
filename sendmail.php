<?php
 
//use PHPMailer\PHPMailer\PHPMailer;

require_once "/var/www/PHPMailer/Exception.php";
require_once "/var/www/PHPMailer/PHPMailer.php";
require_once "/var/www/PHPMailer/SMTP.php";
die("masuk");

 
$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info.cvdtc@gmail.com';
    $mail->Password = 'j14nt4r4';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
 
 
    $mail->setFrom('info.cvdtc@example.com', 'Admin');
    $mail->addAddress('jiantara@gmail.com', 'Recipient1');
    $mail->addAddress('csyandiie5@gmail.com');
//    $mail->addReplyTo('noreply@example.com', 'noreply');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
 
    //Attachments
//    $mail->addAttachment('/backup/myfile.tar.gz');
 
    //Content
    $mail->isHTML(true); 
    $mail->Subject = 'Test Mail Subject!';
    $mail->Body    = 'This is SMTP Email Test';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
