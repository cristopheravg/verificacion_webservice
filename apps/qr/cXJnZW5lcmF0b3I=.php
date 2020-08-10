<?php
// INCLUDE THE LIBRARY
require("../../includes/qr/qrlib.php");

@$text = $_GET['data'];

if ($text == '')
	{
		echo "<p style='color:red;'>No se pasaron datos para generar el código QR</p>";
		//QRcode::png("ESTE ES UN QR DE EJEMPLO, PUES NO PASASTE NADA.");
	}

else
{
	//$text="holacefckwlnejf ";

	$file ="outputs/".uniqid().".png";
	// Generates QR Code and Stores it in directory given
	QRcode::png($text,$file,QR_ECLEVEL_H,6);

	echo "El QR generado es: <br><br> ";
	echo '<img src="'.$file.'" />';
}
?>
