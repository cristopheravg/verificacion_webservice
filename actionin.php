<?php
/* Author : Cristopher Avila
*  E-mail : cristopher.avilag@gmail.com
*   Date  : January 2020
*
*
* To use, the user needs to send an encrypted string (AES 128 CBC) with urlEncode, the
* key of decryption you can change in the $key variable.
*
* Both parts in comunication needs the same key
*
*
*/

require("includes/inc.php");

/*************************  *****************************************************/
/*************************  SQL SERVER CONNECTION ******************************/
/******************************************************************************/

@$cadena = urldecode($_POST["data"]);
/*$cadena ="<?xml version='1.0' encoding='UTF-8' ?><generales><pais>88</pais><estado>111</estado><ciudad>978</ciudad><centro>111</centro><query>1</query><dato001>25</dato001><dato002>33</dato002><dato999>HOLACOMOESTAS</dato999><md5>ESTOESUNAPRUEBA</md5><timestamp>2008-01-01 00:00:01</timestamp></generales>";*/

$enlace = mysqli_connect($server,$user,$pass, $bd);
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    //echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    //echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


/************************* PROCESS THE RECEIVED STRING *************************/
$xml = simplexml_load_string($cadena, 'SimpleXMLIterator');

$receivedSQL = $xml->query; // We extract the Node 'Query' to know the statement that we  will use
/******************* We select the Query statement to use **********************/
  switch ($receivedSQL)
    {
      case 1:
        {
          $correctSQL = 'INSERT INTO centros ';
          break;
        }

        case 2:
          {
          $correctSQL = 'INSERT INTO centros2 ';
          break;
        }
    }



// We construct the real query statement
$sql = $correctSQL."(`pais`, `estado`, `ciudad`, `centro`, `query`, `dato001`, `dato002`, `dato999`, `md5`, `timestamp`) VALUES ('$xml->pais', '$xml->estado', '$xml->ciudad', '$xml->centro', '$xml->query','$xml->dato001', '$xml->dato002', '$xml->dato999', '$xml->md5', '$xml->timestamp')";

//echo "INSERT INTO centros (pais, estado, ciudad, centro, dato001, dato002, dato999, md5, timestamp) VALUES ('111', '111', '978', '111', '25', '33', 'HOLACOMOESTAS', 'ejemplo', ' 2008-01-01 00:00:01'";
//$ss="INSERT INTO centros (pais, estado, ciudad, centro, dato001, dato002, dato999, md5) VALUES ('52','15','60','2','25','33','5dcc67393750523cd165f17e1efadd21','3af45e123ac78d67349ab3262a4b6d30')";
$resultado = mysqli_query($enlace,$sql);

	if($resultado == 1)
	{
		echo "1";
	}



	else
	{
		echo "0";
	}

//$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//fwrite($myfile, $sql);
//$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//fwrite($myfile, $cadena);
//fclose($myfile);
?>
