<?php
$am = "<span style='font-size:70%; margin-left:10px;'>".date("a")."</span>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interface</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Oswald|Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Six+Caps&display=swap" rel="stylesheet">

<style type="text/css">


.login{

  min-height: 250px;
  background-color: rgba(255, 255, 255, 0.05 );
  padding-top: 0px;
  border-radius: 5px;

}

.row_center{
  margin-top:8%;
}

.clock-zone{
  margin-top: 60px;
}

.align-right{
  text-align: right;
}
/*****************************************************************************/
.circleBase {
    border-radius: 50%;
    behavior: url(PIE.htc); /* remove if you don't care about IE8 */
    margin: 0 auto;
    padding-top: 5px;
}
.type2 {
    width: 130px;
    height: 130px;
    background: #ccc;
    border: 3px solid #ccc;
    font-size: 90px;
    color:#fff;

}
.usuario-ico{
  text-align: center;
  margin-top: 10px;
  margin-bottom: 20px;
}

.welcome{
  font-family: Montserrat, sans-serif;
  color: #fff;
  font-size: 30px;
  text-align:center;
}

/*****************************************************************************/

.img {
  height: 100%;
  background-image: url("img/<?php echo rand(1,5);?>.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  backdrop-filter: blur(10px);

}

.pwd {
    width: 80%;
    margin: 0 auto;
    color:#000;
    font-family: Montserrat;
    font-size: 20px;
    margin-top: 20px;
    margin-bottom: 20PX;
}


.margin-bot{
  margin-bottom: 20px;
}

.clock{
  color:#fff;
  font-size: 5em;
  font-family: 'Barlow Condensed', sans-serif;
  text-align: center;
  padding-right: 0;

}



.clock_day{
  color:#fff;
  font-size: .4em;
  font-family: 'Barlow Condensed', sans-serif;
  text-align: center;
  padding-right: 0;
  height:15px;
}

.logo{
  color:#fff;
  font-size: 3em;
  text-align: right;
  padding-margin: 10%;
  font-family: 'Six Caps', sans-serif;
}


body, html {
  height: 100%;
  margin: 0;
}

</style>

</head>


<body>

<div id="wrapper" class="container-fluid img">

  <div class="row row_center">

    <div class="col-xs-2 col-md-4 col-lg-4"></div>
<!--************************************************************************!-->
  <div class="col-xs-8 col-md-4 col-lg-4 login">
        <div class="row usuario-ico">
          <div class="circleBase type2">
            <span class="glyphicon glyphicon-user "></span>
          </div>
        </div>

        <form class="form-horizontal" action="/action_page.php">
        <div class="row welcome">Hola Cristopher
          <div class="row" style="">
            <input class="pwd" id="pas" type="password">
            <button type="button" class="btn btn-primary btn-lg margin-bot ">ACCEDER</button>
          </div>
        </div>
        </form>
  </div>
<!--************************************************************************!-->
      <div class="col-xs-2 col-md-4 col-lg-4 "></div>
  </div><!-- 1 ROW -->


  <div class="row clock-zone">
      <div class="col-xs-1 col-md-4 col-lg-4 logo"></div>
      <div class="col-xs-1 col-md-4 col-lg-4"></div>
      <div  name="horaNow" class="col-xs-12 col-md-4 col-lg-4 clock">
        <div id="day" class="col-xs-12 clock_day" >Miécoles 15 de enero </div>
        <div id="horaNow" class="col-xs-12 ">12:30 PM</div>
      </div>
  </div>


</div><!-- WRAPPER -->

</body>

<script>
  setInterval(function(){
  var dt = new Date();
  var time = dt.getHours() + ":" + dt.getMinutes();
  //document.write(time);
  //console.log(time);
  document.getElementById("horaNow").innerHTML = time + "<?php echo $am;?>";
}, 1000);
</script>

<script>
/*$(document).ready(function(){
  $("#email").click(function(){
    $("body").
  });
});*/
</script>
</html>
