<?php
require("includes/inc.php");
/* Author : Cristopher Avila
*  E-mail : cristopher.avilag@gmail.com
*   Date  : September 2019
*   Name: Lobby not secure version
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
* E04 : Data is OK but not was inserted in DB
*/

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


@$cadena = $_POST['xml']; //The variable for the received string
  if(!$cadena)
    {
        $noData = true;
    }

//$cadena = "%3C%3Fxml%20version%3D%271.0%27%20encoding%3D%27UTF-8%27%20%3F%3E%3Cgenerales%3E%3Cpais%3E88%3C%2Fpais%3E%3Cestado%3E777%3C%2Festado%3E%3Cciudad%3E978%3C%2Fciudad%3E%3Ccentro%3E111%3C%2Fcentro%3E%3Cquery%3E1%3C%2Fquery%3E%3Cdato001%3E25%3C%2Fdato001%3E%3Cdato002%3E33%3C%2Fdato002%3E%3Cdato999%3EHOLACOMOESTAS%3C%2Fdato999%3E%3Cmd5%3EESTOESUNAPRUEBA%3C%2Fmd5%3E%3Ctimestamp%3E2008-01-01%2000%3A00%3A01%3C%2Ftimestamp%3E%3C%2Fgenerales%3E";
$cadenaDecoded = urldecode($cadena);
$xmlReceived = new DOMDocument();
@$xmlReceived->loadXML($cadenaDecoded);
/*******************************************************************************/

@$sxe = simplexml_import_dom($xmlReceived);

if($sxe  == true) // we can first check a variable (node) from the XML
  {
	$xml = $xmlReceived;



		/************** CHECK THE XML RECEIVED AGAINST THE XML SCHEMA *************/
    if (@!$xml->schemaValidate('data-schema.xsd'))
      {
       //@libxml_display_errors();
	/************************************************* ERROR 03 *******************************************/
        @header('Content-type: application/json');
        echo "{\"status\": {\"error\":3,\"message\":\" [FAIL]:XML corrupted \",\"success\":false,\"timestamp\":$timestamp }}";
        http_response_code(406);
        $cadena ="";
      }

      else
      {
	/************************************************* [  DATA OK  ] *******************************************/
	$return = sendData($cadena);

		if($return == 1 )
		 {
        		@header('Content-type: application/json');
            http_response_code(200);
        		echo "{\"status\": {\"error\":0,\"message\":\" [OK]:Query processed  \",\"success\":true,\"timestamp\":$timestamp}}";
        	 }
		else
		{
			      @header('Content-type: application/json');
            http_response_code(405);
        		echo "{\"status\": {\"error\":4,\"message\":\" [WARNING]: Data OK but not processed into DB \",\"success\":false,\"timestamp\":$timestamp}}";
		}


      }
}

else {

    if($noData == true)
      {
	/************************************************* ERROR 01 *******************************************/
        @header('Content-type: application/json');
        http_response_code(400);
        echo"{\"status\":{\"error\":01,\"message\":\"[FAIL]:ReCheck query\",\"success\":false,\"timestamp\":$timestamp}}";
      }

    else
      {
	/************************************************* ERROR 02 *******************************************/
        @header('Content-type: application/json');
        http_response_code(401);
        echo"{\"status\": {\"error\":02,\"message\":\" [FAIL]:Data corrupted \",\"success\":false,\"timestamp\":$timestamp}}";
      }
}


/*
* This function pass the data to the action page (in non Secure Mode)
* Use cURL PHP to send the received data data
*/
function sendData($data){
$url = "https://www.casatronix.com/webservice/actionin.php";
$datax = 'data='.$data;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS,"data=".$data);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$remote_server_output = curl_exec ($ch);

if ($remote_server_output == FALSE) {
   return 0;
} else {
   return 1;
}
curl_close($ch);
}


/*function sendData($data){
    $url = "https://www.casatronix.com/webservice/actionin.php";
    $datax = array('data' => $data);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($datax)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { return 0;}
    else {return 1;}

}
*/
?>
