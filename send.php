<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'php/PHPMailer.php';
require 'php/Exception.php';
require 'php/SMTP.php';

$name = $_POST['name'];
$city = $_POST['city'];
$question = $_POST['question'];
$email = $_POST['email'];

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'mail.reksoft.ru';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = false;
//Set who the message is to be sent from
$mail->setFrom('recognition@reksoft.ru', 'Recognition');
//Set who the message is to be sent to
$mail->addAddress('vnfoteyeva@gmail.com', '');
//Set the subject line
$mail->Subject = 'Recognition message';
//Replace the plain text body with one created manually
$mail->Body = "
Имя: $name
Город: $city
Вопрос: $question
Email: $email
";

$response = [];
$response["status"] = 0;

if (!$mail->send()) {
    $response["status"] = 1;
} else {
    $response["status"] = 0;
}

echo json_encode($response);
?>