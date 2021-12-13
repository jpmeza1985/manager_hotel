<?php require_once "vistas/parte_superior.php"?>
    <!--Ejemplo tabla con DataTables-->
    <h3 class="text-center">Venta por Forma de Pago por día</h3>
<br>
    <div class="container">

      <div class="container">
      <div class="row">
        <div class="col-xs-6 .col-sm-4">
        Seleccione la fecha:
        </div>
      </div>
      </div>
      <div class="container">
        <form action="getventafpxd.php" method = "post">
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
                        <table id="Consulta" data-order='[[ 2, "asc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Centro de Venta</th>
                              <th>Día</th>
                              <th>Forma de Pago</th>
                              <th>Total</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fh= date("d-m-y",strtotime($_POST['fh']));
                      $ventadia = "SELECT RVC.NAMEMASTER,TMD.BUSINESSDATE, TM.NAME, TMD.TENDERMEDIATOTAL, LC.NAME FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD JOIN LOCATION_ACTIVITY_DB.TENDER_MEDIA TM ON TMD.TENDERMEDIAID = TM.TENDERMEDIAID JOIN LOCATION_ACTIVITY_DB.LOCATION_HIERARCHY_ITEM LC ON TMD.LOCATIONID = LC.LOCATIONID JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = TMD.REVENUECENTERID
                      WHERE LC.LOCATIONID= $location AND TMD.BUSINESSDATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fh', 'dd-mm-yy') ORDER BY TMD.TENDERMEDIATOTAL DESC";
                      $stid = oci_parse($conexion, $ventadia);
                      //$stid = oci_parse($conexion, 'SELECT BUSINESSDATE, TENDERMEDIAID, TENDERMEDIATOTAL FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL WHERE BUSINESSDATE = TO_DATE(sysdate, "DD/MM/YY") -1');
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                              <td>'.oci_result($stid,'NAMEMASTER').'</td>
                              <td>'.oci_result($stid,'BUSINESSDATE').'</td>
                              <td>'.oci_result($stid, 'NAME').'</td>
                              <td>'.oci_result($stid, 'TENDERMEDIATOTAL').'</td>

                        </tr>';
                      }
                    }
                      ?>



                       </table>

                    </div>

                </div>

        </div>
    </div>
<?php require_once "vistas/parte_inferior.php"?>
