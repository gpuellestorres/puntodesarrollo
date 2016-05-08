<?php

// check if fields passed are empty


if(empty($_POST['name'])  		||

   empty($_POST['email']) 		||

   empty($_POST['message'])		||

   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))

   {

	echo "El mensaje no pudo ser enviado, debe llenar todos los campos solicitados.";

	return false;

   }/

	

$name = $_POST['name'];

$email_address = $_POST['email'];

$message = $_POST['message'];

$tema = "desde la página puntodesarrollo.com";

// create email body and send it	

//$to = 'gpuellestorres@gmail.com';


$to = 'puntodesarrollo@gmail.com';

$email_subject = $tema;

$email_body = "Ha recibido un nuevo mensaje desde la página web puntodesarrollo.com\n\n".

				  " Detalles:\n \nNombre: ".$name ."\n ".

				  "Correo electrónico: ".$email_address."\n\n Mensaje: \n ".$message;

$headers = $email_address;
/*

mail($to,$email_subject,$email_body,$headers);//*/

$sendgrid = new SendGrid('username', 'password');
$mail = new SendGridMail();
$mail->addTo($to)->
       setFrom($email_address)->
       setSubject($tema)->
       setText($message);
$sendgrid->smtp->send($mail);


echo "Su mensaje fue enviado con éxito. Muchas gracias, pronto le llegará una respuesta a su correo electrónico.";

return true;			

?>