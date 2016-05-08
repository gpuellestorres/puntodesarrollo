<?php

// check if fields passed are empty

/*

if(empty($_POST['name'])  		||

   empty($_POST['email']) 		||

   empty($_POST['message'])		||

   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))

   {

	echo "El mensaje no pudo ser enviado, debe llenar todos los campos solicitados.";

	return false;

   }//*/

	
/*
$name = $_POST['name'];

$email_address = $_POST['email'];

$message = $_POST['message'];

$tema = "desde la página puntodesarrollo.com";//*/

$name = "Guillermo";

$email_address = "gpuellestorres@gmail.com";

$message = "PRUEBA";

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

/*$sendgrid = new SendGrid('username', 'password');
$mail = new SendGridMail();
$mail->addTo($to)->
       setFrom($email_address)->
       setSubject($tema)->
       setText($message);
       //->
       //setHtml('<strong>Hello World!</strong>');
$sendgrid->smtp->send($mail);//*/

$url = 'https://api.sendgrid.com/';
 $user = 'azure_9139b8d19d8d8919ac87387d2b808886@azure.com';
 $pass = '39OkI9h8mNIt1Gm'; 

 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      'to' => $to,
      'subject' => $tema,
      'html' => $mensaje,
      'text' => $mensaje,
      'from' => $email_address,
   );

 $request = $url.'api/mail.send.json';

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);

 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the response
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 $response = curl_exec($session);
 curl_close($session);

 // print everything out
 print_r($response);

echo $response;
//echo "Su mensaje fue enviado con éxito. Muchas gracias, pronto le llegará una respuesta a su correo electrónico.";

return true;			

?>