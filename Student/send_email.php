<?php
//Include required PHPMailer files
    include './includes/config.php';
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "cynthia734wangari@gmail.com";
//Set gmail password
	$mail->Password = "dennnohkim254";
//Email subject
	$mail->Subject = "DKUT TIMETABLE GENERATOR IT DEPARTMENT";
//Set sender email
	$mail->setFrom('cynthiawangari@gmail.com','COD IT departmet');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "
    <h1 style='color:blue;'>UPDATE FOR THE TEACHING TIMETABLE</h1></br><p>This is to inform you that we have updated our teaching time table.you can now access the 
    new time table in the<a href='http://127.0.0.1/COMP SCI#lecturer'> portal now.</a></p>";
//Add recipient
$send=mysqli_query($con,"SELECT * FROM admin");
while($emails=mysqli_fetch_array($send)){
$email=$emails['email'];
$name=$emails['username'];
	$mail->addAddress($email,$name);
}

//Finally send email
	if ( $mail->send() ) {
		$email_sent="success";
	}
//Closing smtp connection
	$mail->smtpClose();
