<?php
include("../../includes/inc.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
$user = "root";
$pass = "karinateamo";
$db = "webservice";
*/

$link = new mysqli($server,$user,$pass,$bd);
$queryPass = "SELECT * FROM centros";
$queryDenied = "SELECT * FROM 'centros' WHERE 'dato001'=33";
$queryCenters = "SELECT DISTINCT centro FROM centros";
// Perform query
if ($result = mysqli_query($link, "SELECT * FROM centros WHERE dato001=33")) {
  echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set 
  $registros = mysqli_num_rows($result);
  //mysqli_free_result($result);
}
mysqli_close($link);
?>

<!-- /***************************************************************************************************************/-->
<div class="row" id="container-row">
<div class="row" style="background-color:#dae5ef;margin: 10px 0px 10px 0px; padding-top:10px;">
  <div class="col-md-1" style="background-color:;"></div>
  <!-- ****************** NAME CENTER ********************* -->
  <div class="col-md-2" style="background-color:;">
    <div class="row" style="padding: 5px 0 5px 0;height:40px;background-color:#2596F3;color:white;font-weight: bold; font-size: 1.5em;text-align:center;">CENTRO</div>
    <div class="row" style="height:40px;font-weight: bold;text-align:center;color:#135b96; font-size: 4.5em; margin-top:15%;">905</div>
  </div>
  <!-- **************************************************** -->

  <div class="col-md-8" style="background-color:;">
    <!-- ******************* NUMBER TOTAL OF VERIFICATIONS BAR********-->
    <div class="row" style="background-color:">
      <div class="col-md-2" style="background-color:;font-size:1.5em"><kbd>999</kbd></div>
      <div class="col-md-10" style="background-color:;">
        <div class="progress" style="height:35px;margin:5 0 0 0">
          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>
      </div>
    </div>
    <!-- ***************************************************************-->
    <!-- ************************ LINES IN CENTER ********************** -->
    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 1</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 2</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 3</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 4</div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>
    <!-- **************************************************************** -->

  </div>

</div>

</div>
<!-- /***************************************************************************************************************/-->


<!-- /***************************************************************************************************************/-->
<div class="row" id="container-row">
<div class="row" style="background-color:#dae5ef;margin: 10px 0px 10px 0px; padding-top:10px;">
  <div class="col-md-1" style="background-color:;"></div>
  <!-- ****************** NAME CENTER ********************* -->
  <div class="col-md-2" style="background-color:;">
    <div class="row" style="padding: 5px 0 5px 0;height:40px;background-color:#2596F3;color:white;font-weight: bold; font-size: 1.5em;text-align:center;">CENTRO</div>
    <div class="row" style="height:40px;font-weight: bold;text-align:center;color:#135b96; font-size: 4.5em; margin-top:15%;">906</div>
  </div>
  <!-- **************************************************** -->

  <div class="col-md-8" style="background-color:;">
    <!-- ******************* NUMBER TOTAL OF VERIFICATIONS BAR********-->
    <div class="row" style="background-color:">
      <div class="col-md-2" style="background-color:;font-size:1.5em"><kbd>999</kbd></div>
      <div class="col-md-10" style="background-color:;">
        <div class="progress" style="height:35px;margin:5 0 0 0">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
        </div>
      </div>
    </div>
    <!-- ***************************************************************-->
    <!-- ************************ LINES IN CENTER ********************** -->
    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 1</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 2</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 3</div>
      <div class="col-md-3" style="font-size: 1em; color:red;text-align:center;">Línea 4</div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>

    <div class="row" style="margin-bottom:.3em;">
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
      <div class="col-md-3" style=""><button type="button" style="width:100%;" class="btn btn-warning">30 310ZWH G</button></div>
    </div>
    <!-- **************************************************************** -->

  </div>

</div>

</div>
<!-- /***************************************************************************************************************/-->




<script>


$(document).ready(function(){

/*$("#mylocaldiv").load("getstuff.php #mainDiv");*/
// Remove notifications bar
$("#close_notice").click(function(){
  $("#notices_").remove();
  });

});
</script>
