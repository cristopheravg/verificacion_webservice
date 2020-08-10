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
include('AESCrypto.php');
//$cadena = $_POST['data'];

/*************************  *****************************************************/
/*************************  SQL SERVER CONNECTION ******************************/
/******************************************************************************/

@$cadena = $_POST["data"];

/*if($cadena != null)
{
  echo "haya data";
}

else {
  echo "vacio";
}
*/
$enlace = mysqli_connect($server,$user,$pass, $bd);
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    //echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    //echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}




//$cadena = "Qf/DuNlpdDmVl2ixCWroX2Pa2grY2kG7uzfWQT9ysEXiwh4ggySMD6ZpWbovmNlVr1TNHJpph530Bzd2GllBSvzICP73m3mnLfyGOeGU6gTFCrUUjhBPtzvd0+6hS0Esi7Ht/M1eWiG4pOsNCeWhh1a50h1g8823p0AkLKfii0np7vg0xKPDdcjEeWb+rcHY3q5/AfFAAtaz2QuoL+pIQHVYiyjH87DWDEwR1fZvBJu8rfqdyMNH07Na+Tl7Y+5BSZmsyMMv2mS4v1snOFbwuQZ++iPDtsSywxA+oQ+8419SiUuuYkhvogbW3pp2oUfU8YmU3hRv1EPtBP6/gINtHc8XsiVLdFzaCQdAOQg1JC62Xi6zKBJyE6tLmqS/I1Ov8nQW59DheP547hxJhuthd/aggPWA1Ppx9Vr2ly2lywt0UGyww/XH0aCUeVajwdIiNq8RjLcm0yvDPmvNt8G22aP+TyKb46SCcJWE7l8jQ6BnuD0hjKClDpFo1YGHgZvj8Dmt7bwqxedwS3gL2Mm/pyyWcP8qJsS7qg0+EoyARmtZLQDjI4AUXJK3y1CxgXW0BKgzw3JMZz7XqCt55NHjU0YZEXEk2P5XgsYmkUqGkbjJuiAuuCgiW8XI3KWW7SXn/pe7xgQLRC92YFj/k3iLKijiA2vGQSUzvEzbxhPLWaKniusImotMr7QeWXqYs/E8qiMX5tu+3kJ4T3dwOUAUZg==";

/************************* PROCESS THE RECEIVED STRING *************************/
$decryptedString = AESCrypto::desencriptar(urldecode($cadena),$key);
$xml = simplexml_load_string(urldecode($decryptedString), 'SimpleXMLIterator');
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



// WE construct the real query statement
$correctSQL = 'INSERT   INTO `centros` ';
$sql = $correctSQL."(`pais`, `estado`, `ciudad`, `centro`, `query`, `dato001`, `dato002`, `dato999`, `md5`, `timestamp`) VALUES ('$xml->pais', '$xml->estado', '$xml->ciudad', '$xml->centro', '$xml->query','$xml->dato001', '$xml->dato002', '$xml->dato999', '$xml->md5', '$xml->timestamp')";

//echo $sql;

//echo "<br >";
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
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $decryptedString);
fclose($myfile);
?>
