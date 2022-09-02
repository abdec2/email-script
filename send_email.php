<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true); 
try {
    if($_POST["email"]) {
        //Server settings
        // $mail->SMTPDebug = 2; //Uncomment to view debug log
        $mail->isSMTP();
        $mail->Host = 'sg2plzcpnl456431.prod.sin2.secureserver.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'contactform@brdigitech.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 465;

        $mail->setFrom('contactform@brdigitech.com', 'Contact Form');
        $mail->addAddress('info@brdigitech.com');
        // $mail->addCC('akram@brdigitech.com');
        // $mail->addBCC('nomanhaq@brdigitech.com');

        //Content
        $mail->isHTML(true); 
        $mail->Subject = 'Contact Page Form from BRDigitech website';
        $mail->Body    = 'Mail body content goes here';

        $mail->send();
        echo 'Message has been sent';
    } else {

    }
    
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}