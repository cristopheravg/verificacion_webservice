<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Centro', 'Cobrados', 'Verificados', 'Líneas activas'],
          ['903', 100, 80, 3],
          ['904', 170, 130, 3],
          ['910', 66, 55, 4],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['955', 10, 4, 4],
          ['956', 13, 5, 5],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['955', 10, 4, 4],
          ['956', 13, 5, 5],
          ['903', 100, 80, 3],
          ['904', 150, 130, 3],
          ['910', 66, 55, 4],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['956', 13, 5, 5],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['955', 10, 4, 4],
          ['956', 13, 5, 5],
          ['956', 13, 5, 5],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['955', 10, 4, 4],
          ['956', 13, 5, 5],
          ['956', 13, 5, 5],
          ['925', 13, 4, 4],
          ['954', 72, 54, 10],
          ['955', 10, 4, 4]
        ]);

        var options = {
          chart: {
            title: 'Estado actual de Centros de Verificacuón Grupo ALFA S.A. de C.V.',
            subtitle: 'Cobrados,  Verificados y lineas activas ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
  </head>
  <body>

<div class="container-fluid">

        <div class="row" id="filtros" style="margin-top:20px;margin-bottom:30px;">
          <div class="col-lg-4" style="text-align:center;">

              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown">Filtrar por tiempo
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Última hora</a></li>
                    <li><a href="#">Últimas 5 horas</a></li>
                    <li><a href="#">Últimas 24 horas</a></li>
                    <li><a href="#">Última semana</a></li>
                    <li><a href="#">Último mes</a></li>
                  </ul>
              </div>
          </div>

          <div class="col-lg-4" style="text-align:center;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown">Filtrar por característica
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Verificaciones realizadas al día </a></li>
                  <li><a href="#">Pagadas al dóa</a></li>
                  <li><a href="#">No disponible</a></li>
                </ul>
            </div>
          </div>

          <div class="col-lg-4" style="text-align:center;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown">Filtrar por centro
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Centro 901</a></li>
                  <li><a href="#">Centro 902</a></li>
                  <li><a href="#">Centro 903</a></li>
                </ul>
            </div>
          </div>


        </div>





      <div class="row" id="columnchart_material" style=" margin:0 auto; width: 1200px; height: 500px; margin-top:10px;;"></div>


</div>
  </body>
