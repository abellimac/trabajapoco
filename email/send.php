<?php 
$to = "abellimac@gmail.com";
$subject = "Form Contact Roonbo";

if( isset($_POST) )
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$message = $_POST["message"];

	if( $name == "" || $email == ""  || $message == "" || $phone == "" )
	{
		echo json_encode( array("status" => false ) );
		exit();
	}

	$from = "roonbo@roonbo.com";
	$content = "Nombre: $name \nTeléfono: $phone \nE-mail: $email \n\nComentario:\n$message";

	$header = "From: $from\r\n";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/plain; charset=utf-8\r\n";
	$header.= "X-Priority: 1\r\n";

	if ( mail( "abellimac@gmail.com", "Formulario de Contacto Roonbo", $content, $header ) )
	{
		echo json_encode( array("status" => true, "cliente" => $name ) );
	}
	else
	{
		echo json_encode( array("status" => false) );
		exit();
	}
}
else
{
	exit();
}