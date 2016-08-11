<?php
require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'marijana.beograd@gmail.com';          // SMTP username
$mail->Password = 'underthebridge'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('marijana.beograd@gmail.com', 'MarFiArtFit');
$mail->addReplyTo('marijana.beograd@gmail.com', 'MarFiArtFit');
$mail->addAddress($email);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML




$mail->Subject = 'Poruka od Sport u Srbiji';
$mail->Body="Zdravo, ovaj mail je poslat na vas zahtev.". $mass;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>