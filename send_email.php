<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true); 
try {
    if($_POST["emailAddress"]) {
        //Server settings
        // $mail->SMTPDebug = 2; //Uncomment to view debug log
        $mail->isSMTP();
        $mail->Host = 'sg2plzcpnl456431.prod.sin2.secureserver.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'contactform@brdigitech.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('contactform@brdigitech.com', 'Contact Form');
        $mail->addAddress('info@brdigitech.com');
        // $mail->addCC('akram@brdigitech.com');
        // $mail->addBCC('nomanhaq@brdigitech.com');

        //Content
        $mail->isHTML(true); 
        $mail->Subject = 'Contact Page Form from BRDigitech website';
        $mail->Body    = 'Name: '.$_POST["name"].'<br/> Email: '.$_POST["emailAddress"].'<br /> Phone: '.$_POST["phone"]. '<br/> Subject: '.$_POST["subject"].'<br/> <br /> Message: '.$_POST["msg"];

        $mail->send();
        $response["success"] = true;
        $response["msg"] = 'Message has been sent';

        echo json_encode($response);

    } 

} catch (Exception $e) {
    $response["success"] = false;
    $response["msg"] = 'Message could not be sent';
    $response["error"] = $mail->ErrorInfo;
    echo json_encode($response);
}