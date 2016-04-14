<?php
/**
 * Created by PhpStorm.
 * User: lego
 * Date: 4/11/16
 * Time: 1:28 PM
 */
//security

require '/var/www/radieli/lib/PHPMailer/PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'porkogorkov75@gmail.com';
$mail->Password = '';
$mail->SMTPSecure = 'tls';

$mail->From = $email_sender;
$mail->FromName = $podatel;
$mail->addAddress('georgiev_h_tsvetan@yahoo.com');

$mail->isHTML(true);

$mail->Subject = $otnosno;
$mail->Body    = $tqlo;

?>