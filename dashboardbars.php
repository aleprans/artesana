<?php

include_once('autentica.php');
include_once('connect.php');

$sql = "select month(dat_exec) AS mes , year(dat_exec) as ano, sum(valor_total) as total, sum(vcust_peca) as cpec,
sum(valor_pecas) as vpec FROM servicos where year(dat_exec) = year(now()) group by mes,ano order by ano,mes;";
$resultado = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Fat total', 'Custo Materiais'],
          <?php while ($dados = $resultado->fetch_array()) { ?>
            ['<?php echo $dados['mes'];?>',<?php echo $dados['total'];?>,<?php echo $dados['cpec'];?>],
          <?php } ?> 
        ]);

        var options = {
          chart: {
            title: 'Faturamento do Ano',
            subtitle: 'Faturamento, Custo com Materiais',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
  </body>
</html>