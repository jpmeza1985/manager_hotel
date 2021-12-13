<?php

include '../bd/database.php';

//Definicion de variables
$fecha = new DateTime("now", new DateTimeZone('America/Santiago'));
$dia = $fecha->format('d-m-Y');
$hora = $fecha->format('H:i');
$hoy = $fecha->format('Y-m-d');
$data= array();

$grafico= "SELECT BUSINESSDATE, SUM(NETSALESTOTAL)
FROM LOCATION_ACTIVITY_DB.OPERATIONS_DAILY_TOTAL
WHERE LOCATIONID= $location AND BUSINESSDATE between TO_DATE('$dia', 'dd-mm-yy') - 7 and TO_DATE('$dia', 'dd-mm-yy')
GROUP BY BUSINESSDATE";
$stid = oci_parse($conexion, $grafico);
oci_execute ($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  $data[]= $row;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafica de Barra y Lineas con PHP y MySQL</title>
    <script src="chart.min.js"></script>
</head>
<body>
<h1>Grafica de Barra y Lineas con PHP y MySQL</h1>
<canvas id="chart1" style="width:50%;" height="50"></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [
        <?php foreach($data as $d):?>
        "<?php echo $d->BUSINESSDATE?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Ventas',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->SUM(NETSALESTOTAL);?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>
</body>
</html>
