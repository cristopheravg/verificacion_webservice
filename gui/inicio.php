<?php
include("../includes/inc.php");
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
  //echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  $registros = mysqli_num_rows($result);
  //mysqli_free_result($result);
}

$result2 = mysqli_query($link, $queryCenters);
$center = array();


while($rows = mysqli_fetch_array($result2)){
//echo "Centro: " . $rows['centro'] . "<br />";
$center[]= $rows['centro'];
}



mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard Verificentros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Oswald|Poppins|Rajdhani|Raleway|Six+Caps&display=swap" rel="stylesheet">
  <link rel="icon" type="img/png" href="img/favicon.png">


  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 669px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #2196F3;
      height: 100%;
      padding: 0px !important;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }

    .menu-icon {
      font-size: 2.5em;
      text-align: center;
    }

    .nav>li>a {
      text-align: center;
      margin-bottom: 0px;
      border-radius: 0px !important;
      margin: 0px !important;
      color:#fff;
      height: 6em;
      padding-top: 1.5em;
    }

    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
      background-color: #FF5252;
    }

    .panel-body{
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding: 0 !important;
      font-family: Rajdhani !important;

    }

    .panel-heading{
      text-align: center;
      font-family: Oswald !important;
      font-size: 1.5em;
    }

    #principal{
      /*background:url('img/2.jpg');
      background-size: cover;*/
      background-color: #f2f9fc;

    }

    .map-container{
    overflow:hidden;
    padding-bottom:45.25%;
    position:relative;
    height:0;
    }
    .map-container iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
    }

    .center_button{
      margin-right: 10px;
      width: 15%;
      font-size: 1.3em;
      font-weight: bold;

      .center-title{
        background-color: blue;

      }
    }

  </style>
</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <a class="navbar-brand" href="#"><img src="img/logo.png" width="60%" height="150%"></a>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul id="center_button" class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Mi cuenta</a></li>
        <li id="centros"><a href="#">Centros</a></li>
        <li><a href="#">Estadísticas</a></li>
      </ul>
    </div>
  </div>
</nav>


<div id="wrapperPrincipal" class="container-fluid">
<!-- "/*************************************************/ -->
<div id="principal" class="row content" >
  <div class="col-sm-1 sidenav hidden-xs">
    <ul id="menuPrincipal"class="nav nav-pills nav-stacked">
      <li id="usuario" ><a href="#"><span class="glyphicon glyphicon-user menu-icon"></span></a></li>
      <li id="centros" ><a href="#section2" data-toggle="modal" data-target="#seleccionCentro" ><span class="glyphicon glyphicon-object-align-vertical menu-icon"></span></a></li>
      <li id="generales" class="active" ><a href="#"><span class="glyphicon glyphicon-stats menu-icon"></span></a></li>
      <li id="ayuda" ><a href="#"><span class="glyphicon glyphicon-question-sign menu-icon"></span></a></li>
      <li id="configuraciones" ><a href="#"><span class="glyphicon glyphicon-cog menu-icon"></span></a></li>
    </ul>
  </div>
<!-- /************************************************** -->
<div class="col-sm-11" id="mainWrapper" >



</div>
<!-- /*************************************************/ -->


</div>
<!-- /*************************************************/ -->
</div>


<!-- ************************************* Modal ******************************************* -->
<!-- Modal -->
<div class="modal fade" id="seleccionCentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#337ab7; text-align:center; color:white; ">
        <h4 class="modal-title" id="exampleModalLabel">Selecciona el centro a consultar</h4>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <?php
          foreach($center as $numCenter)
            {
                echo "<button id='".$numCenter."' type='button' class='btn btn-warning center_button' >".$numCenter."</button>";
            }
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- ************************************************************************************** -->




</body>

<script>




$(document).ready(function(){


$("#mainWrapper").load("actions/charts.php");

// Gets the center data
$(".center_button").on("click",function(){
  var centro = this.id;
  $("#mainWrapper").load("actions/c2hvd2RhdGFjZW50ZXJwYWdl.php?center="+centro);
  /*$.ajax({url: "actions/c2hvd2RhdGFjZW50ZXJwYWdl.php", success: function(result){
    $("#mainWrapper").html(result);
  }});*/


  $('#seleccionCentro').modal('toggle');
});


// Set ACTIVE class menu
$('#menuPrincipal li').click(function() {
  $(this).siblings('li').removeClass('active');
  $(this).addClass('active');
});


// Change the content
$('#menuPrincipal li').click(function() {

    var seleccion = this.id;
    //alert(seleccion);
      switch(seleccion)
      {

        case "usuario":
        {
          //alert("usuario");
          break;
        }

        case "centros":
        {
          break;
        }

        case "generales":
        {
          $("#mainWrapper").load("actions/Z2VuZXJhbGVz.php");
          break;
        }

        case "ayuda":
        {
          break;
        }

        case "configuraciones":
        {
          break;
        }

      }

});

/*$("#mylocaldiv").load("getstuff.php #mainDiv");*/
// Remove notifications bar
$("#close_notice").click(function(){
  $("#notices_").remove();
  });




});
</script>
</html>
