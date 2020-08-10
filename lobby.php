<?php
require("includes/inc.php");
/* Author : Cristopher Avila
*  E-mail : cristopher.avilag@gmail.com
*   Date  : September 2019
*
*
* To use, the user needs to send an encrypted string (AES 128 CBC) with urlEncode, the
* key of decryption you can change in the $key variable.
*
* Both parts in comunication needs the same key
*
*
* E00 : No Error exists, data will be processed				|| HTTP RESPONSE : 200
* E01 : String received in POST is corrupted				|| HTTP RESPONSE : 400
* E02 : XML received is corrupted or not have the correct format	|| HTTP RESPONSE : 401
* E03 : XML structure is invalid 					|| HTTP RESPONSE : 406
*/


include('AESCrypto.php');
//include('xmlerrors.php');

$debug=0;

$noData = false;	// Inspect the data received in POST

if ($debug == 1)	// Block to show the webservice debug trace
    {
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
    }





/****************** GET THE TIMESTAMP FOR THE QUERY ******************/
$fecha = new DateTime();
$timestamp = $fecha->getTimestamp();
/*******************************************************************/

if($debug == 1)
{
/************************************************ TEST FOR ENCRYPTION ***********************************************************/
  //$test ="%3C%3Fxml+version%3D%221.0%22+encoding%3D%22utf-8%22%3F%3E%0A%3Cgenerales%3E%0A++%3Cpais%3E123%3C%2Fpais%3E%0A++%3Cestado%3E123%3C%2Festado%3E%0A++%3Cciudad%3E123%3C%2Fciudad%3E%0A++%3Ccentro%3E123%3C%2Fcentro%3E%0A++%3Cquery%3Estr1234%3C%2Fquery%3E%0A++%3Cdato001%3E3.1415926535%3C%2Fdato001%3E%0A++%3Cdato002%3Estr1234%3C%2Fdato002%3E%0A++%3Cdato999%3Estr1234%3C%2Fdato999%3E%0A++%3Cmd5%3Estr1234%3C%2Fmd5%3E%0A%3C%2Fgenerales%3E";
  //$test = "%3C%3Fxml%20version%3D%271.0%27%20encoding%3D%27UTF-8%27%20%3F%3E%0A%3Cgenerales%3E%0A%09%3Cpais%3E111%3C%2Fpais%3E%0A%09%3Cestado%3E111%3C%2Festado%3E%0A%09%3Cciudad%3E978%3C%2Fciudad%3E%0A%09%3Ccentro%3E111%3C%2Fcentro%3E%0A%09%3Cquery%3E1%3C%2Fquery%3E%0A%09%3Cdato001%3E25%3C%2Fdato001%3E%0A%09%3Cdato002%3E33%3C%2Fdato002%3E%0A%09%3Cdato999%3EHOLACOMOESTAS%3C%2Fdato999%3E%0A%09%3Cmd5%3EESTOESUNAPRUEBA%3C%2Fmd5%3E%0A%3C%2Fgenerales%3E%0A";
  $test = "%3C%3Fxml%20version%3D%271.0%27%20encoding%3D%27UTF-8%27%20%3F%3E%0A%3Cgenerales%3E%0A%09%3Cpais%3E111%3C%2Fpais%3E%0A%09%3Cestado%3E111%3C%2Festado%3E%0A%09%3Cciudad%3E978%3C%2Fciudad%3E%0A%09%3Ccentro%3E111%3C%2Fcentro%3E%0A%09%3Cquery%3E1%3C%2Fquery%3E%0A%09%3Cdato001%3E25%3C%2Fdato001%3E%0A%09%3Cdato002%3E33%3C%2Fdato002%3E%0A%09%3Cdato999%3EHOLACOMOESTAS%3C%2Fdato999%3E%0A%09%3Cmd5%3EESTOESUNAPRUEBA%3C%2Fmd5%3E%0A%20%20%20%20%20%20%20%20%3Ctimestamp%3E2008-01-01%2000%3A00%3A01%3C%2Ftimestamp%3E%0A%3C%2Fgenerales%3E";
  $encrypted = AESCrypto::encriptar($test,$key);
  echo "ENCYPTED: ".$encrypted;
/********************************************************************************************************************************/
}

@$cadena = $_POST['xml']; //The variable for the received string
  if(!$cadena)
    {
        $noData = true;
    }





//echo $cadena;
/************************* PROCESS THE RECEIVED STRING *************************/
$decryptedString = AESCrypto::desencriptar($cadena,$key);
//echo $cadena;
$decode = urldecode($decryptedString);
//$decode = "%3C%3Fxml+version%3D%271.0%27+encoding%3D%27UTF-8%27+%3F%3E%0A%3Cgenerales%3E%0A%09%3Cpais%3E52%3C%2Fpais%3E%0A%09%3Cestado%3E15%3C%2Festado%3E%0A%09%3Cciudad%3E60%3C%2Fciudad%3E%0A%09%3Ccentro%3E2%3C%2Fcentro%3E%0A%09%3Cquery%3E+1+%3C%2Fquery%3E%0A%09%3Cdato001%3E2.3%3C%2Fdato001%3E%0A%09%3Cdato002%3E33%3C%2Fdato002%3E%0A%09%3Cdato999%3E5dcc67393750523cd165f17e1efadd21%3C%2Fdato999%3E%0A%09%3Cmd5%3E3af45e123ac78d67349ab3262a4b6d30%3C%2Fmd5%3E%0A%3C%2Fgenerales%3E";
//echo $decode;
$xmlReceived = new DOMDocument();
@$xmlReceived->loadXML($decode);
/*******************************************************************************/


@$sxe = simplexml_import_dom($xmlReceived);
//echo $sxe->saveXML();
//echo $sxe->data;


if($sxe  == true) // we can first check a variable (node) from the XML
  {
	$xml = $xmlReceived;
    /*$encryptedString = $sxe->data;
		echo $sxe->data;
    $decryptedPostString = AESCrypto::desencriptar($encryptedString,$key);

    $schema = "<?xml version='1.0' encoding='UTF-8'?>
    <xs:schema xmlns:xs='http://www.w3.org/2001/XMLSchema' elementFormDefault='qualified' attributeFormDefault='unqualified'>

       <xs:element name='generales'>
              <xs:complexType>
                     <xs:sequence>
                            <xs:element name='pais' type='xs:int'></xs:element>
                            <xs:element name='estado' type='xs:int'></xs:element>
                            <xs:element name='ciudad' type='xs:int'></xs:element>
                            <xs:element name='centro' type='xs:int'></xs:element>
                            <xs:element name='query' type='xs:string'></xs:element>
                            <xs:element name='dato001' type='xs:double'></xs:element>
                            <xs:element name='dato002' type='xs:string'></xs:element>
                            <xs:element name='dato999' type='xs:string'></xs:element>
                            <xs:element name='md5' type='xs:string'></xs:element>
                        </xs:sequence>
                 </xs:complexType>
          </xs:element>
    </xs:schema>";


    /**************************************************************************/
    /*$xml = new DOMDocument();
    /*@$xml->loadXML($decryptedPostString);


		/************** CHECK THE XML RECEIVED AGAINST THE XML SCHEMA *************/
    if (@!$xml->schemaValidate('data-schema.xsd'))
      {
       //@libxml_display_errors();
	/************************************************* ERROR 03 *******************************************/
        header('Content-type: application/json');
        http_response_code(406);
        echo "{\"status\": {\"error\":3,\"message\":\" [FAIL]:XML corrupted \",\"success\":false,\"timestamp\":$timestamp }}";
        $cadena ="";
      }

      else
      {
	/************************************************* [  OK  ] *******************************************/
	$return = sendData($cadena);

//echo $return;
		if($return == 1 )
		 {
        		header('Content-type: application/json');
            http_response_code(205);
        		echo "{\"status\": {\"error\":0,\"message\":\" [OK]:Query processed  \",\"success\":true,\"timestamp\":$timestamp}}";
        	 }
		else
		{
			      header('Content-type: application/json');
            http_response_code(202);
        		echo "{\"status\": {\"error\":0,\"message\":\" [WARNING]: Data OK but not processed \",\"success\":false,\"timestamp\":$timestamp}}";
		}


      }
}

else {

    if($noData == true)
      {
	/************************************************* ERROR 01 *******************************************/
        header('Content-type: application/json');
        http_response_code(400);
        echo"{\"status\":{\"error\":01,\"message\":\"[FAIL]:ReCheck query\",\"success\":false,\"timestamp\":$timestamp}}";
      }

    else
      {
	/************************************************* ERROR 02 *******************************************/
        header('Content-type: application/json');
        http_response_code(401);
        echo"{\"status\": {\"error\":02,\"message\":\" [FAIL]:Data corrupted \",\"success\":false,\"timestamp\":$timestamp}}";
      }
}


/*function sendData($data){


  // what post fields?
  $fields = array(
     'data' => $data,
  );

  // build the urlencoded data
  $postvars = http_build_query($fields);

  // open connection
  $ch = curl_init();

  // set the url, number of POST vars, POST data
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($fields));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

  // execute post
  $result = curl_exec($ch);



  // close connection
  curl_close($ch);
}*/


function sendData($data){
$url = "casatronix.com/webservice/action.php";
$data = 'data='.urlencode($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);

//echo $remote_server_output;
curl_close($ch);


return $remote_server_output;

}

?>
