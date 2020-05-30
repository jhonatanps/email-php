<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['subject']))
$subject = $_POST['subject'];




$mail = new PHPMailer(true);

try{
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'padua.jhonatan.soares@gmail.com';
	$mail->Password = 'lordcirim@1';
	$mail->Port = 587;


	$mail->addAddress('padua.jhonatan.soares@gmail.com');


	$mail->setFrom($email , $name);

	

	$mail->isHtml(true);
	$mail->name = $name;
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = $message;

	if($mail->send()){
		echo 'Email enviado';
	}else{
		echo 'Email furo';
	}

}catch(Exception $e){
	echo "Erro ao enviar mesnsagem: {$email->ErroInfo}";
}

?>