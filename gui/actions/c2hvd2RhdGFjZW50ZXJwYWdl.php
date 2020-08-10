<?php
include("../../includes/inc.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$centro = $_GET['center'];

$link = new mysqli("localhost",$user,$pass,$bd);
$queryPass = "SELECT * FROM centros";
$queryDenied = "SELECT * FROM 'centros' WHERE 'dato001'=33";
$count1 = "SELECT COUNT(*) FROM centros WHERE centro =$centro";
if ($aprobaciones = $link->query($count1)){

  $count = $aprobaciones->num_rows;

echo $count;

}

//echo mysqli_result($aprobaciones, 0);

 ?>



<div id="content" class="container-fluid" style="background-color:white; color:white;" >

  <div class="row panel-heading" style="background-color:#337AB7; margin-bottom:10px;" > Datos de Centro de Verificación Vehicular <?php echo $centro; ?> </div>
  <div class="row panel-heading" style="background-color:#D9EDF7; color:#4e595b; margin-bottom: 15px; text-align:left  !important; "> Resumen de HOY </div>

<div style="margin: 0 auto;width: 95%;">
    <div class="row">
      <div class="col-lg-2 col-md-8 col-xs-12" style="background-color:#5EB85C;margin-right:10px !important; ">
        <div class="row" style="padding-left:10px;margin-top:20px;margin-bottom:5px;font-weight:bold;font-size:1.7em;"><?php echo $aprobaciones; ?></div>
        <div class="row" style="padding-left:10px;margin-top:5px;margin-bottom:20px;font-size:1em;">Aprobaciones</div>
      </div>

      <div class="col-lg-2 col-md-8 col-xs-12" style="background-color:#D9534F; margin-right:10px !important; ">
        <div class="row" style="padding-left:10px;margin-top:20px;margin-bottom:5px;font-weight:bold;font-size:1.7em;">0</div>
        <div class="row" style="padding-left:10px;margin-top:5px;margin-bottom:20px;font-size:1em;">Rechazos</div>
      </div>

      <div class="col-lg-2 col-md-4 col-xs-12" style="background-color:#5BC0DE; margin-right:10px !important;">
        <div class="row" style="padding-left:10px;margin-top:20px;margin-bottom:5px;font-weight:bold;font-size:1.7em;">1</div>
        <div class="row" style="padding-left:10px;margin-top:5px;margin-bottom:20px;font-size:1em;">Dato 003</div>
      </div>

      <div class="col-lg-2 col-md-8 col-xs-12" style="background-color:#F0AD4E; margin-right:10px !important;">
dwekdmñlwekdmlwñ</div>

      <div class="col-lg-2 col-md-4 col-xs-12" style="background-color:blue; margin-right:10px !important;">
dwekdmñlwekdmlwñ</div>

    </div>

  </div>


</div>

</div>
