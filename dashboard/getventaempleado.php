<?php require_once "vistas/parte_superior.php"?>
<!--Ejemplo tabla con DataTables-->
    <h3 class="text-center">Venta de Empleados por día</h3>
<br>
    <div class="container">

      <div class="container">
      <div class="row">
      <div class="col-xs-6 .col-sm-4">
      Seleccione las fechas:
      </div>
      </div>
      </div>
      <div class="container">
        <form action="getventaempleado.php" method = "post">
  <div class="row">

    <div class="col-xs-6 .col-sm-4">
      <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
    </div>
    <div class="col-xs-6 .col-sm-4">
      <input type="date" class="form-control" name="fh" id="fh" value= <?php echo $hoy; ?> required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 .col-sm-4">
      <input type="submit" class="btn btn-primary btn-sm" value="Generar reporte">
    </div>
  </div>
  <br>
</div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="Consulta" data-order='[[ 4, "desc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Centro de Venta</th>
                              <th>Dia</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Venta</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fh= date("d-m-y",strtotime($_POST['fh']));
                      $ventadia = "SELECT RVC.NAMEMASTER,  DT.BUSINESSDATE, EMP.FIRSTNAME , EMP.LASTNAME , SUM(DT.NETSALESTOTAL) FROM LOCATION_ACTIVITY_DB.EMPLOYEE_DAILY_TOTAL DT INNER JOIN LOCATION_ACTIVITY_DB.EMPLOYEE EMP ON DT.EMPLOYEEID = EMP.EMPLOYEEID JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = DT.REVENUECENTERID  WHERE DT.LOCATIONID= $location AND BUSINESSDATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fh', 'dd-mm-yy') GROUP BY RVC.NAMEMASTER, DT.BUSINESSDATE, EMP.FIRSTNAME , EMP.LASTNAME, DT.NETSALESTOTAL order by DT.BUSINESSDATE ASC";
                      $stid = oci_parse($conexion, $ventadia);
                      oci_execute ($stid);

                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid,'NAMEMASTER').'</td>
                      <td>'.oci_result($stid,'BUSINESSDATE').'</td>

                      <td>'.oci_result($stid, 'FIRSTNAME').'</td>
                      <td>'.oci_result($stid, 'LASTNAME').'</td>
                      <td>'.oci_result($stid, 'SUM(DT.NETSALESTOTAL)').'</td>
                        </tr>';
                      }
                    }
                      ?>



                       </table>

                    </div>

                </div>

        </div>
    </div>

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
