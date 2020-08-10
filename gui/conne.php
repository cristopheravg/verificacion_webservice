<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/********* DATOS DE DIGITALSERVER CASATRONIX.COM*********/
$user = "adm";
$pass = "webservice2020";
$db = "webservice-3133334439";
$server = "shareddb-u.hosting.stackcp.net";
$link = new mysqli($server,$user,$pass,$db);


$queryPass = "SELECT * FROM centros";
$queryDenied = "SELECT * FROM 'centros' WHERE 'dato002'=33";

// Perform query
if ($result = mysqli_query($link, "SELECT * FROM centros")) {
  echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($link);

?>
