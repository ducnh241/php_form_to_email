<?php
include "config.php";
require_once('libs/mail/class.phpmailer.php');
function sendmail($to = "", $subject = "", $html = "")
{
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ' . MAIL_FROM_NAME . ">\r\n";

    $smtp_user = MAIL_USERNAME;
    $smtp_pass = MAIL_PASSWORD;
    $smtp_port = MAIL_PORT;
    $smtp_host = MAIL_HOST;

    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();

    //GMAIL config
    if ($smtp_port != 25) {
        $mail->SMTPAuth = true;          // enable SMTP authentication
        $mail->SMTPSecure = "ssl";       // sets the prefix to the server
    }
    $mail->Host = $smtp_host;            // sets GMAIL as the SMTP server
    $mail->Port = $smtp_port;            // set the SMTP port for the GMAIL server
    $mail->Username = $smtp_user;        // GMAIL username
    $mail->Password = $smtp_pass;            // GMAIL password
    //End Gmail config

    $mail->FromName = $subject;
    $mail->Subject = $subject;
    $mail->MsgHTML($html);
    $mail->AddAddress($to);
    $mail->IsHTML(true); // send as HTML
    if (!$mail->Send()) {//to see if we return a message or a value bolean
        echo "Mailer Error: " . $mail->ErrorInfo;
        return 0;
    }
    return 1;
}
